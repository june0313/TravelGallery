<?php
include"header.php";

include "./db_conn.php";

$query = "SELECT count(*) from gallery";
$result = mysql_query($query, $link);
$count = mysql_result($result,0,0);

$query = "SELECT gallery_num,id,recommand,hits,date,map,title,image from gallery order by date desc";
$result = mysql_query($query,$link);


if($count>=1)
{
			$gallery_num_new_1 = mysql_result($result, 0, 0);
			$id_new_1 = mysql_result($result, 0, 1);
			$recommand_new_1 = mysql_result($result, 0, 2);
			$hits_new_1 = mysql_result($result, 0, 3);
			$date_new_1 = mysql_result($result, 0, 4);
			$map_new_1 = mysql_result($result, 0, 5);
			$title_new_1 = mysql_result($result, 0, 6);
			$image_new_1 = mysql_result($result, 0, 7);

			$title_new_1= htmlspecialchars($title_new_1);
			$title_new_1 = stripslashes($title_new_1);
			$date_new_1 = date("Y-m-d h:i:s",$date_new_1);
}

if($count>=2)
{
			$gallery_num_new_2 = mysql_result($result, 1, 0);
			$id_new_2 = mysql_result($result, 1, 1);
			$recommand_new_2 = mysql_result($result, 1, 2);
			$hits_new_2 = mysql_result($result, 1, 3);
			$date_new_2 = mysql_result($result, 1, 4);
			$map_new_2 = mysql_result($result, 1, 5);
			$title_new_2 = mysql_result($result, 1, 6);
			$image_new_2 = mysql_result($result, 1, 7);

			$title_new_2= htmlspecialchars($title_new_2);
			$title_new_2 = stripslashes($title_new_2);
			$date_new_2 = date("Y-m-d h:i:s",$date_new_2);
}

if($count>=3)
{

			$gallery_num_new_3 = mysql_result($result, 2, 0);
			$id_new_3 = mysql_result($result, 2, 1);
			$recommand_new_3 = mysql_result($result, 2, 2);
			$hits_new_3 = mysql_result($result, 2, 3);
			$date_new_3 = mysql_result($result, 2, 4);
			$map_new_3 = mysql_result($result, 2, 5);
			$title_new_3 = mysql_result($result, 2, 6);
			$image_new_3 = mysql_result($result, 2, 7);

			$title_new_3= htmlspecialchars($title_new_3);
			$title_new_3 = stripslashes($title_new_3);
			$date_new_3 = date("Y-m-d h:i:s",$date_new_3);
}


$query = "SELECT gallery_num,id,recommand,hits,date,map,title,image from gallery order by recommand desc,hits desc";
$result = mysql_query($query,$link);


if($count>=1)
{
			$gallery_num_best_1 = mysql_result($result, 0, 0);
			$id_best_1 = mysql_result($result, 0, 1);
			$recommand_best_1 = mysql_result($result, 0, 2);
			$hits_best_1 = mysql_result($result, 0, 3);
			$date_best_1 = mysql_result($result, 0, 4);
			$map_best_1 = mysql_result($result, 0, 5);
			$title_best_1 = mysql_result($result, 0, 6);
			$image_best_1 = mysql_result($result, 0, 7);

			$title_best_1= htmlspecialchars($title_best_1);
			$title_best_1 = stripslashes($title_best_1);
			$date_best_1 = date("Y-m-d h:i:s",$date_best_1);
}


if($count>=2)
{
			$gallery_num_best_2 = mysql_result($result, 1, 0);
			$id_best_2 = mysql_result($result, 1, 1);
			$recommand_best_2 = mysql_result($result, 1, 2);
			$hits_best_2 = mysql_result($result, 1, 3);
			$date_best_2 = mysql_result($result, 1, 4);
			$map_best_2 = mysql_result($result, 1, 5);
			$title_best_2 = mysql_result($result, 1, 6);
			$image_best_2 = mysql_result($result, 1, 7);

			$title_best_2= htmlspecialchars($title_best_2);
			$title_best_2 = stripslashes($title_best_2);
			$date_best_2 = date("Y-m-d h:i:s",$date_best_2);
}


