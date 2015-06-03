<?php
include "header.php";
include "db_conn.php";

$query = "SELECT title, content FROM board WHERE board_num=$_GET[modify_uno] AND map = '$_GET[map]'";
$result = mysql_query($query, $link);
$row = mysql_fetch_array($result);

?>
	

	<div class="left">			
		<h2>지역별 게시판</h2>
		<hr>
		<ul>
			<li><a href="board.php?map=seoul">서울</a></li>
		<li><a href="board.php?map=gyeonggi">경기도</a></li>
		<li><a href="board.php?map=incheon">인천</a></li>	
		<li><a href="board.php?map=chungbuk">충청북도</a></li>
		<li><a href="board.php?map=chungnam">충청남도</a></li>
		<li><a href="board.php?map=daejeon">대전</a></li>
		<li><a href="board.php?map=jeonbuk">전라북도</a></li>
		<li><a href="board.php?map=gwangju">광주</a></li>
		<li><a href="board.php?map=jeonnam">전라남도</a></li>
		<li><a href="board.php?map=jeju">제주도</a></li>
		</ul>
	</div>
	
	<div class="center">
		<h2>글 수정</h2>
		
		<hr>
		
		<form ACTION="modify_process.php?map=<?=$_GET[map]?>&modify_uno=<?=$_GET[modify_uno]?>&pn=<?=$_GET[pn]?>&map_st=<?=$GET_[map_st]?>
				$map_en=<?=$_GET[mep_en]?>" METHOD="POST"> 
			<table class="board_write">
				<tr class="title">
					<td class="h" width="50" height="30" align="center">제목</td>
					<td><input type="text" name="title" value="<?=$row[title]?>"></td>
				</tr>
				<tr>
					<td class="h" align="center">내용</td>
					<td><textarea name="content"><?=$row[content]?></textarea></td>
				</tr>
			</table>
			
			<hr>
			
			<center>
				<input type="submit" value="수정완료"></input>
			
			</center>
		</form>
	</div><!-- end of center div -->
	
	<div class="right">
		<h2>지역별 게시판</h2>
		<hr>
		<ul>
			<li><a href="board.php?map=gangwon">강원도</a></li><hr>
			<li><a href="board.php?map=gyeongbuk">경상북도</a></li><hr>
			<li><a href="board.php?map=daegu">대구</a></li><hr>
			<li><a href="board.php?map=ulleung">울릉도</a></li><hr>
			<li><a href="board.php?map=dokdo">독도</a></li><hr>
			<li><a href="board.php?map=ulsan">울산</a></li><hr>
			<li><a href="board.php?map=gyeongnam">경상남도</a></li><hr>
			<li><a href="board.php?map=busan">부산</a></li><hr>
		</ul>
	</div>

<?php include 'footer.php';?>