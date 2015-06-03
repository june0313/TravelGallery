<?php
include"header.php";

// 로그인이 되어있지 않으면 로그인 페이지로 이동시킨다.
if( empty($_SESSION["name"]) )
{
?>
	<script type="text/javascript"> 
   		location.href = "login.php";
    </script> 
<?php
}


include "./db_conn.php";
$query = "SELECT * FROM customer WHERE id = '$_SESSION[id]'";
$result = mysql_query($query, $link);
$row = mysql_fetch_array($result);

$query = "SELECT count(*) from board WHERE id = '$_SESSION[id]'";
$result = mysql_query($query, $link);
$board_count = mysql_result($result,0,0);

$query = "SELECT count(*) from gallery WHERE id = '$_SESSION[id]'";
$result = mysql_query($query, $link);
$gallery_count = mysql_result($result,0,0);

?>
<div class="left"></div>

<div class="center">
	<h2>나의 활동 내역</h2>
	<hr>
	<form ACTION="change.php" METHOD="POST">
		<table class="join">
			<tr>
				<td class="h">아이디</td>
				<td><?=$row[id]?>
				</td>
			</tr>
			<tr>
				<td class="h">이름</td>
				<td><?=$row[name]?>
				</td>
			</tr>
			<tr>
				<td class="h">올린 사진 수</td>
				<td><?=$gallery_count?></td>
			</tr>
			<tr>
				<td class="h">올린 게시글 수</td>
				<td><?=$board_count?></td>
		
		</table>
		<hr>
		<center>
			<input type="submit" value="수정"></input>
		</center>
	</form>
</div>

<div class="right"></div>

<?php include 'footer.php';?>
