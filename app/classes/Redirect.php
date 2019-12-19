<?php
/**
 * Created by PhpStorm.
 * User: modernman00
 * Date: 7/3/2019
 * Time: 1:06 PM
 */

namespace App\classes;
// redirect -> we are going to have two methods: to and same page


class Redirect
{

	public static function to($page) {

		header("Location: $page");
	}

	public static function samepage() {

		$uri = $_SERVER['SERVER_URI'];

		header("Location: $uri");


	}

}