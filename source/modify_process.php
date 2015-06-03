<?
session_start();
include "./db_conn.php";

$map = $_GET[map];
$pn = $_GET[pn];
$query="UPDATE board set title = '$_POST[title]',content = '$_POST[content]' where board_num = '$_GET[modify_uno]'&&map='$_GET[map]'";
$result=mysql_query($query,$link) or die("DB접속 혹은 쿼리에 실패하였습니다.".mysql_error());

?>
<script language="javascript">
 	document.location.href="./board_show.php?map=<?=$_GET[map]?>&read_uno=<?=$_GET[modify_uno]?>&pn=<?=$_GET[pn]?>&map_st=<?=$_GET[map_st]?>&map_en=<?=$_GET[map_en]?>";
</script>
