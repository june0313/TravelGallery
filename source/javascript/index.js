// �Է�â�� �����.
function inputClear(input)
{
	if( input.value == "���̵�" || input.value == "��й�ȣ" )
	input.value="";
}

// �н����� �Է�â�� �����ش�.
function inputChange()
{
	document.getElementById('before').style.display='none';
	document.getElementById('after').style.display='';
	document.getElementById('password').focus();
}

// �Է�â�� �⺻������ �����Ѵ�.
function inputReset(input)
{
	if( input.value == "" )
	{
		if( input.type == "text" )
			input.value = "���̵�";
		else if( input.type == "password" )
		{
			document.getElementById('before').style.display='';
			document.getElementById('after').style.display='none';
		}
			
	}
		
}