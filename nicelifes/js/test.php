<?
//error_reporting(0); 
//header('Content-type: text/json;charset=utf-8');
//header("Content-Disposition:attachment;filename=test.json");
//echo ord("��");
//echo "<br/>";
//
//echo chr(ord("��"));
//echo "<br/>";
$mysql_server_name='127.0.0.1'; //�ĳ��Լ���mysql���ݿ������
 $page =  $_GET["page"];
 $size =  $_GET["size"];
 //$post = $_POST["data"];
$mysql_username='root'; //�ĳ��Լ���mysql���ݿ��û���

//$mysql_password='WhUnW59am9pwwDtw'; //�ĳ��Լ���mysql���ݿ�����

$mysql_database='test1'; //�ĳ��Լ���mysql���ݿ���

$conn=mysql_connect($mysql_server_name,$mysql_username) or die("error connecting") ; //�������ݿ�

mysql_query("SET NAMES 'utf8'"); //���ݿ�������� Ӧ����������ݿ���뱣��һ��.������UTF-8 ���ʱ�׼����.

mysql_select_db($mysql_database); //�����ݿ�
//$sql ="select * from TG_AMOUNT_TBL GROUP BY typeid limit 3;"; //SQL���
$b = (($page -1) * $size)+1;
$e = $b+$size -1;
$sql ="select * from test2 where id BETWEEN $b AND $e"; //SQL���
$result = mysql_query($sql); //��ѯ
$arr = array("code"=>0);
$data =array();
while($row = mysql_fetch_array($result))
	
{
	$data[] = array("id"=>$row['id'],"title"=>$row['title'],"name"=>$row['name'],"createtime"=>$row['createtime'],"modifd"=>$row['modified']);
	
//	echo "<div style=\"height:24px; line-height:24px; font-weight:bold;\">"; //�Ű����
//	
//	echo $row['email'] . "   " . $row[4] . "<br/>";
//	
//	echo "</div>"; //�Ű����
	
}
$arr["succesed"] = true;
$arr["data"] = $data;
echo json_encode($arr);
mysql_close($conn);
exit;
?>