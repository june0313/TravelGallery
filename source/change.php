<?php
include "header.php";

// 로그인 되어있지 않으면 로그인 페이지로 이동시킨다.
if( empty($_SESSION["name"]) )
{
?>
	<script type="text/javascript"> 
   		location.href = "login.php";
    </script> 
<?php
}

include "./db_conn.php";
// 현재 회원의 개인정보를 가져온다.
$query = "SELECT * FROM customer WHERE id = '$_SESSION[id]'";
$result = mysql_query($query, $link);
$row = mysql_fetch_array($result);

// 현재 회원이 작성한 게시판의 글 수를 가져온다.
$query = "SELECT count(*) from board WHERE id = '$_SESSION[id]'";
$result = mysql_query($query, $link);
$board_count = mysql_result($result,0,0);
?>
<div class="left"></div>

<div class="center">
	<h2>개인정보 수정</h2>
	<hr>
	<form ACTION="member_update.php" METHOD="POST">
		<table class="join">
			<tr>
				<td class="h">아이디</td>
				<td><?=$row['id']?></td>
			</tr>
			<tr>
				<td class="h">기존 비밀번호</td>
				<td><input type="password" name="password"></input></td>
			</tr>
			<tr>
				<td class="h">변경할 비밀번호</td>
				<td><input type="password" name="password_change"></input></td>
			</tr>
			<tr>
				<td class="h">비밀번호 확인</td>
				<td><input type="password" name="passwordCheck"></input></td>
			</tr>
			<tr>
				<td class="h">이름</td>
				<td><input type="text" name="userName" value="<?=$row[name]?>"></input>
				</td>
			</tr>
		</table>
		<hr>
		<center>
			<input type="submit" value="수정"></input> 
			<input type="reset" value="취소"></input>
		</center>
	</form>
</div>

<div class="right"></div>

<?php include 'footer.php';?>