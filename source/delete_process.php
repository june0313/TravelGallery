<?
 session_start();
 include "./db_conn.php";

 $map = $_GET[map];
 $pn = $_GET[pn];
 $query="DELETE FROM board  where board_num = '$_GET[read_uno]'&&map='$_GET[map]'";  //max 는 gno필드의 최대값을 추출
 $result=mysql_query($query,$link) or die("DB접속 혹은 쿼리에 실패하였습니다.".mysql_error());
// -------- 변수 받는 부분 -------------

?>
 
 <script language="javascript">
  document.location.href='board.php?map=<?=$map?>&pn=<?=$pn?>';
 </script>