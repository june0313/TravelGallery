<?
 session_start();
 include "./db_conn.php";

 $query = "SELECT num from gallery where gallery_num = '$_GET[modify_uno]' && map = '$_GET[map]' ";
 $result = mysql_query($query,$link) or die("DB���� Ȥ�� ������ �����Ͽ����ϴ�.?".mysql_error());
 $gallery_num=mysql_fetch_row($result);
 $id = $_SESSION['id'];
 
 $query = "SELECT * from recommand where id='$_SESSION[id]' && num = '$gallery_num[0]' ";
 $result = mysql_query($query,$link) or die("DB���� Ȥ�� ������ �����Ͽ����ϴ�.?".mysql_error());
 $row=mysql_fetch_row($result);

 if(empty($row[0]))
 {
 $map = $_GET[map];
 $pn = $_GET[pn];
 $query="UPDATE gallery SET recommand = recommand+1  where gallery_num = '$_GET[modify_uno]'&&map='$_GET[map]'";  //max �� gno�ʵ��� �ִ밪�� ����
 $result=mysql_query($query,$link) or die("DB���� Ȥ�� ������ �����Ͽ����ϴ�.??".mysql_error());
 $query="INSERT INTO recommand(id,num) 
 VALUES('$id','$gallery_num[0]')";  //max �� gno�ʵ��� �ִ밪�� ����
 $result=mysql_query($query,$link) or die("DB���� Ȥ�� ������ �����Ͽ����ϴ�.???".mysql_error());
// -------- ���� �޴� �κ� -------------
?>
 
 <script language="javascript">
  document.location.href='gallery.php?map=<?=$map?>&pn=<?=$pn?>';
 </script>

 <?
 }

else
{
?>
	<script language="javascript">
	alert("�̹� ��õ�� �ϼ̽��ϴ�.");
	history.back();
	 </script>
<?
}
?>