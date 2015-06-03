<?php
session_start();
include "./db_conn.php";

// 업로드된 파일이 존재하지 않을 경우
if(empty($_FILES['image']['name']))
{
?>
	<script language="javascript">
		alert("사진이 업로드되지 않았습니다.");
		history.back();
	</script>
<?php
}
// 이미지 파일을 서버의 /image/ 디렉터리로 업로드.
$uploaddir = './image/';
$uploadfile = $uploaddir . basename($_FILES['image']['name']);
move_uploaded_file($_FILES['image']['tmp_name'], $uploadfile);

$table_name="gallery";
$query="select gallery_num from refer where map='$_GET[map]'";  
$result=mysql_query($query,$link) or die("DB접속 혹은 쿼리에 실패하였습니다.".mysql_error());
$row=mysql_fetch_row($result);

if($row[0])
	$gallery_num=$row[0]+1;
else
	$gallery_num=1;

$title =addslashes($_POST[title]);
$content =addslashes($_POST[content]);

$date = time();
$image = $uploadfile;

$id = $_SESSION[id];

$query="insert into gallery(gallery_num,id,date,map,title,content,hits,image,recommand) values('$gallery_num','$id','$date','$_GET[map]','$title','$content',0,'$image',0)";
$result=mysql_query($query,$link) or die("DB접속 혹은 쿼리에 실패하였습니다?.".mysql_error());

$query = "UPDATE refer SET gallery_num = '$gallery_num' WHERE map = '$_GET[map]'";
$result=mysql_query($query,$link) or die("DB접속 혹은 쿼리에 실패하였습니다.??".mysql_error());

?>
<script language="javascript">
	document.location.href="gallery.php?map=<?=$_GET[map]?>";
</script>
