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
	
	<div class="center">
		<h2>���� ���� �Ͻðڽ��ϱ�?</h2>
		
		<hr>
		
		<form ACTION="delete_process.php?map=<?=$_GET[map]?>&read_uno=<?=$_GET[read_uno]?>&pn=<?=$pn?>" METHOD="POST"> 
			
			
			<center>
				<input type="submit" value="Ȯ��"></input>
				<form ACTION="./board_show.php?map=<?=$_GET[map]?>&read_uno=<?=$_GET[read_uno]?>&pn=<?=$pn ?>" METHOD="POST"> 
				<input type="button" value="���" onclick="history.back()"></input>
				</form>
			</center>
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

<?php include 'footer.php';?>