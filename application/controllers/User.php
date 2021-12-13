<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

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
         if($this->session->userdata('user_type')!='employee'){
        	redirect('login');
		}
		$this->load->model('M_home');
    }
	public function index()
	{
		$userid = $this->session->userdata('id');
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
		    WHERE
		        userid = $userid) AS x
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
		    WHERE
		        userid = $userid) AS x
		ORDER BY month DESC")->result_array();
		
		// $data['days'] = cal_days_in_month( 0, $data['month'][0]['month'], $data['year'][0]['year']);
		if(!empty($data['year'])){
			$month = str_pad($data['month'][0]['month'],2,0,STR_PAD_LEFT);
			// display($month);
			$year = $data['year'][0]['year'];
			// $data['logs'] = $this->M_home->getLogs($year, $month, $userid);	
			
			$start_date = date("$year-$month-01");
			$end_date = date("$year-$month-t");

			$data['logs2'] = $this->M_home->getLogsV2($year, $month,$userid, $start_date,$end_date);

			// display($data);

		}
		$this->load->view('user/header',$data);
		$this->load->view('user/log');
		$this->load->view('user/footer');
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
		// display($_POST);
		$year = $_GET['year'];
		$month = $_GET['month'];
        $month2 = str_pad($_GET['month'],2,0,STR_PAD_LEFT);
        $userid = $this->session->userdata('id');
        $invoker = $_GET['invoker'];
		$start_date = date("$year-$month2-01");
		$end_date = date("$year-$month2-t");

		$data['logs2'] = $this->M_home->getLogsV2($year, $month,$userid, $start_date,$end_date);
		$this->load->view('user/logTable',$data);
	}
	function myaccount(){
		$id = $this->session->userdata('id');
		$data['user'] = $this->db->query("select concat_ws(' ',lastname,firstname,middlename) as fullname,position,department,id,email from tbluser where id = $id")->row_array();
		// display($data);
		$this->load->view('user/header',$data);
		$this->load->view('user/myaccount');
		$this->load->view('user/footer');
	}
	function updateAccount(){
		$config = [
			'upload_path'=>'./assets/upload',
			'allowed_types'=>'gif|png|jpg|jpeg|docx|pdf',
			'max_size' => '1000000',
			'overwrite' => 'TRUE'
		];
		// display($_FILES);
		$data = $_POST;
		if(empty($data['password'])){
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
		$id = $this->session->userdata('id');
		$data['modifieddate'] = date('Y-m-d H:i:s');
		$data['modifiedby'] = 1;
		if(!empty($data['password'])){
			$data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
		}
		if($this->db->update('tbluser',$data,array('id' => $id))){
			$this->session->set_flashdata('Success','Successfully updated user');
			echo json_encode(array("status" => 'success', 'type'=>'Successfully updated user'));
		}
		else{
			$this->session->set_flashdata('Error','Error updating user');
			echo json_encode(array("status" => 'error', 'type'=>'Error updating user'));
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
	function logout(){
		$this->session->sess_destroy();
		echo json_encode(array("url" =>base_url('/login')));
	}
	function saveLogChanges(){
		$insertData;
		$updateData;

		$this->db->trans_start(); 
		foreach ($_POST as $key => $value) {
			$info = explode('_', $key);
			if($info[1]==0){
				$insertData = array(
					'userid' => $this->session->userdata('id'),
					'login_am' => $info[2]. ' 00:00:00',
					'remarks' =>$value,
					 );
				$this->db->insert('daily_log',$insertData);
			}
			else{
				$logid = $info[1];
				$updateData = array(
					'remarks' => $value,
					 );
				$this->db->where('logid', $logid);
				$this->db->update('daily_log',$updateData);
			}
		}
		$this->db->trans_complete();

		if ($this->db->trans_status() === FALSE) {
		    $this->db->trans_rollback();
		   echo json_encode(array("status" => 'error', 'type'=>'Error while updating records'));
		} 
		else {

		    $this->db->trans_commit();
		    $this->session->set_flashdata('Success', 'Successfully updated records');
		     echo json_encode(array("url" =>base_url('/user')));
		    
		}
	}
	function printLogs($request){
		$requestData = explode('_', $request);
		$year = $requestData[0];
        $month = $requestData[1];
        $userid = $this->session->userdata('id');

        $month = str_pad($month,2,0,STR_PAD_LEFT);
        $month2 = str_pad($month,2,0,STR_PAD_LEFT);
        $start_date = date("$year-$month2-01");
		$end_date = date("$year-$month2-t");
		$data['user'] = $this->db->query("select firstname, left(middlename, 1) as mi, lastname from tbluser where id = $userid")->row_array();
		$data['month'] = date('F', mktime(0, 0, 0, $month, 10));
		$data['year'] = $year;
		$data['logs2'] = $this->M_home->getLogsV2($year, $month,$userid, $start_date,$end_date);
		// display($data);
		$this->load->view('admin/print2',$data);
	}
}
