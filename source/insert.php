<?php
	include "db_conn.php";
	
	// �Է����� ���� �׸��� �ִ��� Ȯ���Ѵ�.
	if ($_POST[id] == null || $_POST[password] == null || $_POST[passwordCheck] == null || $_POST[userName] == null)
	{
?>
		<script>
		alert("��� �׸��� �������� �Է����ּ���.");
		history.back();
		</script>
<?php
	}
	
	//�Էµ� ���̵�� ���� ���̵� �ִ��� üũ�Ѵ�.
	$query = "SELECT count(*) FROM customer WHERE id = '$_POST[id]'";
	$result = mysql_query($query, $link);
	$row = mysql_fetch_array($result);

	if( $_POST[password]!=$_POST[passwordCheck])
	{
?>
	<script>
	alert("��й�ȣ�� ��ġ���� �ʽ��ϴ�.");
	history.back();
	</script>
<?php
}
	
	//���� ���̵� 1���̻� ������ �����̹Ƿ� �ߺ��� ���̵� ������ �˸��� �ٽ� ���ư���.
	elseif( $row[0] == 1)
	{
?>
	<script>
	alert("�ߺ��� ���̵� �ֽ��ϴ�.");
	history.back();
	</script>
<?php
	}

	else
	{
	// ȸ���� ������ customer ���̺� �����Ѵ�.
	$query = "INSERT INTO customer(id,pwd,name)";
	$query .= "VALUES ('$_POST[id]','$_POST[password]','$_POST[userName]')";
	$result = mysql_query($query,$link);
?>

	<script>
	alert("ȸ�������� �Ϸ�Ǿ����ϴ�.");
	location.href="index.php";
	</script>
<?php
	}
?>

