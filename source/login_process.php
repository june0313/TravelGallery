<?php
	session_start();
	include "db_conn.php";
	
	// 아이디와 비밀번호가 동시에 일치하는 열을 찾는다.
	$query = "SELECT count(*) FROM customer WHERE id = '$_POST[id]' AND pwd ='$_POST[password]'";
	$result = mysql_query($query, $link);
	$row = mysql_fetch_array($result);


	// 검색 결과가 1이면 성공적으로 로그인
	if( $row[0] == 1 )
	{
		$query = "SELECT * FROM customer WHERE id = '$_POST[id]'";
		$result = mysql_query($query, $link);
		$row = mysql_fetch_array($result);

		
		// 로그인 상태를 유지하기 위해 세션을 등록한다.
		$_SESSION["name"] = $row['name'];
		$_SESSION["id"] = $row['id'];
	}
	//로그인 실패
	else
	{
?>
		<script>
			alert("로그인 정보가 존재하지 않습니다");
		</script>
<?php
	}
?>
	<script>
		history.back();
	</script>



