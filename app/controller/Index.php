<?php

namespace App\controller;

use App\classes\{
    SanitiseArray as Clean,
    Insert as Insert,
    Transaction as Transaction
};

use \PDOException;

class Index extends Base
{
    public $id;
    private $tableGen;
    private $tableDec;

    /**
     * Class constructor.
     */
    public function __construct()
    {
        $this->tableDec = 'decide';
        $this->tableGen = 'general';
    }

    function home()
    {

        return view('public/home');
    }

    function home2()
    {

        return view('public/home2');
    }

    function decide2()
    {

        return view('public/decide2');
    }

    function main()
    {

        return view('public/main');
    }


    function decidepics()
    {

        return view('public/decidepics');
    }

    function submit()
    {
        // get the data
        // clean up the data
        // send the data to the database
        // pull the data from the database
        // calculate the total score
        // get the percentage
        // Buy start at 90%
        // redirect to the decision page

        try {

            $totalScore = 0;
            $totalPossibleScore = 35;
            //clean up the the $_POST data
            $clean = new Clean($_POST);
            $newData = $clean->getSanitisedArray();

            $insert = new Insert;
            $Transaction = new Transaction;
            //begin transaction
            $Transaction->beginTransaction();
            // get user's ip address
            $ipAddress = getUserIpAddr();
            // Insert the first data
            $generalData = ['requirement' => $newData['requirement'], 'purpose' => $newData['purpose'], 'ip_address' => $ipAddress];
            $insert->insertData_NoRedirect($generalData, $this->tableGen);

            // INSERT TO THE DECIDE TABLE SECTION

            // remove the non numeric
            unset($newData['requirement'], $newData['ip_address'], $newData['purpose']);
            // then loop through and add score to get the total score percentage
            foreach ($newData as $data) {
                $totalScore += (int) $data;
            }
            // total as a percentage of 100
            $totalInPercent = ($totalScore / $totalPossibleScore) * 100;
            // create a new $_POST variable called total score
            $newData['totalScore'] = (int) $totalInPercent;
            // Get the last inserted data from the autoincrement Id
            $lastInsertIdToGenTable = $insert->insertGetLastId($this->tableGen);
            // create a new $_POST var and allocate last insertedid
            $newData['decide_id'] = $lastInsertIdToGenTable[0]['id'];
            // create a session with the last inserted id
            $_SESSION['id'] =$lastInsertIdToGenTable[0]['id'];
            // Insert the data to the decide table
            $insert->insertData_NoRedirect($newData, $this->tableDec);
            // commit all transactions
            $Transaction->commit();
            header('Location: /decision');
        } catch (PDOException $e) {
            $Transaction->rollback();
            echo $e->getMessage(), PHP_EOL;
        }
    }


    public function decision()
    {
        $insert = new Insert;
        $tableId = 'decide_id';

        // $outcome =$insert->select_from($this->tableDec, $tableId, 100);

        // foreach($outcome as $row) {
        //     echo $row[$tableId];
        // }        
       
        $pullData = $insert->select_join($this->tableGen, $this->tableDec, 'id', $tableId, $_SESSION['id']);

        view('outcome/decision', compact('pullData'));
     

    }
}
