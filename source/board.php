<?php include "header.php"?>

<div class="left">
	<h2>������ �Խ���</h2>
	<hr>
	<ul>
		<li><a href="board.php?map=seoul">����</a></li>
		<li><a href="board.php?map=gyeonggi">��⵵</a></li>
		<li><a href="board.php?map=incheon">��õ</a></li>	
		<li><a href="board.php?map=chungbuk">��û�ϵ�</a></li>
		<li><a href="board.php?map=chungnam">��û����</a></li>
		<li><a href="board.php?map=daejeon">����</a></li>
		<li><a href="board.php?map=jeonbuk">����ϵ�</a></li>
		<li><a href="board.php?map=gwangju">����</a></li>
		<li><a href="board.php?map=jeonnam">���󳲵�</a></li>
		<li><a href="board.php?map=jeju">���ֵ�</a></li>
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
$map_st=$_GET[map_st];
$refer = $_GET[refer];

?>

<div class="center">
	<div class="board">
	<br><br>
		
		<!-- �Խ��� ����Ʈ ��� -->
		<table class="board" align="center">

			<!-- �Խ��� �� ���� -->
			<tr class="heading">
				<td colspan=2>
					<?=$mapTitle?> �Խ���
				</td>
			</tr>

			<?php
			// DB���� ���� ������ �Խù����� �����´�.
			$query="select num,board_num,id,recommand,hits,date,map,title,content  from board where map='$_GET[map]' order by board_num desc";
			$result=mysql_query($query,$link);

			// �Խù��� �� ����
			$total_record = mysql_num_rows($result);

			// $page_num : �� ȭ�鿡 ��� ����Ʈ�� �������� �����ϴ� ����
			$page_num=10;

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

			<!-- ������ �Խù��� ���̺�� ����Ѵ� -->
			<tr>
				<td class="board_num"><?=$board_num?></td>
				<td>
				
				<p class="title"><a href="./board_show.php?map=<?=$_GET[map]?>&read_uno=<?=$board_num?>&pn=<?=$pn ?>&map_st=<?=$map_st?>&map_en=<?=$map_en ?>"><?=$title?></a></p>
				
				�ۼ��� : <?=$id?> | �ۼ��� :  <?=$date?> | ��ȸ�� : <?=$hits?>
				
				</td>
			</tr>
			
			<?php
			$article_no--;
			}

			if(!$total_record) // �Խù��� �������� �������
			{
				?>
			<tr>
				<td align="center">��ϵ� ���� �����ϴ�.</td>
			</tr>
			<?php
			}
			?>
			
		</table>
	</div>
	<!-- ����Ʈ �� -->
	
	<br>
	
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
					// ���� ������ 
					$pn_pr = $map_st-10;
					$map_st_pr = $map_st - 10;
					$map_en_pr = $map_en - 10;
					echo ("<font size=1 color=green> <a href=./board.php?map=$_GET[map]&pn=$pn_pr&map_st=$map_st_pr&map_en=$map_en_pr> <<���������� </a></font>");
				}
				for ( $i=$map_st ; $i <= $map_en ; $i++ )
				{
					if ( $list_max >= $i )
					{
						$pn=$i; // ���� map �� ������ index [??] �� ������ �ϴ� ��
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

				// ���������� 
				if  (floor($list_max / 10) > ($map_st / 10 ) )
				{
					$pn=$pn+1;           // ���������� Ŭ���� �������� �ѷ�����ϴ� pn
					$map_st_ne = $map_st + 10;
					$map_en_ne = $map_en + 10;
					echo ("<font size=1 color=green> <a href=./board.php?map=$_GET[map]&pn=$pn&map_st=$map_st_ne&map_en=$map_en_ne> ���� ������>> </a></font>");
				}
			}

		}

		?>
	</div>
	<!-- end of page_list div -->
	
	<div class="board_buttons">
		<ul>
			<li><a href="board_write.php?map=<?=$_GET[map]?>&pn=<?=$pn?>&map_st=<?=$map_st?>&map_en=<?=$map_en?>">�۾���</a></li>
		</ul>
	</div>
	<!-- end of board_buttons div -->

</div>
<!-- end of center div -->

<div class="right">
	<h2>������ �Խ���</h2>
	<hr>
	<ul>
		<li><a href="board.php?map=gangwon">������</a></li>
		<li><a href="board.php?map=gyeongbuk">���ϵ�</a></li>
		<li><a href="board.php?map=daegu">�뱸</a></li>
		<li><a href="board.php?map=ulleung">�︪��</a></li>
		<li><a href="board.php?map=dokdo">����</a></li>
		<li><a href="board.php?map=ulsan">���</a></li>
		<li><a href="board.php?map=gyeongnam">��󳲵�</a></li>
		<li><a href="board.php?map=busan">�λ�</a></li>
	</ul>
</div>

<?php include 'footer.php';?>