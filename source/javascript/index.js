// 입력창을 지운다.
function inputClear(input)
{
	if( input.value == "아이디" || input.value == "비밀번호" )
	input.value="";
}

// 패스워드 입력창을 보여준다.
function inputChange()
{
	document.getElementById('before').style.display='none';
	document.getElementById('after').style.display='';
	document.getElementById('password').focus();
}

// 입력창을 기본값으로 설정한다.
function inputReset(input)
{
	if( input.value == "" )
	{
		if( input.type == "text" )
			input.value = "아이디";
		else if( input.type == "password" )
		{
			document.getElementById('before').style.display='';
			document.getElementById('after').style.display='none';
		}
			
	}
		
}