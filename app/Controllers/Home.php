<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\urlModel;
use App\Models\contentModel;
use App\Libraries\scraping;

class Home extends BaseController
{
	public function index()
	{
		$contents = new contentModel($db);
		$data = $contents->where('date', dateNow())->findAll();
		$data = array('data' => $data);
		//var_dump($data);
		$views = view('header') . view('news', $data) . view('footer');

		return $views;
	}

	/*
	* Load data from websites
	*/
	public function loadData()
	{
		// Load data
		$scraping = new Scraping(5);
		$scraping->load();
		$data = $scraping->getData();

		// Insert into DB
		$contents = new contentModel($db);
		$contents->insertFromWeb($data);

		// Return to index
		return redirect()->to(base_url());

	}

	//--------------------------------------------------------------------

}
