<?php
include "header.php";
include "db_conn.php";

$query = "SELECT title, content FROM board WHERE board_num=$_GET[modify_uno] AND map = '$_GET[map]'";
$result = mysql_query($query, $link);
$row = mysql_fetch_array($result);

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
		<h2>�� ����</h2>
		
		<hr>
		
		<form ACTION="modify_process.php?map=<?=$_GET[map]?>&modify_uno=<?=$_GET[modify_uno]?>&pn=<?=$_GET[pn]?>&map_st=<?=$GET_[map_st]?>
				$map_en=<?=$_GET[mep_en]?>" METHOD="POST"> 
			<table class="board_write">
				<tr class="title">
					<td class="h" width="50" height="30" align="center">����</td>
					<td><input type="text" name="title" value="<?=$row[title]?>"></td>
				</tr>
				<tr>
					<td class="h" align="center">����</td>
					<td><textarea name="content"><?=$row[content]?></textarea></td>
				</tr>
			</table>
			
			<hr>
			
			<center>
				<input type="submit" value="�����Ϸ�"></input>
			
			</center>
		</form>
	</div><!-- end of center div -->
	
	<div class="right">
		<h2>������ �Խ���</h2>
		<hr>
		<ul>
			<li><a href="board.php?map=gangwon">������</a></li><hr>
			<li><a href="board.php?map=gyeongbuk">���ϵ�</a></li><hr>
			<li><a href="board.php?map=daegu">�뱸</a></li><hr>
			<li><a href="board.php?map=ulleung">�︪��</a></li><hr>
			<li><a href="board.php?map=dokdo">����</a></li><hr>
			<li><a href="board.php?map=ulsan">���</a></li><hr>
			<li><a href="board.php?map=gyeongnam">��󳲵�</a></li><hr>
			<li><a href="board.php?map=busan">�λ�</a></li><hr>
		</ul>
	</div>

<?php include 'footer.php';?>