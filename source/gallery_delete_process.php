<?
 session_start();
 include "./db_conn.php";

 $map = $_GET[map];
 $pn = $_GET[pn];
 $query="DELETE FROM gallery  where gallery_num = '$_GET[read_uno]'&&map='$_GET[map]'";  //max �� gno�ʵ��� �ִ밪�� ����
 $result=mysql_query($query,$link) or die("DB���� Ȥ�� ������ �����Ͽ����ϴ�.".mysql_error());
// -------- ���� �޴� �κ� -------------

?>
 
 <script language="javascript">
  document.location.href='gallery.php?map=<?=$map?>&pn=<?=$pn?>';
 </script>