<?php
session_start();
include "./db_conn.php";

$table_name="board";
$query="select board_num from refer where map='$_GET[map]'";  //max �� gno�ʵ��� �ִ밪�� ����
$result=mysql_query($query,$link) or die("DB���� Ȥ�� ������ �����Ͽ����ϴ�.".mysql_error());
$row=mysql_fetch_row($result);

if($row[0])
	$board_num=$row[0]+1;
else
	$board_num=1;

$title =addslashes($_POST[title]);
$content =addslashes($_POST[content]);

$date = time();

$id = $_SESSION[id];

$query="insert into board(board_num,id,date,map,title,content,hits) values('$board_num','$id','$date','$_GET[map]','$title','$content',0)";
$result=mysql_query($query,$link) or die("DB���� Ȥ�� ������ �����Ͽ����ϴ�?.".mysql_error());

$query = "UPDATE refer SET board_num = '$board_num' WHERE map = '$_GET[map]'";
$result=mysql_query($query,$link) or die("DB���� Ȥ�� ������ �����Ͽ����ϴ�.??".mysql_error());

?>
<script language="javascript">
	document.location.href="board.php?map=<?=$_GET[map]?>";
</script>