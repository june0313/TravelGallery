<?php include "header.php"?>


<?php
// 데이터베이스 연결
include "./db_conn.php";

// 해당 지역별로 게시판 제목 바꾸기
include "./titleTransfer.php";
	
$read_uno=$_GET[read_uno];
$pn=$_GET[pn];
$map_en=$_GET[map_en];

if( empty($_SESSION["name"]) )
{
?>
	<script type="text/javascript"> 
   		location.href = "login.php";
    </script> 
<?php
}

?>
<div class="left">
</div>

<div class="center">
	
		<!-- 갤러리의 타이틀 출력 -->
		<h2>MY 갤러리</h2>
		<hr>
		
		<div class="gallery">
		<!-- 갤러리 리스트 출력 -->
	
		<table class="gallery">

			<tr class="realtime">
				<td colspan="3">내가 올린 작품</td>
			</tr>
			
			<?
			
			// DB에서 현재 지역의 게시물들을 가져온다.
			$query="select num,gallery_num,id,recommand,hits,date,map,title,image  from gallery where id='$_SESSION[id]' order by date desc";
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
				<td>
				<a href="./gallery_show.php?map=<?=$map?>&read_uno=<?=$gallery_num?>&pn=<?=$pn ?>&map_en=<?=$map_en ?>">
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
				echo"등록된 사진이 없습니다.";
			}
			?>
			
		</table>
	</div>
	<!-- 리스트 끝 -->
	
	<hr>
	
	<!-- 페이지 번호 출력 -->
	<div class="page_list">
		<?php
		if  ( $list_max < 9 )
		{
			for ( $i=1 ; $i<$list_max+1  ; $i++ )
			{
				$pn=$i;
				echo ("<a href=./mypage_gallery.php?map=$_GET[map]&pn=$pn>[$i]</a>");
			}
		}
		else
		{

			if (!$map_en)
			{
				$map_st=$list_max-($list_max-1);
				$map_en=$list_max-($list_max-9);
			}
			else
			{
				$map_st=$map_en+1;
				$map_en=$map_en+9;
			}
			if ( $list_max > 9 )
			{
				if (( $map_en > 9 ))
				{
					// 이전 페이지 
					$pn_pr=$map_st -9;
					$map_pr=$map_en-18;
					echo ("<font size=1 color=green> <a href=./mypage_gallery.php?map=$_GET[map]&pn=$pn_pr&map_en=$map_pr> <<이전페이지 </a></font>");
				}
				for ( $i=$map_st ; $i <= $map_en ; $i++ )
				{
					if ( $list_max >= $i )
					{
						$pn=$i;
						$map=$map_en-9;      // 현재 map 에 나오는 index [??] 가 가져야 하는 값
						echo ("<a href=./mypage_gallery.php?map=$_GET[map]&pn=$pn&map_en=$map>[$i]</a>");
					}
				}

				// 다음페이지 
				if  (floor($list_max / 9) > ($map_st / 9 ) )
				{
					$pn=$pn+1;           // 다음페이지 클릭시 페이지에 뿌려줘야하는 pn
					echo ("<font size=1 color=green> <a href=./mypage_gallery.php?map=$_GET[map]&pn=$pn&map_en=$map_en> 다음 페이지>> </a></font>");
				}
			}

		}

		?>
	</div>
	<!-- end of page_list div -->
	

</div>
<!-- end of center div -->

<div class="right">
</div>


<?php include 'footer.php';?>