<?php 
header("content-type:text/html;charset:utf-8");
if($_SERVER['REQUEST_METHOD']=="POST"){
	$userName = $_POST['userName'];
	$pwd = $_POST['pwd'];
	$conn = @mysql_connect("localhost","root","") or die ( "db error");
	mysql_select_db("my37",$conn);
	mysql_query("set names utf8");
	$rs = mysql_query("select * from users where userName='$userName' and pwd='$pwd'");
	$num = mysql_num_rows($rs);
	if($num>0){
		$_SESSION['login'] = 'success';
		$_SESSION['userName'] = $userName;
		echo '{"status":0,"msg":"登陆成功"}';
	}else{
		echo '{"status":1,"msg":"用户名或密码错误"}';
	}
	mysql_free_result($rs);
mysql_close($conn);
}else{
	echo "<script type='text/javascript'>location.href='error.php'</script>";
}
?>