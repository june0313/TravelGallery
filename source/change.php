<?php
include "header.php";

// �α��� �Ǿ����� ������ �α��� �������� �̵���Ų��.
if( empty($_SESSION["name"]) )
{
?>
	<script type="text/javascript"> 
   		location.href = "login.php";
    </script> 
<?php
}

include "./db_conn.php";
// ���� ȸ���� ���������� �����´�.
$query = "SELECT * FROM customer WHERE id = '$_SESSION[id]'";
$result = mysql_query($query, $link);
$row = mysql_fetch_array($result);

// ���� ȸ���� �ۼ��� �Խ����� �� ���� �����´�.
$query = "SELECT count(*) from board WHERE id = '$_SESSION[id]'";
$result = mysql_query($query, $link);
$board_count = mysql_result($result,0,0);
?>
<div class="left"></div>

<div class="center">
	<h2>�������� ����</h2>
	<hr>
	<form ACTION="member_update.php" METHOD="POST">
		<table class="join">
			<tr>
				<td class="h">���̵�</td>
				<td><?=$row['id']?></td>
			</tr>
			<tr>
				<td class="h">���� ��й�ȣ</td>
				<td><input type="password" name="password"></input></td>
			</tr>
			<tr>
				<td class="h">������ ��й�ȣ</td>
				<td><input type="password" name="password_change"></input></td>
			</tr>
			<tr>
				<td class="h">��й�ȣ Ȯ��</td>
				<td><input type="password" name="passwordCheck"></input></td>
			</tr>
			<tr>
				<td class="h">�̸�</td>
				<td><input type="text" name="userName" value="<?=$row[name]?>"></input>
				</td>
			</tr>
		</table>
		<hr>
		<center>
			<input type="submit" value="����"></input> 
			<input type="reset" value="���"></input>
		</center>
	</form>
</div>

<div class="right"></div>

<?php include 'footer.php';?>