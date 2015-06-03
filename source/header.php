<?php
	session_start();
?>

<!DOCTYPE html>
<html>
<!-- 공통부분 시작-->
<head>
	<title> 여행을 사랑하는 갤러리 </title>
	<link type="text/css" rel="stylesheet" href="css/index.css" />
	<link type="text/css" rel="stylesheet" href="css/boardStyle.css" />
	<link type="text/css" rel="stylesheet" href="css/galleryStyle.css" />
	<script src="javascript/index.js" type="text/javascript"></script>
</head>

<body>

	<div class="container">
		<div class="header">
			<a href="index.php"><h1>여행을 사랑하는 갤러리</h1> </a>
			<h2>웹프로그래밍 설계(유성준 교수님) 수업시간에 프로젝트로 제작한 웹사이트 입니다.<br>
			만든사람 : 세종대학교 컴퓨터공학과 092215 박영준 / 092242 김희준</h2>
		</div><!-- header -->

		<div class="header_login">
				<?php
					if( empty($_SESSION["name"]) )
					{
						// 세션값이 설정되어있지 않으면 로그인 창을 출력한다.
?>
						<FORM ACTION="login_process.php" METHOD="POST">
				
							<table class="header_login">
								<tr>
									<th colspan=2>로그인</th>
								</tr>
								<tr>
									<td colspan=2><input type="text" name="id" value="아이디" onfocus="inputClear(this)" onblur="inputReset(this)"><br></td>
								</tr>
								<tr>
									<td colspan=2>
										<div id="before">
										<input type="text" name="dummy" value="비밀번호" onfocus="inputChange()">
										</div>

										<div id="after" style="display:none">
										<input id="password" type="password" name="password" onblur="inputReset(this)" >
										</div>
									</td>
								</tr>
								<tr>
									<td><input type="submit" value="로그인"></input>
									</td>
									<td><input type="button" value="회원가입"
									onclick="location.href='member_join.php'"></input>
									</td>
								</tr>
							</table>
						</FORM>
				<?php
					}
					// 세션값이 설정되어 있으면 환영 메시지와 로그아웃 버튼을 출력한다.
					else
					{
				?>
							<table class="welcome">
								<tr>
									<th><?=$_SESSION[name]?>님, 환영합니다.<br></th>
								</tr>
								
								<tr>
									<td>
									<input type="button" value="로그아웃"
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
				<li><a href="gallery.php?map=<?=$_GET[map]?>">갤러리</a></li>
				<li><a href="board.php?map=<?=$_GET[map]?>">게시판</a></li>
				<li><a href="mypage.php">마이페이지</a>
					<ul>
						<li><a href="mypage.php">나의 활동 내역</a></li>
						<li><a href="mypage_gallery.php">마이갤러리</a></li>
						<li style="z-index:1;"><a href="change.php">개인정보 수정</a></li>
					</ul>
				</li>

			</ul>
		</div>


		<!-- 공통부분 완료-->