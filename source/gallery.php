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

<?php
// �����ͺ��̽� ����
include "./db_conn.php";

// �ش� �������� �Խ��� ���� �ٲٱ�
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
		<!-- ������ ����Ʈ ��� -->
	
		<table class="gallery">
		<!-- ������ �� ���� -->
			<tr class="heading">
				<td colspan=3>
					<?=$mapTitle?> ������
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
				<td colspan="3">HOT! �ְ��� ����Ʈ ��ǰ!</td>
			</tr>
			
			<tr class="best">
				<td>
					<a href="./gallery_show.php?map=<?=$_GET[map]?>&read_uno=<?=$gallery_num_best?>&pn=<?=$pn ?>&map_en=<?=$map_en ?>">
					<img border="0" src="<?=$image_best?>"></a>
					<hr>
					<p class="title"><?=$title_best?></p>
					<?=$id_best?><br>
					<?=$date_best?><br>
			    	��ȸ <?=$hits_best?> ��õ <?=$recommand_best?><br>
				</td>
				
				<td colspan=2 class="content">
					<?=$content_best?>
				</td>
			
			</tr>
			
			<tr class="title">
				<td colspan="3">�ǽð� ��ǰ</td>
			</tr>
			
			<?
			}
			
			// DB���� ���� ������ �Խù����� �����´�.
			$query="select num,gallery_num,id,recommand,hits,date,map,title,image  from gallery where map='$_GET[map]' order by gallery_num desc";
			$result=mysql_query($query,$link);

			// �Խù��� �� ����
			$total_record = mysql_num_rows($result);

			// $page_num : �� ȭ�鿡 ��� ����Ʈ�� �������� �����ϴ� ����
			$page_num=9;

			if ( ($total_record - $page_num) > 0 )
			{
				$list_num=$total_record / $page_num;
				$list_max=ceil($list_num);         // �ø�
			}
			else
				$list_max=1;
			// ----- ������ �� �����ϱ� -------
			if ($pn)
			{
				$list_st=$total_record - ($total_record-($pn - 1)* $page_num);
				$list_en=$list_st + $page_num;
				$article_no = $total_record - ($pn - 1) * $page_num;
			}
			else                    // ������ ��ȣ�� �������
			{
				$list_st=0;
				$list_en=$page_num;
				$article_no = $total_record;
			}

			// ----- ����Ʈ ����ϱ� ------
			if ( $list_en > $total_record )         // pn ���Ѱɱ�
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

			<!-- ������ �Խù��� ���̺�� ����Ѵ� -->
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
			    ��ȸ <?=$hits?>   ��õ <?=$recommand?><br>
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

			if(!$total_record) // �Խù��� �������� �������
			{
			?>
				<tr class="no_image">
					<td>��ϵ� ������ �����ϴ�.</td>
				</tr>
			<?php
			}
			?>
			
		</table>
	</div>
	<!-- ����Ʈ �� -->
	
	<hr>
	
	<!-- ������ ��ȣ ��� -->
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
					// ���� ������ 
					$pn_pr=$map_st -10;
					$map_st_pr = $map_st-10;
					$map_pr=$map_en-10;
					echo ("<font size=1 color=green> <a href=./gallery.php?map=$_GET[map]&pn=$pn_pr&map_st=$map_st_pr&map_en=$map_pr> <<���������� </a></font>");
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

				// ���������� 
				if  (floor($list_max / 10) > ($map_st / 10 ) )
				{
						$pn=$pn+1; // ���������� Ŭ���� �������� �ѷ�����ϴ� pn
					$map_ne = $map_en+10;
					$map_st_ne = $map_st + 10;
					echo ("<font size=1 color=green> <a href=./gallery.php?map=$_GET[map]&pn=$pn&map_st=$map_st_ne&map_en=$map_ne> ���� ������>> </a></font>");
				}
			}

		}

		?>
	</div>
	<!-- end of page_list div -->
	
	<div class="board_buttons">
		<ul>
			<li><a href="gallery_write.php?map=<?=$_GET[map]?>&pn=<?=$pn?>&map_st=<?=$map_st?>&map_en=<?=$map_en?>">�����ø���</a></li>
		</ul>
	</div>
	<!-- end of board_buttons div -->

</div>
<!-- end of center div -->

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