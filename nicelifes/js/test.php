<?
//error_reporting(0); 
//header('Content-type: text/json;charset=utf-8');
//header("Content-Disposition:attachment;filename=test.json");
//echo ord("网");
//echo "<br/>";
//
//echo chr(ord("网"));
//echo "<br/>";
$mysql_server_name='127.0.0.1'; //改成自己的mysql数据库服务器
 $page =  $_GET["page"];
 $size =  $_GET["size"];
 //$post = $_POST["data"];
$mysql_username='root'; //改成自己的mysql数据库用户名

//$mysql_password='WhUnW59am9pwwDtw'; //改成自己的mysql数据库密码

$mysql_database='test1'; //改成自己的mysql数据库名

$conn=mysql_connect($mysql_server_name,$mysql_username) or die("error connecting") ; //连接数据库

mysql_query("SET NAMES 'utf8'"); //数据库输出编码 应该与你的数据库编码保持一致.建议用UTF-8 国际标准编码.

mysql_select_db($mysql_database); //打开数据库
//$sql ="select * from TG_AMOUNT_TBL GROUP BY typeid limit 3;"; //SQL语句
$b = (($page -1) * $size)+1;
$e = $b+$size -1;
$sql ="select * from test2 where id BETWEEN $b AND $e"; //SQL语句
$result = mysql_query($sql); //查询
$arr = array("code"=>0);
$data =array();
while($row = mysql_fetch_array($result))
	
{
	$data[] = array("id"=>$row['id'],"title"=>$row['title'],"name"=>$row['name'],"createtime"=>$row['createtime'],"modifd"=>$row['modified']);
	
//	echo "<div style=\"height:24px; line-height:24px; font-weight:bold;\">"; //排版代码
//	
//	echo $row['email'] . "   " . $row[4] . "<br/>";
//	
//	echo "</div>"; //排版代码
	
}
$arr["succesed"] = true;
$arr["data"] = $data;
echo json_encode($arr);
mysql_close($conn);
exit;
?>