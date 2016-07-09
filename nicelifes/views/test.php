<?php
header('Content-type: text/json;charset=utf-8');
 echo md5("123456",false);
 
 $query = $this->db->query('SELECT id, account, passwd FROM login');

foreach ($query->result_array() as $row)
{
    echo $row['id'];
    echo $row['account'];
    echo $row['passwd'];
}
?>