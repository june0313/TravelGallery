<?php include "header.php";

if( empty($_SESSION["name"]))//�α����� �ȵǾ� ������ ���.
{
?>


<div class="left"></div>

<div class="center">
<div class="login">
	<h2>�α����� �ȵǾ� �ֽ��ϴ�! �α��� �� �̿����ֽñ� �ٶ��ϴ�.</h2>
	<hr>
	<form ACTION="login_process.php" METHOD="POST">
		<center>
		<table class="login">
			<tr>
				<td class="h">���̵�</td>
				<td><input type="text" name="id">
				</td>
			</tr>
			<tr>
				<td class="h">��й�ȣ</td>
				<td><input type="password" name="password"></td>
			</tr>
		</table>
		<br>
			<input type="button" value="ȸ������" onclick="location.href='member_join.php'">
			<input type="submit" value="�α���" onclick="history.back()">
			
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
		history.back();//�� ���������� �α��� �Ѵٸ� �ٽ� �α����� �ش޶�°� �ƴ� ������������ ���ư�
	</script>

	<?
}
	?>
<?php include 'footer.php';?>
