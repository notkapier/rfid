<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_home extends CI_Model {

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
        $this->load->database();
    }
    function getProvince($id=0){
    	$sql = "Select id, province From tblprovince ";
    	if($id==0){
    		return $this->db->query($sql)->result_array();
    	}
    	else{
    		$sql.= " where id = $id";
    		return $this->db->query($sql)->row_array();
    	}
    }
    function getCityByProvince($id){
    	$this->db->select('id,city');
    	$this->db->where('provinceid',$id);
    	return $this->db->get('tblcity')->result_array;
    }
    function getLogs($year, $month, $user){
        $sql = "SELECT d.*,concat_ws(' ',lastname,firstname,lastname) as fullname, u.position, u.department from daily_log d
        left join tbluser u on u.id = d.userid
         where ";
        $sql.= " ((YEAR(login_am) = $year) || (YEAR(login_pm) = $year) || (YEAR(logout_pm) = $year) || (YEAR(logout_pm) = $year)) ";
        if($month!=0){
            $sql.=" and ((MONTH(login_am) = $month) || (MONTH(login_pm) = $month) || (MONTH(logout_pm) = $month) || (MONTH(logout_pm) = $month)) ";
        }
        if($user!=0){
            $sql.=" and userid = $user ";
        }
        $sql.=" order by fullname, login_am,logout_am,login_pm,logout_pm asc";
        $query = $this->db->query($sql);
        return $query->result_array();
    }
}
