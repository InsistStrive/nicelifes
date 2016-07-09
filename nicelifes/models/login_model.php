<?php
header('Content-type: text/json;charset=utf-8');
/*
 * Created on 2016-7-9
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
 class login_model extends CI_Model{
 	public function validate($account = FALSE)
{
    if ($account === FALSE)
    {
        return false;
    }
    $query = $this->db->get_where('login', array('account' => $account));
    //if($query->row_array()['']===$passwd)
    return $query->row_array();
}
 }
?>
