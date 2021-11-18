<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

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
        $this->load->model('m_login');
    }
    function index(){
    	$this->load->view('public/signin');
    }
	public function signin(){
		$username = $_POST['username'];
		$password = $_POST['password'];

		if((empty($username) || empty($password))){
			$this->session->set_flashdata('Error','Pls Check Username and Password');
			redirect('login');
		}
		else{
			$username = $this->input->post('username');
			$password = $this->input->post('password');

			$user = $this->m_login->find_user($username);

			if(!$user){
				$this->session->set_flashdata('Error','Invalid Login');
				return redirect('home/login');
			}
			else{
				$hash = $user->password;
				if(password_verify($password, $hash)){
					$user_id = $user->id;
					$usertype_id = $user->usertype;
					$user_type = $this->db->query("select user_type from user_type where id = $usertype_id")->row()->user_type;
					$session_data = array(
						'username'=>$user->email,
						'user_type'=>$user_type,
						'id'=>$user_id,
						);
					// $this->display($user_type);
					$this->session->set_userdata($session_data);
					$this->session->set_flashdata('Success','Login Success');
					if($user_type=="admin"){
						return redirect('admin');
					}
					else{
						return redirect('user');
					}
					
							
				}
				else{
					$this->session->set_flashdata('status','Invalid Login');
					return redirect('home/index');
				}
			}
		}
	}
}