if($count>=3)
{
			$gallery_num_best_3 = mysql_result($result, 2, 0);
			$id_best_3 = mysql_result($result, 2, 1);
			$recommand_best_3 = mysql_result($result, 2, 2);
			$hits_best_3 = mysql_result($result, 2, 3);
			$date_best_3 = mysql_result($result, 2, 4);
			$map_best_3 = mysql_result($result, 2, 5);
			$title_best_3 = mysql_result($result, 2, 6);
			$image_best_3 = mysql_result($result, 2, 7);

			$title_best_3= htmlspecialchars($title_best_3);
			$title_best_3 = stripslashes($title_best_3);
			$date_best_3 = date("Y-m-d h:i:s",$date_best_3);
}

?>
	
				<div class="left">
					<div class="newhot">
					<h2>NEW</h2>
					최신 작품들을 감상해보세요!
					<hr>
					<table class="newhot">
					<?
					if($count==0)
					{
						?>
						게시물이 없습니다.
						<?
					}
					if($count>=1)
					{
					?>
					
					<tr>
						<td align="center">
					
					<a href="./gallery_show.php?map=<?=$map_new_1?>&read_uno=<?=$gallery_num_new_1?>&pn=<?=$pn ?>&map_en=<?=$map_en ?>">
					<img border="0" src="<?=$image_new_1?>"></a>
					<hr>
					<p class="title"><?=$title_new_1?></p>
					<?=$id_new_1?><br>
					<?=$date_new_1?><br>
			    	조회 <?=$hits_new_1?> 추천 <?=$recommand_new_1?><br>
						</td>
					</tr>

					<?}

					if($count>=2)
					{
					?>
					<tr>
						<td align="center">
					<a href="./gallery_show.php?map=<?=$map_new_2?>&read_uno=<?=$gallery_num_new_2?>&pn=<?=$pn ?>&map_en=<?=$map_en ?>">
					<img border="0" src="<?=$image_new_2?>"></a>
					<hr>
					<p class="title"><?=$title_new_2?></p>
					<?=$id_new_2?><br>
					<?=$date_new_2?><br>
			    	조회 <?=$hits_new_2?> 추천 <?=$recommand_new_2?><br>
						</td>
					</tr>
					<?
					}	
					if($count>=3)
					{
					?>
					<tr>
						<td align="center">
					<a href="./gallery_show.php?map=<?=$map_new_3?>&read_uno=<?=$gallery_num_new_3?>&pn=<?=$pn ?>&map_en=<?=$map_en ?>">
					<img border="0" src="<?=$image_new_3?>"></a>
					<hr>
					<p class="title"><?=$title_new_3?></p>
					<?=$id_new_3?><br>
					<?=$date_new_3?><br>
			    	조회 <?=$hits_new_3?> 추천 <?=$recommand_new_3?><br>
						</td>
					</tr>
					<?
					}	
					?>

					</table>

					
					</div>
					</div>

				<div class="center">
					<h2>지역별 갤러리</h2>
					원하는 지역을 클릭하세요.<br><br>
					<img src="test1.bmp" alt="Map" width="590" height="500" style="position:absolute; z-index:0;">

					<a href="gallery.php?map=seoul" class="tryitbtn" style="margin:60px 165px;">서 울</a>
					<a target="_self" href="gallery.php?map=gyeonggi" class="tryitbtn" style="margin:100px 160px;">경 기 도</a>
					<a target="_self" href="gallery.php?map=incheon" class="tryitbtn" style="margin:71px 60px;">인 천</a>
					<a target="_self" href="gallery.php?map=chungnam" class="tryitbtn" style="margin:150px 120px;">충 청 남 도</a>
					<a target="_self" href="gallery.php?map=chungbuk" class="tryitbtn" style="margin:130px 215px;">충 청 북 도</a>
					<a target="_self" href="gallery.php?map=daejeon" class="tryitbtn" style="margin:190px 200px;">대 전</a>
					<a target="_self" href="gallery.php?map=jeonbuk" class="tryitbtn" style="margin:258px 155px;">전 라 북 도</a>
					<a target="_self" href="gallery.php?map=gwangju" class="tryitbtn" style="margin:317px 150px;">광 주</a>
					<a target="_self" href="gallery.php?map=jeonnam" class="tryitbtn" style="margin:355px 135px;">전 라 남 도</a>
					<a target="_self" href="gallery.php?map=jeju" class="tryitbtn" style="margin:463px 111px;">제 주 도</a>
					<a target="_self" href="gallery.php?map=gangwon" class="tryitbtn" style="margin:48px 255px;">강 원 도</a>
					<a target="_self" href="gallery.php?map=gyeongbuk" class="tryitbtn" style="margin:180px 280px;">경 상 북 도</a>
					<a target="_self" href="gallery.php?map=daegu" class="tryitbtn" style="margin:243px 300px;">대 구</a>
					<a target="_self" href="gallery.php?map=gyeongnam" class="tryitbtn" style="margin:293px 245px;">경 상 남 도</a>
					<a target="_self" href="gallery.php?map=ulsan" class="tryitbtn" style="margin:283px 370px;">울 산</a>
					<a target="_self" href="gallery.php?map=busan" class="tryitbtn" style="margin:321px 355px;">부 산</a>
					<a target="_self" href="gallery.php?map=ulleung" class="tryitbtn" style="margin:80px 455px;">울 릉 도</a>
					<a target="_self" href="gallery.php?map=dokdo" class="tryitbtn" style="margin:105px 533px;">독 도</a>
				
				</div>

				<div class="right">
				<div class="newhot">
					<h2>HOT</h2>
					가장 인기있는 작품들을 감상해보세요!
					<hr>
					<table class="newhot">
					<?
					if($count==0)
					{
						?>
					     게시물이 없습니다.
						<?
					}
					if($count>=1)
					{
					?>
					<tr>
						<td align="center">
					<a href="./gallery_show.php?map=<?=$map_best_1?>&read_uno=<?=$gallery_num_best_1?>&pn=<?=$pn ?>&map_en=<?=$map_en ?>">
					<img border="0" src="<?=$image_best_1?>"></a>
					<hr>
					<p class="title"><?=$title_best_1?></p>
					<?=$id_best_1?><br>
					<?=$date_best_1?><br>
			    	조회 <?=$hits_best_1?> 추천 <?=$recommand_best_1?><br>
						</td>
					</tr>
					<?
					}	
					if($count>=2)
					{
					?>
					<tr>
						<td align="center">
					<a href="./gallery_show.php?map=<?=$map_best_2?>&read_uno=<?=$gallery_num_best_2?>&pn=<?=$pn ?>&map_en=<?=$map_en ?>">
					<img border="0" src="<?=$image_best_2?>"></a>
					<hr>
					<p class="title"><?=$title_best_2?></p>
					<?=$id_best_2?><br>
					<?=$date_best_2?><br>
			    	조회 <?=$hits_best_2?> 추천 <?=$recommand_best_2?><br>
						</td>
					</tr>
					<?
					}
					if($count>=3)
					{
					?>
					<tr>
						<td align="center">
					<a href="./gallery_show.php?map=<?=$map_best_3?>&read_uno=<?=$gallery_num_best_3?>&pn=<?=$pn ?>&map_en=<?=$map_en ?>">
					<img border="0" src="<?=$image_best_3?>"></a>
					<hr>
					<p class="title"><?=$title_best_3?></p>
					<?=$id_best_3?><br>
					<?=$date_best_3?><br>
			    	조회 <?=$hits_best_3?> 추천 <?=$recommand_best_3?><br>
						</td>
					</tr>
				
					<?
					}
					?>
						</table>
				</div>
				</div>

<?php include 'footer.php';?>
