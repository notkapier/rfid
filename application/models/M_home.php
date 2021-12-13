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
    function getLogsV2($year, $month, $userid, $start, $end){
        $sql = "
           with recursive all_dates(dt) as (
                select '$start' dt
                    union all 
                select dt + interval 1 day from all_dates where dt + interval 1 day <= '$end'
            )
            select logid, userid, dt, dayname(dt) as day,day(dt) as day_numeric, login_am, logout_am, login_pm, logout_pm, remarks from all_dates ad left join
            (
            SELECT 
                *,
                CASE 
                WHEN (YEAR(login_am) = $year AND MONTH(login_am) = $month)    THEN DATE(login_am)
                WHEN (YEAR(login_pm) = $year AND MONTH(login_pm) = $month)  THEN DATE(login_pm)
                WHEN (YEAR(logout_am) = $year AND MONTH(logout_am) = $month)     THEN DATE(logout_am)
                    ELSE DATE(logout_pm)
               END AS 'dt_date'
            FROM
                daily_log
            WHERE
                userid = $userid 
            AND 
            ((YEAR(login_am) = $year AND MONTH(login_am) = $month)
            OR
            (YEAR(login_pm) = $year AND MONTH(login_pm) = $month)
            OR
            (YEAR(logout_am) = $year AND MONTH(logout_am) = $month)
            OR
            (YEAR(logout_pm) = $year AND MONTH(logout_pm) = $month)
            )
            ) x on x.dt_date = ad.dt
            order by dt asc
        ";
        $query = $this->db->query($sql);
        return $query->result_array();
    }
}
