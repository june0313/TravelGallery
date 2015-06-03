<?
include "header.php";

// �����ͺ��̽� ����
include "./db_conn.php";

// �������� �Խ��� ���� �ٲٱ�
include "./titleTransfer.php";

?>

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

<div class="center">

	<br><br>
	<!-- �Խù� ���� ��� -->
	<div class="board">
		<?php
		$table_name="gallery";
		$read_uno=$_GET[read_uno];
		$pn=$_GET[pn];
		$map_en=$_GET[map_en];
		$map_st=$_GET[map_st];
		$map = $_GET[map];
		
		// Ŭ���� �Խñ��� ��ȸ���� 1 ������Ų��.
		$query = "update $table_name set hits = hits + 1 where gallery_num = $read_uno && map='$map'";
		$result = mysql_query($query,$link) or die("DB���� Ȥ�� ������ �����Ͽ����ϴ�.".mysql_error());;
		
		// Ŭ���� �Խñ��� ����, �ۼ���, ��õ��, �Խó�¥, ����, ������ �����´�.
		$query="select title, id, hits, recommand, date, content, image from $table_name where gallery_num = $read_uno && map='$map'";
		$result = mysql_query($query,$link) or die("DB���� Ȥ�� ������ �����Ͽ����ϴ�.".mysql_error());
		
		// ������ �����͸� ������ ������ ��´�.
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

		<!-- ������ ������ ����Ѵ� -->

		<table class="gallery_show">
			<tr class="heading">
				<td>
					<?=$mapTitle?> ������
				</td>
			</tr>

			<tr class="title">
				<td>
					<?=$title?>
				</td>
			</tr>

			<tr>
				<td>
					�ۼ��� : <?=$id?> | �ۼ��� :  <?=$date?> | ��ȸ�� : <?=$hits?> | ��õ�� : <?=$recommand?>
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
			<li><a href = "gallery_write.php?map=<?=$_GET[map]?>&pn=<?=$pn?>&map_st=<?=$map_st?>&map_en=<?=$map_en?>">�����ø���</a></li>
			<?php 
			// �Խù��� ID�� ���� �α����� ID�� ���� ��쿡�� ����, ���� ��ư�� ����Ѵ�.
			if($id==$_SESSION['id']||$_SESSION['id']=='admin')
			{
			?>
			<li><a href = "gallery_delete.php?map=<?=$map?>&read_uno=<?=$read_uno ?>&pn=<?=$pn ?>">����</a></li>
			<?
			}
			if($id==$_SESSION['id'])
			{
			?>
			<li><a href = "gallery_modify.php?map=<?=$map?>&modify_uno=<?=$read_uno ?>&pn=<?=$pn ?>">����</a></li>
			<?php
			} 
			?>
			<li><a href = "gallery.php?map=<?=$map?>&pn=<?=$pn?>&map_st=<?=$map_st?>&map_en=<?=$map_en?>">���</a></li>
			<?
			if($_SESSION['id'])
			{
			?>
			<li><a href = "recommand.php?map=<?=$map?>&modify_uno=<?=$read_uno ?>&pn=<?=$pn ?>">��õ!</a></li>
			<?
			}
			?>
			
 
			
		</ul>
	</div>
		<!-- end of board_buttons div-->
</div><!-- end of center div -->
	
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