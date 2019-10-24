<?php

namespace App\controller;



class Index extends Base
{

    function show() {

        return view('public/home1');
    }

    function main2() {

        return view('public/home');
    }

    function main() {

        return view('public/homeBT');
    }


    function decide() {

        return view('public/decide');
    }
    
    
    
}
