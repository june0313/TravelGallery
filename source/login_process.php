<?php
	session_start();
	include "db_conn.php";
	
	// ���̵�� ��й�ȣ�� ���ÿ� ��ġ�ϴ� ���� ã�´�.
	$query = "SELECT count(*) FROM customer WHERE id = '$_POST[id]' AND pwd ='$_POST[password]'";
	$result = mysql_query($query, $link);
	$row = mysql_fetch_array($result);


	// �˻� ����� 1�̸� ���������� �α���
	if( $row[0] == 1 )
	{
		$query = "SELECT * FROM customer WHERE id = '$_POST[id]'";
		$result = mysql_query($query, $link);
		$row = mysql_fetch_array($result);

		
		// �α��� ���¸� �����ϱ� ���� ������ ����Ѵ�.
		$_SESSION["name"] = $row['name'];
		$_SESSION["id"] = $row['id'];
	}
	//�α��� ����
	else
	{
?>
		<script>
			alert("�α��� ������ �������� �ʽ��ϴ�");
		</script>
<?php
	}
?>
	<script>
		history.back();
	</script>



