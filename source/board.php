<?php include "header.php"?>

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
$map_st=$_GET[map_st];
$refer = $_GET[refer];

?>

<div class="center">
	<div class="board">
	<br><br>
		
		<!-- 게시판 리스트 출력 -->
		<table class="board" align="center">

			<!-- 게시판 맨 윗줄 -->
			<tr class="heading">
				<td colspan=2>
					<?=$mapTitle?> 게시판
				</td>
			</tr>

			<?php
			// DB에서 현재 지역의 게시물들을 가져온다.
			$query="select num,board_num,id,recommand,hits,date,map,title,content  from board where map='$_GET[map]' order by board_num desc";
			$result=mysql_query($query,$link);

			// 게시물의 총 개수
			$total_record = mysql_num_rows($result);

			// $page_num : 한 화면에 몇개의 리스트를 보여줄지 설정하는 변수
			$page_num=10;

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


			for($i=$list_st ;$i < $list_en ;$i++)
			{
				$num = mysql_result($result, $i, 0);
				$board_num = mysql_result($result, $i, 1);
				$id = mysql_result($result, $i, 2);
				$recommand = mysql_result($result, $i, 3);
				$hits = mysql_result($result, $i, 4);
				$date = mysql_result($result, $i, 5);
				$map = mysql_result($result, $i, 6);
				$title = mysql_result($result, $i, 7);
				$content = mysql_result($result, $i, 8);
				
				$title= htmlspecialchars($title);
				$title = stripslashes($title);
				$date = date("Y-m-d h:i:s",$date);
				?>

			<!-- 가져온 게시물을 테이블로 출력한다 -->
			<tr>
				<td class="board_num"><?=$board_num?></td>
				<td>
				
				<p class="title"><a href="./board_show.php?map=<?=$_GET[map]?>&read_uno=<?=$board_num?>&pn=<?=$pn ?>&map_st=<?=$map_st?>&map_en=<?=$map_en ?>"><?=$title?></a></p>
				
				작성자 : <?=$id?> | 작성일 :  <?=$date?> | 조회수 : <?=$hits?>
				
				</td>
			</tr>
			
			<?php
			$article_no--;
			}

			if(!$total_record) // 게시물이 존재하지 않을경우
			{
				?>
			<tr>
				<td align="center">등록된 글이 없습니다.</td>
			</tr>
			<?php
			}
			?>
			
		</table>
	</div>
	<!-- 리스트 끝 -->
	
	<br>
	
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
				echo ("<a href=./board.php?map=$_GET[map]&pn=$pn>[$i]</a>");
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
					$pn_pr = $map_st-10;
					$map_st_pr = $map_st - 10;
					$map_en_pr = $map_en - 10;
					echo ("<font size=1 color=green> <a href=./board.php?map=$_GET[map]&pn=$pn_pr&map_st=$map_st_pr&map_en=$map_en_pr> <<이전페이지 </a></font>");
				}
				for ( $i=$map_st ; $i <= $map_en ; $i++ )
				{
					if ( $list_max >= $i )
					{
						$pn=$i; // 현재 map 에 나오는 index [??] 가 가져야 하는 값
						if($_GET[pn]==$i)
						{
							echo("<b>");
						}
						echo ("<a href=./board.php?map=$_GET[map]&pn=$pn&map_st=$map_st&map_en=$map_en>[$i]</a>");
						if($_GET[pn]==$i)
						{
							echo("</b>");
						}
					}
				}

				// 다음페이지 
				if  (floor($list_max / 10) > ($map_st / 10 ) )
				{
					$pn=$pn+1;           // 다음페이지 클릭시 페이지에 뿌려줘야하는 pn
					$map_st_ne = $map_st + 10;
					$map_en_ne = $map_en + 10;
					echo ("<font size=1 color=green> <a href=./board.php?map=$_GET[map]&pn=$pn&map_st=$map_st_ne&map_en=$map_en_ne> 다음 페이지>> </a></font>");
				}
			}

		}

		?>
	</div>
	<!-- end of page_list div -->
	
	<div class="board_buttons">
		<ul>
			<li><a href="board_write.php?map=<?=$_GET[map]?>&pn=<?=$pn?>&map_st=<?=$map_st?>&map_en=<?=$map_en?>">글쓰기</a></li>
		</ul>
	</div>
	<!-- end of board_buttons div -->

</div>
<!-- end of center div -->

<div class="right">
	<h2>지역별 게시판</h2>
	<hr>
	<ul>
		<li><a href="board.php?map=gangwon">강원도</a></li>
		<li><a href="board.php?map=gyeongbuk">경상북도</a></li>
		<li><a href="board.php?map=daegu">대구</a></li>
		<li><a href="board.php?map=ulleung">울릉도</a></li>
		<li><a href="board.php?map=dokdo">독도</a></li>
		<li><a href="board.php?map=ulsan">울산</a></li>
		<li><a href="board.php?map=gyeongnam">경상남도</a></li>
		<li><a href="board.php?map=busan">부산</a></li>
	</ul>
</div>

<?php include 'footer.php';?>