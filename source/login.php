<?php include "header.php";

if( empty($_SESSION["name"]))//로그인이 안되어 있으면 출력.
{
?>


<div class="left"></div>

<div class="center">
<div class="login">
	<h2>로그인이 안되어 있습니다! 로그인 후 이용해주시기 바랍니다.</h2>
	<hr>
	<form ACTION="login_process.php" METHOD="POST">
		<center>
		<table class="login">
			<tr>
				<td class="h">아이디</td>
				<td><input type="text" name="id">
				</td>
			</tr>
			<tr>
				<td class="h">비밀번호</td>
				<td><input type="password" name="password"></td>
			</tr>
		</table>
		<br>
			<input type="button" value="회원가입" onclick="location.href='member_join.php'">
			<input type="submit" value="로그인" onclick="history.back()">
			
		</center>
		<hr>
	</form>
	</div>
</div>

<div class="right"></div>


<?
}
else
{
?>
	<script>
		history.back();//이 페이지에서 로그인 한다면 다시 로그인을 해달라는게 아닌 이전페이지로 돌아감
	</script>

	<?
}
	?>
<?php include 'footer.php';?>
