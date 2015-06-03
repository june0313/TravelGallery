<?php
	// 현재 세션 정보를 삭제한다.
	session_start();
	session_unset();
	session_destroy();
?>

<script>
	history.back();
</script>