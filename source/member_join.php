<?php
include"header.php";
?>
	

				<div class="left">
				</div>

				<div class="center">
					<h2>���簶 ȸ������</h2>
					���簶 ȸ���� �ǽø� ���� ���� ������ �ٸ������� ������ �� �ֽ��ϴ�!<br>
					<hr>
					<form ACTION="insert.php" METHOD="POST">
						<table class="join">
							<tr>
								<td class="h">���̵�</td>
								<td>
									<input type="text" name="id" ></input>
								</td>
							</tr>
							<tr>
								<td class="h">��й�ȣ</td>
								<td><input type="password" name="password"></input></td>
							</tr>
							<tr>
								<td class="h">��й�ȣ Ȯ��</td>
								<td><input type="password" name="passwordCheck"></input></td>
							</tr>
							<tr>
								<td class="h">�̸�</td>
								<td>
									<input type="text" name="userName"></input>
								</td>
							</tr>
						</table>
						<hr>
						<center>
							<input type="submit" value="ȸ������"></input> <input type="reset" value="���"></input> 
						</center>
					</form>
				</div>

				<div class="right">
					
				</div>
		

<?php include 'footer.php';?>
