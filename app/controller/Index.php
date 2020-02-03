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
    private $category;

    /**
     * Class constructor.
     */
    public function __construct()
    {
        $this->tableDec = 'decide';
        $this->tableGen = 'general';
        $this->category = 'category';
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

            // create categories
            /** create arrays
             * pick the id 
             * insert the data to the table
             */

            // INSERT TO THE DECIDE TABLE SECTION

            // remove the non numeric
            unset($newData['requirement'], $newData['ip_address'], $newData['purpose']);    

            var_dump($newData);

            // extract data/array for the category table

            $finance = (int) $newData['affordability'] + (int) $newData['incomeSource'] + (int) $newData['concerns'] + $newData['otherOptions']; 

            $purpose = (int) $newData['reward'] + (int) $newData['isNotRational'] + (int) $newData['needWant']; 

            // then loop through and add score to get the total score percentage

            foreach ($newData as $data) {
                $totalScore += (int) $data;

            }
            // total as a percentage of 100
            $totalInPercent = ($totalScore / (count($newData)*5)) * 100;
            $financeInPercent = ($finance / (count($finance)*5)) * 100;
            $purposeInPercent = ($purpose / (count($purpose)*5)) * 100;

            // create a new $_POST variable called total score
            $newData['totalScore'] = (int) $totalInPercent;
            // Get the last inserted data from the autoincrement Id
            $lastInsertIdToGenTable = $insert->insertGetLastId($this->tableGen);
            // create a new $_POST var and allocate last insertedid
            $newData['decide_id'] = $lastInsertIdToGenTable[0]['id'];
            // create a session with the last inserted id
            $_SESSION['id'] =$lastInsertIdToGenTable[0]['id'];
               // create a array for category table
            $category = ['finance'=>$financeInPercent, 'purpose' => $purposeInPercent, 'decide_id'=>$lastInsertIdToGenTable[0]['id']];
            // Insert the data to the decide table
            $insert->insertData_NoRedirect($newData, $this->tableDec);
              // Insert the data to the category table
            $insert->insertData_NoRedirect($category, $this->category);
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

        $pullData = $insert->select_join($this->tableGen, $this->tableDec, 'id', $tableId, $_SESSION['id']);

        $categories = $insert->select_from($this->category, 'decide_id', $_SESSION['id']);

        echo $_SESSION['id'];

        var_dump($categories);

        return view('outcome/decision', compact('pullData', 'categories'));

        // return view('outcome/decision', array('categories'=>$pullCategory,'pullData'=>$pullData));
     

    }
}
