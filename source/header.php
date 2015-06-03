<?php
	session_start();
?>

<!DOCTYPE html>
<html>
<!-- ����κ� ����-->
<head>
	<title> ������ ����ϴ� ������ </title>
	<link type="text/css" rel="stylesheet" href="css/index.css" />
	<link type="text/css" rel="stylesheet" href="css/boardStyle.css" />
	<link type="text/css" rel="stylesheet" href="css/galleryStyle.css" />
	<script src="javascript/index.js" type="text/javascript"></script>
</head>

<body>

	<div class="container">
		<div class="header">
			<a href="index.php"><h1>������ ����ϴ� ������</h1> </a>
			<h2>�����α׷��� ����(������ ������) �����ð��� ������Ʈ�� ������ ������Ʈ �Դϴ�.<br>
			������ : �������б� ��ǻ�Ͱ��а� 092215 �ڿ��� / 092242 ������</h2>
		</div><!-- header -->

		<div class="header_login">
				<?php
					if( empty($_SESSION["name"]) )
					{
						// ���ǰ��� �����Ǿ����� ������ �α��� â�� ����Ѵ�.
?>
						<FORM ACTION="login_process.php" METHOD="POST">
				
							<table class="header_login">
								<tr>
									<th colspan=2>�α���</th>
								</tr>
								<tr>
									<td colspan=2><input type="text" name="id" value="���̵�" onfocus="inputClear(this)" onblur="inputReset(this)"><br></td>
								</tr>
								<tr>
									<td colspan=2>
										<div id="before">
										<input type="text" name="dummy" value="��й�ȣ" onfocus="inputChange()">
										</div>

										<div id="after" style="display:none">
										<input id="password" type="password" name="password" onblur="inputReset(this)" >
										</div>
									</td>
								</tr>
								<tr>
									<td><input type="submit" value="�α���"></input>
									</td>
									<td><input type="button" value="ȸ������"
									onclick="location.href='member_join.php'"></input>
									</td>
								</tr>
							</table>
						</FORM>
				<?php
					}
					// ���ǰ��� �����Ǿ� ������ ȯ�� �޽����� �α׾ƿ� ��ư�� ����Ѵ�.
					else
					{
				?>
							<table class="welcome">
								<tr>
									<th><?=$_SESSION[name]?>��, ȯ���մϴ�.<br></th>
								</tr>
								
								<tr>
									<td>
									<input type="button" value="�α׾ƿ�"
								onclick="location.href='logout_process.php'"></input>
									</td>
								</tr>
							</table>
					
				<?php
					}	
						if(!$_GET[map])
					{
						$_GET[map] = 'seoul';
					}
				?>
			</div>


		<div class="navigation">
			<ul>
				<li><a href="index.php">Home</a></li>
				<li><a href="gallery.php?map=<?=$_GET[map]?>">������</a></li>
				<li><a href="board.php?map=<?=$_GET[map]?>">�Խ���</a></li>
				<li><a href="mypage.php">����������</a>
					<ul>
						<li><a href="mypage.php">���� Ȱ�� ����</a></li>
						<li><a href="mypage_gallery.php">���̰�����</a></li>
						<li style="z-index:1;"><a href="change.php">�������� ����</a></li>
					</ul>
				</li>

			</ul>
		</div>


		<!-- ����κ� �Ϸ�-->