<?
 session_start();
 include "./db_conn.php";

 $map = $_GET[map];
 $pn = $_GET[pn];
 $query="DELETE FROM board  where board_num = '$_GET[read_uno]'&&map='$_GET[map]'";  //max �� gno�ʵ��� �ִ밪�� ����
 $result=mysql_query($query,$link) or die("DB���� Ȥ�� ������ �����Ͽ����ϴ�.".mysql_error());
// -------- ���� �޴� �κ� -------------

?>
 
 <script language="javascript">
  document.location.href='board.php?map=<?=$map?>&pn=<?=$pn?>';
 </script>