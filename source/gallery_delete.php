<?php include "header.php"?>
	

	<div class="left">			
		<h2>지역별 갤러리</h2>
		<hr>
		<ul>
			<li><a href="gallery.php?map=seoul">서울</a></li>
		<li><a href="gallery.php?map=gyeonggi">경기도</a></li>
		<li><a href="gallery.php?map=incheon">인천</a></li>	
		<li><a href="gallery.php?map=chungbuk">충청북도</a></li>
		<li><a href="gallery.php?map=chungnam">충청남도</a></li>
		<li><a href="gallery.php?map=daejeon">대전</a></li>
		<li><a href="gallery.php?map=jeonbuk">전라북도</a></li>
		<li><a href="gallery.php?map=gwangju">광주</a></li>
		<li><a href="gallery.php?map=jeonnam">전라남도</a></li>
		<li><a href="gallery.php?map=jeju">제주도</a></li>
		</ul>
	</div>
	
	<div class="center">
		<h2>글을 삭제 하시겠습니까?</h2>
		
		<hr>
		
		<form ACTION="gallery_delete_process.php?map=<?=$_GET[map]?>&read_uno=<?=$_GET[read_uno]?>&pn=<?=$pn?>" METHOD="POST"> 
			
			
			<center>
				<input type="submit" value="확인"></input>
				<form ACTION="./gallery_show.php?map=<?=$_GET[map]?>&read_uno=<?=$_GET[read_uno]?>&pn=<?=$pn ?>" METHOD="POST"> 
				<input type="button" value="취소" onclick="history.back()"></input>
				</form>
			</center>
		</form>
			
			
		
	</div><!-- end of center div -->
	
	<div class="right">
		<h2>지역별 갤러리</h2>
		<hr>
		<ul>
			<li><a href="gallery.php?map=gangwon">강원도</a></li>
		<li><a href="gallery.php?map=gyeongbuk">경상북도</a></li>
		<li><a href="gallery.php?map=daegu">대구</a></li>
		<li><a href="gallery.php?map=ulleung">울릉도</a></li>
		<li><a href="gallery.php?map=dokdo">독도</a></li>
		<li><a href="gallery.php?map=ulsan">울산</a></li>
		<li><a href="gallery.php?map=gyeongnam">경상남도</a></li>
		<li><a href="gallery.php?map=busan">부산</a></li>
		</ul>
	</div>

<?php include 'footer.php';?>