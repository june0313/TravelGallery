<?php
include "header.php";

// �α����� �Ǿ����� ������ �α��� �������� �̵���Ų��.
if( empty($_SESSION["name"]) )
{
?>
	<script type="text/javascript"> 
   		location.href = "login.php";
    </script> 
<?php
}
$pn=$_GET[pn];
$map=$_GET[map];
$map_st = $_GET[map_st];
$map_en = $_GET[map_en];
?>

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

<div class="center">

	<h2>�۾���</h2>

	<hr>

	<form ACTION="write_process.php?map=<?=$_GET[map]?>" METHOD="POST">
		<table class="board_write">
			<tr class="title">
				<td class="h" width="50" height="30" align="center">����</td>
				<td><input type="text" name="title"></td>
			</tr>
			<tr>
				<td class="h" align="center">����</td>
				<td><textarea name="content"></textarea></td>
			</tr>
		</table>

		<hr>
		<div class="board_buttons">
		<center>
			
			<ul>
				<li><a href = "./board.php?map=<?=$map?>&pn=<?=$pn?>&map_st=<?=$map_st?>&map_en=<?=$map_en?>">���</a></li>
				<li><input type="submit" value="Ȯ��"></li>
			</ul>
		</center>
		</div>
	</form>

</div><!-- end of center div -->
	
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

<?php 
include 'footer.php';
?>