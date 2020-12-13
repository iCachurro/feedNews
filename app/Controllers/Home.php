<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\contentModel;
use App\Libraries\scraping;

class Home extends BaseController
{
	/*
	* Constructor
	*/
	public function __construct()
	{
		helper('form');
	}

	/*
	* Index
	*/
	public function index()
	{
		// Get data
		$contents = new contentModel($db);
		$data = $contents->where('date', dateNow())->findAll();
		$data = array('data' => $data);

		// Create View
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

		// Index
		return redirect()->to(base_url());

	}

	/*
	* Call to the news edition
	*/
	public function news()
	{
		$views = view('header') . view('newsForm') . view('footer');

		return $views;
	}

	/*
	* Save data
	*/
	public function saveData()
	{
		// Post
		$request = \Config\Services::request();

		// Data
		$data = array(
					'title'		=> $request->getPostGet('title'),
					'date'		=> $request->getPostGet('date'),
					'body'		=> $request->getPostGet('body'),
					'publisher'	=> $request->getPostGet('publisher'),
					'img'		=> $request->getPostGet('img'),
					'url'		=> $request->getPostGet('url')
		);

		if($request->getPostGet('id') != NULL){
			$data['id'] = $request->getPostGet('id');
		}

		// Save into DB
		$contents = new contentModel($db);
		$contents->save($data);

		// Index
		return redirect()->to(base_url());
	}

	/*
	* Edit data
	*/
	public function editData()
	{
		// Post
		$request = \Config\Services::request();
		$id = $request->uri->getSegment(3);

		// Get data
		$contents = new contentModel($db);
		$data = $contents->find([$id]);
		$data = array('data' => $data);

		$views = view('header') . view('newsForm', $data) . view('footer');

		return $views;
	}


	/*
	* Delete data
	*/
	public function deleteData()
	{
		// Post
		$request = \Config\Services::request();
		$id = $request->uri->getSegment(3);

		// Get data
		$contents = new contentModel($db);
		$contents->delete($id);

		// Index
		return redirect()->to(base_url());
	}




	//--------------------------------------------------------------------

}
