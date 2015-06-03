<?php
include"header.php";
?>
	

				<div class="left">
				</div>

				<div class="center">
					<h2>여사갤 회원가입</h2>
					여사갤 회원이 되시면 내가 찍은 사진을 다른사람들과 공유할 수 있습니다!<br>
					<hr>
					<form ACTION="insert.php" METHOD="POST">
						<table class="join">
							<tr>
								<td class="h">아이디</td>
								<td>
									<input type="text" name="id" ></input>
								</td>
							</tr>
							<tr>
								<td class="h">비밀번호</td>
								<td><input type="password" name="password"></input></td>
							</tr>
							<tr>
								<td class="h">비밀번호 확인</td>
								<td><input type="password" name="passwordCheck"></input></td>
							</tr>
							<tr>
								<td class="h">이름</td>
								<td>
									<input type="text" name="userName"></input>
								</td>
							</tr>
						</table>
						<hr>
						<center>
							<input type="submit" value="회원가입"></input> <input type="reset" value="취소"></input> 
						</center>
					</form>
				</div>

				<div class="right">
					
				</div>
		

<?php include 'footer.php';?>
