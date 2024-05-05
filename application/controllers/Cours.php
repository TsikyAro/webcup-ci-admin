<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cours extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('CoursModel');
	}
	public function template($page, $data)
	{
		if (!file_exists(APPPATH . 'views/pages/' . $page . '.php')) {
			// show_404();
		}

		$this->load->view('templates/home/header', $data);
		$this->load->view('pages/cours/' . $page, $data);
		$this->load->view('templates/home/footer', $data);
	}
	public function listCours()
	{
		$data['teams'] = 'CodeForce';
		$data['cours'] = $this->CoursModel->get_all_cours();
		$this->template('listCours', $data);
	}

	public function ficheCours()
	{
		$data['teams'] = 'CodeForce';
		$cour = $_GET['cours'];
		if($cour!=1){
			$this->session->set_flashdata('message', 'Vitao aloha ilay 1.');
			redirect(base_url('cours/listCours'));
		}
			$data['cours'] = $this->CoursModel->get_cours_by_id($cour);
			
			$this->template('ficheCours', $data);
	}

	public function politesse()
	{
		$data['teams'] = 'CodeForce';
		$this->template('politesse', $data);
	}
	public function nutrition()
	{
		$data['teams'] = 'CodeForce';
		$this->template('nutrition', $data);
	}
}