<?php
include "header.php";

// 로그인이 되어있지 않으면 로그인 페이지로 이동시킨다.
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

	<h2>사진올리기</h2>

	<hr>

	<form enctype="multipart/form-data" ACTION="gallery_write_process.php?map=<?=$_GET[map]?>" METHOD="POST">
		<table class="board_write">
			<tr class="title">
				<td class="h" width="50" height="30" align="center">제목</td>
				<td><input type="text" name="title"></td>
			</tr>


			<tr class="title">
				<td class="h" width="50" height="30" align="center">사진</td>
				<td><input type="file" name="image"></td>
			</tr>


			<tr>
				<td class="h" align="center">내용</td>
				<td><textarea name="content"></textarea></td>
			</tr>
		</table>

		<hr>

		<div class="board_buttons">
		<center>
			<ul>
				<li><a href = "./gallery.php?map=<?=$map?>&pn=<?=$pn?>&map_st=<?=$map_st?>&map_en=<?=$map_en?>">목록</a></li>
				<li><input type="submit" value="확인"></li>
			</ul>
		</center>
		</div>
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

<?php 
include 'footer.php';
?>