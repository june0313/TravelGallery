<?
session_start();
include "./db_conn.php";

$map = $_GET[map];
$pn = $_GET[pn];
$query="UPDATE gallery set title = '$_POST[title]',content = '$_POST[content]',image='$_POST[image]' where gallery_num = '$_GET[modify_uno]'&&map='$_GET[map]'";  //max 는 gno필드의 최대값을 추출
$result=mysql_query($query,$link) or die("DB접속 혹은 쿼리에 실패하였습니다.".mysql_error());

?>
<script language="javascript">
 	document.location.href='gallery.php?map=<?=$_GET[map]?>&pn=<?=$_GET[pn]?>';
</script>
