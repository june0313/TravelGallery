<?php
	include "db_conn.php";
	
	// 입력하지 않은 항목이 있는지 확인한다.
	if ($_POST[id] == null || $_POST[password] == null || $_POST[passwordCheck] == null || $_POST[userName] == null)
	{
?>
		<script>
		alert("모든 항목을 빠짐없이 입력해주세요.");
		history.back();
		</script>
<?php
	}
	
	//입력된 아이디와 같은 아이디가 있는지 체크한다.
	$query = "SELECT count(*) FROM customer WHERE id = '$_POST[id]'";
	$result = mysql_query($query, $link);
	$row = mysql_fetch_array($result);

	if( $_POST[password]!=$_POST[passwordCheck])
	{
?>
	<script>
	alert("비밀번호가 일치하지 않습니다.");
	history.back();
	</script>
<?php
}
	
	//같은 아이디가 1개이상 있으면 오류이므로 중복된 아이디가 있음을 알리고 다시 돌아간다.
	elseif( $row[0] == 1)
	{
?>
	<script>
	alert("중복된 아이디가 있습니다.");
	history.back();
	</script>
<?php
	}

	else
	{
	// 회원의 정보를 customer 테이블에 저장한다.
	$query = "INSERT INTO customer(id,pwd,name)";
	$query .= "VALUES ('$_POST[id]','$_POST[password]','$_POST[userName]')";
	$result = mysql_query($query,$link);
?>

	<script>
	alert("회원가입이 완료되었습니다.");
	location.href="index.php";
	</script>
<?php
	}
?>

