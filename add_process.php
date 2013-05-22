<?php
// 1. 데이터베이스 서버에 접속
$link=mysql_connect('localhost','root','111111');
if(!$link) {
die('Could not connect: '.mysql_error());
}
// 2. 데이터베이스 선택
mysql_select_db('opentutorials');
mysql_query("set session character_set_connection=utf8;");
mysql_query("set session character_set_results=utf8;");
mysql_query("set session character_set_client=utf8;");

if(!empty($_REQUEST['title'])) {
$sql="INSERT INTO topic(title,description,created) 
VALUES ('".$_REQUEST['title']."', '".$_REQUEST['description']."', now());";
mysql_query($sql);
$id=mysql_insert_id();
//$topic = mysql_fetch_assoc($result);
}
?>
<!DOCTYPE html>
<html>
	<body>
<script type="text/javascript">
	alert("추가되었습니다.")
	var loc = "http://localhost/opentutorials/index.php?id=" + <?=$id?>;
	location.replace(loc);
</script>
	</body>	
</html>