<?php include "header.php"?>
	

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
		<h2>���� ���� �Ͻðڽ��ϱ�?</h2>
		
		<hr>
		
		<form ACTION="gallery_delete_process.php?map=<?=$_GET[map]?>&read_uno=<?=$_GET[read_uno]?>&pn=<?=$pn?>" METHOD="POST"> 
			
			
			<center>
				<input type="submit" value="Ȯ��"></input>
				<form ACTION="./gallery_show.php?map=<?=$_GET[map]?>&read_uno=<?=$_GET[read_uno]?>&pn=<?=$pn ?>" METHOD="POST"> 
				<input type="button" value="���" onclick="history.back()"></input>
				</form>
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