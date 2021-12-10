<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	function __construct() {
        parent::__construct();
         if($this->session->userdata('user_type')!='admin'){
        	redirect('login');
		}
		$this->load->model('M_home');
    }
	public function index()
	{
		$data['year'] = $this->db->query("SELECT DISTINCT
		    (YEAR(dt_date)) AS year
		FROM
		    (SELECT 
		        CASE
		                WHEN (YEAR(login_am) <> '0000') THEN DATE(login_am)
		                WHEN (YEAR(login_pm) <> '0000') THEN DATE(login_pm)
		                WHEN (YEAR(logout_am) <> '0000') THEN DATE(logout_am)
		                ELSE DATE(logout_pm)
		            END AS 'dt_date'
		    FROM
		        daily_log
		    ) AS x
		ORDER BY year DESC")->result_array();
		$data['month'] = $this->db->query("SELECT DISTINCT
		    (MONTH(dt_date)) AS month, MONTHNAME(dt_date) as monthname
		FROM
		    (SELECT 
		        CASE
		                WHEN (YEAR(login_am) <> '0000') THEN DATE(login_am)
		                WHEN (YEAR(login_pm) <> '0000') THEN DATE(login_pm)
		                WHEN (YEAR(logout_am) <> '0000') THEN DATE(logout_am)
		                ELSE DATE(logout_pm)
		            END AS 'dt_date'
		    FROM
		        daily_log
		 ) AS x
		ORDER BY month DESC")->result_array();
		$data['user'] = $this->db->query("select id, concat_ws(' ',firstname, middlename, lastname) as fullname from tbluser where usertype = 2")->result_array();
		// $data['days'] = cal_days_in_month( 0, $data['month'][0]['month'], $data['year'][0]['year']);
		if(!empty($data['year'])){
			$data['logs'] = $this->M_home->getLogs($data['year'][0]['year'], $data['month'][0]['month'], 0);	
		}
		$this->load->view('admin/header',$data);
		$this->load->view('admin/log');
		$this->load->view('admin/footer');
	}
	public function register(){
		$this->load->view('admin/index',$data);
	}
	public function getCityByProvince($id){
		$data['city'] = $this->m_home->getCityByProvince($id);
		if($data){
			$this->load->view('returns/city');
		}
	}
	function getLogs(){
		$year = $_GET['year'];
        $month = $_GET['month'];
        $user = $_GET['user'];
        $invoker = $_GET['invoker'];
		$data['year'] = $this->db->query("SELECT DISTINCT YEAR(login_am) as year FROM daily_log order by year DESC")->result_array();
		$data['month'] = $this->db->query("SELECT DISTINCT MONTH(login_am) as month, MONTHNAME(login_am) as monthname FROM daily_log order by month desc")->result_array();
		$data['user'] = $this->db->query("select id, concat_ws(' ',firstname, middlename, lastname) as fullname from tbluser where usertype = 2")->result_array();
		$data['logs'] = $this->M_home->getLogs($year, $month, $user);
		$data['currentUser'] = $user;
		$data['currentMonth'] = $month;
		$data['currentYear'] = $year;
		if ((empty($data['logs'])) && ($invoker=='year')){
			$data['currentUser'] = 0;
			$data['logs'] = $this->M_home->getLogs($year, $month, 0);
			if(empty($data['logs'])){
				$data['currentMonth'] = 0;
				$data['logs'] = $this->M_home->getLogs($year, 0, 0);
			}
		}
		$this->load->view('admin/logTable',$data);
	}
	function users(){
		$data['user'] = $this->db->query("select concat_ws(' ',lastname,firstname,middlename) as fullname,position,department,id,email,deactivated from tbluser where usertype = 2")->result_array();
		// display($data);
		$this->load->view('admin/header',$data);
		$this->load->view('admin/users');
		$this->load->view('admin/footer');
	}
	function saveUser(){
		$config = [
			'upload_path'=>'./assets/upload',
			'allowed_types'=>'gif|png|jpg|jpeg|docx|pdf',
			'max_size' => '1000000',
			'overwrite' => 'TRUE'
		];
		// display($_FILES);
		$data = $_POST;
		if((empty($data['password'])) && ($data['user_id']==0)){
			unset($data['password']);
		}
		$this->load->library('upload',$config);
		
		if (!empty($_FILES['image']['name'])) {
			if($this->upload->do_upload('image')){
				$info = $this->upload->data();
				$file_path = base_url("assets/upload/".$info['raw_name'].$info['file_ext']);
				$data['location'] = $file_path;
			}
			else{
				$this->session->set_flashdata('Error','Check Image Details');
			}
		}
		if($data['user_id']==0){
			unset($data['user_id']);
			$findRfid = $this->db->get_where('tbluser', array('rfid' => $data['rfid']));
			if($findRfid->num_rows()>0){
				echo json_encode(array("status" => 'error', 'type'=>'Error duplicate rfid'));
				return;
			}
			$data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
			$data['usertype'] = 2;
			$data['deactivated'] = 0;
			$data['createdby'] = 0;
			$data['datecreated'] = date('Y-m-d H:i:s');

			if($this->db->insert('tbluser',$data)){
				echo json_encode(array("status" => 'success', 'type'=>'Successfully created user'));	
			}
			else{
				echo json_encode(array("status" => 'error', 'type'=>'Error creating user'));
			}
		}
		else if($data['user_id']!=0){
			$id = $data['user_id'];
			unset($data['user_id']);
			$data['modifieddate'] = date('Y-m-d H:i:s');
			$data['modifiedby'] = 1;
			if(!empty($data['password'])){
				$data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
			}
			if($this->db->update('tbluser',$data,array('id' => $id))){
				echo json_encode(array("status" => 'success', 'type'=>'Successfully updated user'));
			}
			else{
				echo json_encode(array("status" => 'error', 'type'=>'Error updating user'));
			}
		}
	}
	function getUser($id){
		$user = $this->db->query("select id, email, firstname, middlename,lastname,position,department,rfid from tbluser where id=$id");
		if($user->num_rows()>0){
			echo json_encode($user->row());
		}
		else{
			echo json_encode(array("status" => 'error', 'type'=>'cannot find user'));
		}
	}
	function myaccount(){
		$data['admin'] = $this->db->query("select email from tbluser where id = 1")->row_array();
		$this->load->view('admin/header',$data);
		$this->load->view('admin/myaccount');
		$this->load->view('admin/footer');
	}
	function updateAdmin(){
		$data['email'] = $_POST['email'];
		$password = $_POST['password'];
		if($password!=''){
			$data['password'] = password_hash($password, PASSWORD_DEFAULT);
		}
		$res = $this->db->update('tbluser',$data,array('id' => 1));
		if($res){
			echo json_encode(array("status" => 'success', 'type'=>'Successfully updated user'));
		}
		else{
			echo json_encode(array("status" => 'error', 'type'=>'Error updating user'));
		}
	}
	function logout(){
		$this->session->sess_destroy();
		echo json_encode(array("url" =>base_url()));
	}
}
