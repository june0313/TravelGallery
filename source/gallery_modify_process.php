<?
session_start();
include "./db_conn.php";

$map = $_GET[map];
$pn = $_GET[pn];
$query="UPDATE gallery set title = '$_POST[title]',content = '$_POST[content]',image='$_POST[image]' where gallery_num = '$_GET[modify_uno]'&&map='$_GET[map]'";  //max �� gno�ʵ��� �ִ밪�� ����
$result=mysql_query($query,$link) or die("DB���� Ȥ�� ������ �����Ͽ����ϴ�.".mysql_error());

?>
<script language="javascript">
 	document.location.href='gallery.php?map=<?=$_GET[map]?>&pn=<?=$_GET[pn]?>';
</script>
