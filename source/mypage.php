<?php
include"header.php";

// �α����� �Ǿ����� ������ �α��� �������� �̵���Ų��.
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
	<h2>���� Ȱ�� ����</h2>
	<hr>
	<form ACTION="change.php" METHOD="POST">
		<table class="join">
			<tr>
				<td class="h">���̵�</td>
				<td><?=$row[id]?>
				</td>
			</tr>
			<tr>
				<td class="h">�̸�</td>
				<td><?=$row[name]?>
				</td>
			</tr>
			<tr>
				<td class="h">�ø� ���� ��</td>
				<td><?=$gallery_count?></td>
			</tr>
			<tr>
				<td class="h">�ø� �Խñ� ��</td>
				<td><?=$board_count?></td>
		
		</table>
		<hr>
		<center>
			<input type="submit" value="����"></input>
		</center>
	</form>
</div>

<div class="right"></div>

<?php include 'footer.php';?>
