<?php
	session_start();
	include "db_conn.php";

	//�Էµ� ��й�ȣ�� �°�, ���� ��й�ȣ��, Ȯ���� �´��� ���Ѵ�.
	$query = "SELECT * FROM customer WHERE id = '$_SESSION[id]'";
	$result = mysql_query($query, $link) or die("DB���� Ȥ�� ������ �����Ͽ����ϴ�.".mysql_error());
	$row = mysql_fetch_array($result);

	if($_POST[password]!=$row['pwd'])
	{
		?>
		<script>
			alert("���� ��й�ȣ�� ��ġ���� �ʽ��ϴ�.");
			history.back();
		</script>

<?
	}


	elseif( $_POST[password_change]!=$_POST[passwordCheck])
	{
?>
	<script>
	alert("����� ��й�ȣ�� ��ġ���� �ʽ��ϴ�.");
	history.back();
	</script>

<?php
	}

	elseif(empty($_POST[userName]))
	{
		?>
		<script>
	alert("�̸��� �Է����ֽñ� �ٶ��ϴ�.");
	history.back();
	</script>
		<?
	}
	else
	{
	// customer ���̺��� ������ �����Ѵ�.
	$query = "UPDATE customer";
	$query .= " SET pwd = '$_POST[password_change]' where id='$_SESSION[id]'";
	$result = mysql_query($query,$link) or die("DB���� Ȥ�� ������ �����Ͽ����ϴ�.?".mysql_error());

	$query = "UPDATE customer";
	$query .= " SET name = '$_POST[userName]' WHERE id='$_SESSION[id]' ";
	$result = mysql_query($query,$link) or die("DB���� Ȥ�� ������ �����Ͽ����ϴ�.??".mysql_error());

	$_SESSION["name"] = $_POST[userName];
?>

	<script>
	alert("ȸ������ ������ �Ϸ�Ǿ����ϴ�.");
	location.href="index.php";
	</script>
<?php
	}
?>

