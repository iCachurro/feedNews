<?php namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{
		$views = view('header') . view('news') . view('footer');
		return $views;
	}

	//--------------------------------------------------------------------

}
