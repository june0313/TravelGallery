<?
 session_start();
 include "./db_conn.php";

 $query = "SELECT num from gallery where gallery_num = '$_GET[modify_uno]' && map = '$_GET[map]' ";
 $result = mysql_query($query,$link) or die("DB접속 혹은 쿼리에 실패하였습니다.?".mysql_error());
 $gallery_num=mysql_fetch_row($result);
 $id = $_SESSION['id'];
 
 $query = "SELECT * from recommand where id='$_SESSION[id]' && num = '$gallery_num[0]' ";
 $result = mysql_query($query,$link) or die("DB접속 혹은 쿼리에 실패하였습니다.?".mysql_error());
 $row=mysql_fetch_row($result);

 if(empty($row[0]))
 {
 $map = $_GET[map];
 $pn = $_GET[pn];
 $query="UPDATE gallery SET recommand = recommand+1  where gallery_num = '$_GET[modify_uno]'&&map='$_GET[map]'";  //max 는 gno필드의 최대값을 추출
 $result=mysql_query($query,$link) or die("DB접속 혹은 쿼리에 실패하였습니다.??".mysql_error());
 $query="INSERT INTO recommand(id,num) 
 VALUES('$id','$gallery_num[0]')";  //max 는 gno필드의 최대값을 추출
 $result=mysql_query($query,$link) or die("DB접속 혹은 쿼리에 실패하였습니다.???".mysql_error());
// -------- 변수 받는 부분 -------------
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
	alert("이미 추천을 하셨습니다.");
	history.back();
	 </script>
<?
}
?>