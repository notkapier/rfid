<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

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
        $this->load->model('m_home');
        $this->load->database();
    }
	public function index()
	{
		$this->load->view('public/index');
	}
	public function saveLog(){
		$rfid = $this->input->post('rfid');
		$type = $this->input->post('type');

		$user = $this->db->query("select * from tbluser where rfid = '$rfid'")->row();
		$userid = $user->id;
		$today = date('Y-m-d');

		$data;
		$status='';

		if($userid){
			if(strpos($type,'login')!==FALSE){
				$time = date('Y-m-d H:i:s');
				$existing_login = $this->db->query("select * from daily_log where userid = $userid and (DATE(login_am) like '%$today%' or DATE(login_pm)  like '%$today%' or DATE(logout_am)  like '%$today%')")->row();
				if(empty($existing_login)){
					$this->db->query("insert into daily_log(userid,$type) values($userid,'$time')");
					$status= 'success';
				}
				else{
					if($existing_login->login_pm=='0000-00-00 00:00:00'){
						$logid = $existing_login->logid;
						if(strpos($type,'pm')!==FALSE){
							$this->db->query("update daily_log set $type = '$time' where logid = $logid");	
							$status= 'success';
						}
						else{
							$status= 'already login';
						}
					}
					else{
						$status= 'already login';
					}
				}				
			}
			if(strpos($type,'logout')!==FALSE){
				$time = date('Y-m-d H:i:s');
				$login = str_replace("logout", "login", $type);
				$existing_login = $this->db->query("select * from daily_log where userid = $userid and (DATE(login_am) like '%$today%' or DATE(login_pm)  like '%$today%'or DATE(logout_am)  like '%$today%')")->row();
				if(empty($existing_login)){
					$this->db->query("insert into daily_log(userid,$type) values($userid,'$time')");
					$status= 'success';
				}
				else{
					if($existing_login->$type=='0000-00-00 00:00:00'){
						$logid = $existing_login->logid;
						$this->db->query("update daily_log set $type = '$time' where logid = $logid");	
						$status= 'success';
					}
					else{
						$status= 'already logout';
					}
					
				}
			}

			// $data = array(
			// 	'status' => $status,
			// 	'fullname' => $user->firstname . ' ' . $user->middlename . ' ' . $user->lastname,
			// 	'position' => $user->position,
			// 	'department' => $user->department,
			// 	 );
			// $this->display($status);
			$data = $status .'\r\n'. $user->firstname . ' ' . $user->middlename . ' ' . $user->lastname .'\r\n'. $user->position .'\r\n'. $user->department .'\r\n'. $user->location.'\r\n'. $type;
			$this->session->set_flashdata('status', $data);
		}
		else{
			$this->session->set_flashdata('status', 'User not found');
		}
		
		redirect('home/index');

	}
	function display($data){
		echo '<pre>';
		print_r($data);
		echo '</pre>';
		exit();
	}
}
