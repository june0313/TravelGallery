<?php
include "header.php";
include "db_conn.php";

$query = "SELECT title, content,image FROM gallery WHERE gallery_num=$_GET[modify_uno] AND map = '$_GET[map]'";
$result = mysql_query($query, $link);
$row = mysql_fetch_array($result);

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
		<h2>���� ����</h2>
		
		<hr>
		
		<form ACTION="gallery_modify_process.php?map=<?=$_GET[map]?>&modify_uno=<?=$_GET[modify_uno]?>&pn=<?=$pn?>" METHOD="POST"> 
			<table class="board_write">
				<tr class="title">
					<td class="h" width="50" height="30" align="center">����</td>
					<td><input type="text" name="title" value="<?=$row[title]?>"></td>
				</tr>

				<tr class="title">
				<td class="h" width="50" height="30" align="center">����</td>
				<td><input type="text" name="image" value=<?=$row[image]?>></td>
			    </tr>

				<tr>
					<td class="h" align="center">����</td>
					<td><textarea name="content"><?=$row[content]?></textarea></td>
				</tr>
			</table>
			
			<hr>
			
			<center>
				<input type="submit" value="�����Ϸ�"></input>
			
			</center>
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

<?php include 'footer.php';?>