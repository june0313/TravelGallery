<?
include "header.php";

// 데이터베이스 연결
include "./db_conn.php";

// 지역별로 게시판 제목 바꾸기
include "./titleTransfer.php";

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

	<br><br>
	<!-- 게시물 내용 출력 -->
	<div class="board">
		<?php
		$table_name="gallery";
		$read_uno=$_GET[read_uno];
		$pn=$_GET[pn];
		$map_en=$_GET[map_en];
		$map_st=$_GET[map_st];
		$map = $_GET[map];
		
		// 클릭한 게시글의 조회수를 1 증가시킨다.
		$query = "update $table_name set hits = hits + 1 where gallery_num = $read_uno && map='$map'";
		$result = mysql_query($query,$link) or die("DB접속 혹은 쿼리에 실패하였습니다.".mysql_error());;
		
		// 클릭한 게시글의 제목, 작성자, 추천수, 게시날짜, 내용, 지역을 가져온다.
		$query="select title, id, hits, recommand, date, content, image from $table_name where gallery_num = $read_uno && map='$map'";
		$result = mysql_query($query,$link) or die("DB접속 혹은 쿼리에 실패하였습니다.".mysql_error());
		
		// 가져온 데이터를 각각의 변수에 담는다.
		$title = mysql_result($result,0,0);
		$id = mysql_result($result,0,1);
		$hits = mysql_result($result, 0, 2);
		$recommand = mysql_result($result, 0, 3);
		$date = mysql_result($result, 0, 4);
		$content = mysql_result($result, 0, 5);
		$image = mysql_result($result,0,6);
		
		$date = date("Y-m-d h:i:s",$date);
		$content = htmlspecialchars($content);
		$content = nl2br($content);
		?>

		<!-- 변수의 내용을 출력한다 -->

		<table class="gallery_show">
			<tr class="heading">
				<td>
					<?=$mapTitle?> 갤러리
				</td>
			</tr>

			<tr class="title">
				<td>
					<?=$title?>
				</td>
			</tr>

			<tr>
				<td>
					작성자 : <?=$id?> | 작성일 :  <?=$date?> | 조회수 : <?=$hits?> | 추천수 : <?=$recommand?>
				</td>
			</tr>

			<tr class="content">
				<td>
				<img border="0" src="<?=$image?>"><br>
				<?=$content?>
				</td>
			</tr>
		</table>
	</div>

	<hr>
	
	<div class="board_buttons">
		<ul>
			<li><a href = "gallery_write.php?map=<?=$_GET[map]?>&pn=<?=$pn?>&map_st=<?=$map_st?>&map_en=<?=$map_en?>">사진올리기</a></li>
			<?php 
			// 게시물의 ID가 현재 로그인한 ID와 같은 경우에만 삭제, 수정 버튼을 출력한다.
			if($id==$_SESSION['id']||$_SESSION['id']=='admin')
			{
			?>
			<li><a href = "gallery_delete.php?map=<?=$map?>&read_uno=<?=$read_uno ?>&pn=<?=$pn ?>">삭제</a></li>
			<?
			}
			if($id==$_SESSION['id'])
			{
			?>
			<li><a href = "gallery_modify.php?map=<?=$map?>&modify_uno=<?=$read_uno ?>&pn=<?=$pn ?>">수정</a></li>
			<?php
			} 
			?>
			<li><a href = "gallery.php?map=<?=$map?>&pn=<?=$pn?>&map_st=<?=$map_st?>&map_en=<?=$map_en?>">목록</a></li>
			<?
			if($_SESSION['id'])
			{
			?>
			<li><a href = "recommand.php?map=<?=$map?>&modify_uno=<?=$read_uno ?>&pn=<?=$pn ?>">추천!</a></li>
			<?
			}
			?>
			
 
			
		</ul>
	</div>
		<!-- end of board_buttons div-->
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