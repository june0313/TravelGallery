<?php
include "header.php";

// �α����� �Ǿ����� ������ �α��� �������� �̵���Ų��.
if( empty($_SESSION["name"]) )
{
?>
	<script type="text/javascript"> 
   		location.href = "login.php";
    </script> 
<?php
}
$pn=$_GET[pn];
$map_en=$_GET[map_en];
$map_st = $_GET[map_st];
?>

<div class="left">
	<h2>������ ������</h2>
	<hr>
	<ul>
		<li><a href="gallery.php?map=seoul">����</a></li>
		<li><a href="gallery.php?map=gyeonggi">��⵵</a></li>
		<li><a href="gallery.php?map=incheon">��õ</a></li>	
		<li><a href="gallery.php?map=chungbuk">��û�ϵ�</a></li>
		<li><a href="gallery.php?map=chungnam">��û����</a></li>
		<li><a href="gallery.php?map=daejeon">����</a></li>
		<li><a href="gallery.php?map=jeonbuk">����ϵ�</a></li>
		<li><a href="gallery.php?map=gwangju">����</a></li>
		<li><a href="gallery.php?map=jeonnam">���󳲵�</a></li>
		<li><a href="gallery.php?map=jeju">���ֵ�</a></li>
	</ul>
</div>

<div class="center">

	<h2>�����ø���</h2>

	<hr>

	<form enctype="multipart/form-data" ACTION="gallery_write_process.php?map=<?=$_GET[map]?>" METHOD="POST">
		<table class="board_write">
			<tr class="title">
				<td class="h" width="50" height="30" align="center">����</td>
				<td><input type="text" name="title"></td>
			</tr>


			<tr class="title">
				<td class="h" width="50" height="30" align="center">����</td>
				<td><input type="file" name="image"></td>
			</tr>


			<tr>
				<td class="h" align="center">����</td>
				<td><textarea name="content"></textarea></td>
			</tr>
		</table>

		<hr>

		<div class="board_buttons">
		<center>
			<ul>
				<li><a href = "./gallery.php?map=<?=$map?>&pn=<?=$pn?>&map_st=<?=$map_st?>&map_en=<?=$map_en?>">���</a></li>
				<li><input type="submit" value="Ȯ��"></li>
			</ul>
		</center>
		</div>
	</form>

</div><!-- end of center div -->
	
	<div class="right">
		<h2>������ ������</h2>
		<hr>
		<ul>
			<li><a href="gallery.php?map=gangwon">������</a></li>
		<li><a href="gallery.php?map=gyeongbuk">���ϵ�</a></li>
		<li><a href="gallery.php?map=daegu">�뱸</a></li>
		<li><a href="gallery.php?map=ulleung">�︪��</a></li>
		<li><a href="gallery.php?map=dokdo">����</a></li>
		<li><a href="gallery.php?map=ulsan">���</a></li>
		<li><a href="gallery.php?map=gyeongnam">��󳲵�</a></li>
		<li><a href="gallery.php?map=busan">�λ�</a></li>
		</ul>
	</div>

<?php 
include 'footer.php';
?>