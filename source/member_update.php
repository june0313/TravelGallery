<?php
	session_start();
	include "db_conn.php";

	//입력된 비밀번호가 맞고, 변경 비밀번호와, 확인이 맞는지 비교한다.
	$query = "SELECT * FROM customer WHERE id = '$_SESSION[id]'";
	$result = mysql_query($query, $link) or die("DB접속 혹은 쿼리에 실패하였습니다.".mysql_error());
	$row = mysql_fetch_array($result);

	if($_POST[password]!=$row['pwd'])
	{
		?>
		<script>
			alert("기존 비밀번호가 일치하지 않습니다.");
			history.back();
		</script>

<?
	}


	elseif( $_POST[password_change]!=$_POST[passwordCheck])
	{
?>
	<script>
	alert("변경된 비밀번호가 일치하지 않습니다.");
	history.back();
	</script>

<?php
	}

	elseif(empty($_POST[userName]))
	{
		?>
		<script>
	alert("이름을 입력해주시기 바랍니다.");
	history.back();
	</script>
		<?
	}
	else
	{
	// customer 테이블의 내용을 변경한다.
	$query = "UPDATE customer";
	$query .= " SET pwd = '$_POST[password_change]' where id='$_SESSION[id]'";
	$result = mysql_query($query,$link) or die("DB접속 혹은 쿼리에 실패하였습니다.?".mysql_error());

	$query = "UPDATE customer";
	$query .= " SET name = '$_POST[userName]' WHERE id='$_SESSION[id]' ";
	$result = mysql_query($query,$link) or die("DB접속 혹은 쿼리에 실패하였습니다.??".mysql_error());

	$_SESSION["name"] = $_POST[userName];
?>

	<script>
	alert("회원정보 수정이 완료되었습니다.");
	location.href="index.php";
	</script>
<?php
	}
?>

