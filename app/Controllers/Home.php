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

	public function loadData()
	{
		$scraping = new Scraping(5);
		$scraping->load();
		$data = $scraping->getData();

		$contents = new contentModel($db);

		$contents->insertFromWeb($data);
//$views = view('header');

		//redirect('/');

		return redirect()->to(base_url());

	}

	//--------------------------------------------------------------------

}
