<?php include "header.php"?>


<?php
// �����ͺ��̽� ����
include "./db_conn.php";

// �ش� �������� �Խ��� ���� �ٲٱ�
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
	
		<!-- �������� Ÿ��Ʋ ��� -->
		<h2>MY ������</h2>
		<hr>
		
		<div class="gallery">
		<!-- ������ ����Ʈ ��� -->
	
		<table class="gallery">

			<tr class="realtime">
				<td colspan="3">���� �ø� ��ǰ</td>
			</tr>
			
			<?
			
			// DB���� ���� ������ �Խù����� �����´�.
			$query="select num,gallery_num,id,recommand,hits,date,map,title,image  from gallery where id='$_SESSION[id]' order by date desc";
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
				<td>
				<a href="./gallery_show.php?map=<?=$map?>&read_uno=<?=$gallery_num?>&pn=<?=$pn ?>&map_en=<?=$map_en ?>">
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
				echo"��ϵ� ������ �����ϴ�.";
			}
			?>
			
		</table>
	</div>
	<!-- ����Ʈ �� -->
	
	<hr>
	
	<!-- ������ ��ȣ ��� -->
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
					// ���� ������ 
					$pn_pr=$map_st -9;
					$map_pr=$map_en-18;
					echo ("<font size=1 color=green> <a href=./mypage_gallery.php?map=$_GET[map]&pn=$pn_pr&map_en=$map_pr> <<���������� </a></font>");
				}
				for ( $i=$map_st ; $i <= $map_en ; $i++ )
				{
					if ( $list_max >= $i )
					{
						$pn=$i;
						$map=$map_en-9;      // ���� map �� ������ index [??] �� ������ �ϴ� ��
						echo ("<a href=./mypage_gallery.php?map=$_GET[map]&pn=$pn&map_en=$map>[$i]</a>");
					}
				}

				// ���������� 
				if  (floor($list_max / 9) > ($map_st / 9 ) )
				{
					$pn=$pn+1;           // ���������� Ŭ���� �������� �ѷ�����ϴ� pn
					echo ("<font size=1 color=green> <a href=./mypage_gallery.php?map=$_GET[map]&pn=$pn&map_en=$map_en> ���� ������>> </a></font>");
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