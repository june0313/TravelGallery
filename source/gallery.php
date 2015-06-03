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

<?php
// 데이터베이스 연결
include "./db_conn.php";

// 해당 지역별로 게시판 제목 바꾸기
include "./titleTransfer.php";
if(empty($_GET[pn]))
{
	$_GET[pn]=1;
}
$read_uno=$_GET[read_uno];
$pn=$_GET[pn];
$map_en=$_GET[map_en];
$map_st = $_GET[map_st];
?>

<div class="center">
	<br><br>
		
		<div class="gallery">
		<!-- 갤러리 리스트 출력 -->
	
		<table class="gallery">
		<!-- 갤러리 맨 윗줄 -->
			<tr class="heading">
				<td colspan=3>
					<?=$mapTitle?> 갤러리
				</td>
			</tr>
			
			<?php
			$query = "SELECT num,gallery_num,id,recommand,hits,date,map,title,image,content from gallery where map='$_GET[map]' order by recommand desc";
			$result = mysql_query($query,$link);
			
			$total_record = mysql_num_rows($result);
			
			if($total_record)
			{
			
			$num_best = mysql_result($result, 0, 0);
			$gallery_num_best = mysql_result($result, 0, 1);
			$id_best = mysql_result($result, 0, 2);
			$recommand_best = mysql_result($result, 0, 3);
			$hits_best = mysql_result($result, 0, 4);
			$date_best = mysql_result($result, 0, 5);
			$map_best = mysql_result($result, 0, 6);
			$title_best = mysql_result($result, 0, 7);
			$image_best = mysql_result($result, 0, 8);
			$content_best = mysql_result($result, 0, 9);
				
			$title_best= htmlspecialchars($title_best);
			$title_best = stripslashes($title_best);
			$date_best = date("Y-m-d h:i:s",$date_best);
			$content_best = htmlspecialchars($content_best);
			$content_best = nl2br($content_best);
			?>
			<tr class="title">
				<td colspan="3">HOT! 최고의 베스트 작품!</td>
			</tr>
			
			<tr class="best">
				<td>
					<a href="./gallery_show.php?map=<?=$_GET[map]?>&read_uno=<?=$gallery_num_best?>&pn=<?=$pn ?>&map_en=<?=$map_en ?>">
					<img border="0" src="<?=$image_best?>"></a>
					<hr>
					<p class="title"><?=$title_best?></p>
					<?=$id_best?><br>
					<?=$date_best?><br>
			    	조회 <?=$hits_best?> 추천 <?=$recommand_best?><br>
				</td>
				
				<td colspan=2 class="content">
					<?=$content_best?>
				</td>
			
			</tr>
			
			<tr class="title">
				<td colspan="3">실시간 작품</td>
			</tr>
			
			<?
			}
			
			// DB에서 현재 지역의 게시물들을 가져온다.
			$query="select num,gallery_num,id,recommand,hits,date,map,title,image  from gallery where map='$_GET[map]' order by gallery_num desc";
			$result=mysql_query($query,$link);

			// 게시물의 총 개수
			$total_record = mysql_num_rows($result);

			// $page_num : 한 화면에 몇개의 리스트를 보여줄지 설정하는 변수
			$page_num=9;

			if ( ($total_record - $page_num) > 0 )
			{
				$list_num=$total_record / $page_num;
				$list_max=ceil($list_num);         // 올림
			}
			else
				$list_max=1;
			// ----- 페이지 맵 구현하기 -------
			if ($pn)
			{
				$list_st=$total_record - ($total_record-($pn - 1)* $page_num);
				$list_en=$list_st + $page_num;
				$article_no = $total_record - ($pn - 1) * $page_num;
			}
			else                    // 페이지 번호가 없을경우
			{
				$list_st=0;
				$list_en=$page_num;
				$article_no = $total_record;
			}

			// ----- 리스트 출력하기 ------
			if ( $list_en > $total_record )         // pn 제한걸기
				$list_en=$total_record;


			$j = 0;

			for($i=$list_st ;$i < $list_en ;$i++)
			{
				$num = mysql_result($result, $i, 0);
				$gallery_num = mysql_result($result, $i, 1);
				$id = mysql_result($result, $i, 2);
				$recommand = mysql_result($result, $i, 3);
				$hits = mysql_result($result, $i, 4);
				$date = mysql_result($result, $i, 5);
				$map = mysql_result($result, $i, 6);
				$title = mysql_result($result, $i, 7);
				$image = mysql_result($result, $i, 8);
				
				$title= htmlspecialchars($title);
				$title = stripslashes($title);
				$date = date("Y-m-d h:i:s",$date);

				if($j==0||$j==3)
				{
			?>

			<!-- 가져온 게시물을 테이블로 출력한다 -->
			<tr class="list">
			<?
			}
			?>
				<td >
					<a href="./gallery_show.php?map=<?=$_GET[map]?>&read_uno=<?=$gallery_num?>&pn=<?=$pn ?>&map_st=<?=$map_st?>map_en=<?=$map_en ?>">
					<img border="0" src="<?=$image?>">
					</a>
					<hr>
					<p class="title"><?=$title?></p>
					<?=$id?><br>
					<?=$date?><br>
			    조회 <?=$hits?>   추천 <?=$recommand?><br>
				</td>
			<?
				if($j==2||$j==5)
				{
			?>
				</tr>
			<?
				}
			?>
			
			<?php
			$j++;
			$article_no--;
			}

			if(!$total_record) // 게시물이 존재하지 않을경우
			{
			?>
				<tr class="no_image">
					<td>등록된 사진이 없습니다.</td>
				</tr>
			<?php
			}
			?>
			
		</table>
	</div>
	<!-- 리스트 끝 -->
	
	<hr>
	
	<!-- 페이지 번호 출력 -->
	<div class="page_list">
		<?php
		if  ( $list_max < 10 )
		{
			for ( $i=1 ; $i<$list_max+1  ; $i++ )
			{
				$pn=$i;
				if($_GET[pn]==$i)
				{
					echo("<b>");
				}
				echo ("<a href=./gallery.php?map=$_GET[map]&pn=$pn>[$i]</a>");
				if($_GET[pn]==$i)
				{
					echo("</b>");
				}
			}
		}
		else
		{

			if (!$map_en||$map_en==0)
			{
				$map_st=1;
				$map_en=10;
			}
			if ( $list_max >= 10 )
			{
				if (( $map_en > 10 ))
				{
					// 이전 페이지 
					$pn_pr=$map_st -10;
					$map_st_pr = $map_st-10;
					$map_pr=$map_en-10;
					echo ("<font size=1 color=green> <a href=./gallery.php?map=$_GET[map]&pn=$pn_pr&map_st=$map_st_pr&map_en=$map_pr> <<이전페이지 </a></font>");
				}
				for ( $i=$map_st ; $i <= $map_en ; $i++ )
				{
					if ( $list_max >= $i )
					{
						$pn=$i;   
						if($_GET[pn]==$i)
						{
							echo("<b>");
						}
						echo ("<a href=./gallery.php?map=$_GET[map]&pn=$pn&map_st=$map_st&map_en=$map_en>[$i]</a>");
						if($_GET[pn]==$i)
						{
							echo("</b>");
						}
					}
				}

				// 다음페이지 
				if  (floor($list_max / 10) > ($map_st / 10 ) )
				{
						$pn=$pn+1; // 다음페이지 클릭시 페이지에 뿌려줘야하는 pn
					$map_ne = $map_en+10;
					$map_st_ne = $map_st + 10;
					echo ("<font size=1 color=green> <a href=./gallery.php?map=$_GET[map]&pn=$pn&map_st=$map_st_ne&map_en=$map_ne> 다음 페이지>> </a></font>");
				}
			}

		}

		?>
	</div>
	<!-- end of page_list div -->
	
	<div class="board_buttons">
		<ul>
			<li><a href="gallery_write.php?map=<?=$_GET[map]?>&pn=<?=$pn?>&map_st=<?=$map_st?>&map_en=<?=$map_en?>">사진올리기</a></li>
		</ul>
	</div>
	<!-- end of board_buttons div -->

</div>
<!-- end of center div -->

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