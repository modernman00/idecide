<?php

namespace App\controller;



class Index extends Base
{

    function show() {

        return view('public/home');
    }

    function main() {

        return view('public/home1');
    }
    
    
}