<?php

namespace App\classes;

use App\classes\Insert;

class Paginate extends Insert
{

    private $table;
    public $limit;
    private $total;
    private $page;
    public $offset;



    function __construct(string $table, int $limit)
    {
        $this->table = $table;
        $this->limit = $limit;

        // How many items to list per page

    }

    // Find out how many items are in the table
    private function ItemsInTable()
    {
        $this->total = $this->selectCountAll($this->table);
        // How many pages will there be
        $this->page = ceil($this->total / $this->limit);
    }

    // What page are we currently on?
    private function currentPage()
    {
        $currentPage = min($this->page, filter_input(INPUT_GET, 'page', FILTER_VALIDATE_INT, array(
            'options' => array(
                'default'   => 1,
                'min_range' => 1,
            ),
        )));
        return $currentPage;
    }
    // Calculate the offset for the query
    private function offset()
    {

        $page = $this->currentPage();
        $this->offset = ($page - 1)  * $this->limit;
        $offset = $this->offset;

        // Some information to display to the user
        $start = $offset + 1;
        $end = min(($offset + $this->limit), $this->total);

        // The "back" link
        $prevlink = ($page > 1) ? '<a href="?page=1" title="First page">&laquo;</a> <a href="?page=' . ($page - 1) . '" title="Previous page">&lsaquo;</a>' : '<span class="disabled">&laquo;</span> <span class="disabled">&lsaquo;</span>';

        // The "forward" link
        $nextlink = ($page < $this->page) ? '<a href="?page=' . ($page + 1) . '" title="Next page">&rsaquo;</a> <a href="?page=' . $this->page . '" title="Last page">&raquo;</a>' : '<span class="disabled">&rsaquo;</span> <span class="disabled">&raquo;</span>';

        // Display the paging information
        echo '<div id="paging"><p>', $prevlink, ' Page ', $page, ' of ', $this->page, ' pages, displaying ', $start, '-', $end, ' of ', $this->total, ' results ', $nextlink, ' </p></div>';
    }

    public function getResult()
    {

        $this->ItemsInTable();
        $this->currentPage();
        $this->offset();
    }







    // Do we have any results?

}
