<?php
session_start();
include "./db_conn.php";

// ���ε�� ������ �������� ���� ���
if(empty($_FILES['image']['name']))
{
?>
	<script language="javascript">
		alert("������ ���ε���� �ʾҽ��ϴ�.");
		history.back();
	</script>
<?php
}
// �̹��� ������ ������ /image/ ���͸��� ���ε�.
$uploaddir = './image/';
$uploadfile = $uploaddir . basename($_FILES['image']['name']);
move_uploaded_file($_FILES['image']['tmp_name'], $uploadfile);

$table_name="gallery";
$query="select gallery_num from refer where map='$_GET[map]'";  
$result=mysql_query($query,$link) or die("DB���� Ȥ�� ������ �����Ͽ����ϴ�.".mysql_error());
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
$result=mysql_query($query,$link) or die("DB���� Ȥ�� ������ �����Ͽ����ϴ�?.".mysql_error());

$query = "UPDATE refer SET gallery_num = '$gallery_num' WHERE map = '$_GET[map]'";
$result=mysql_query($query,$link) or die("DB���� Ȥ�� ������ �����Ͽ����ϴ�.??".mysql_error());

?>
<script language="javascript">
	document.location.href="gallery.php?map=<?=$_GET[map]?>";
</script>
