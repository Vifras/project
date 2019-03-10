<?php
session_start();
echo "<script>alert('Datang Kembali, $_SESSION[username]');</script>";
session_destroy();
?>
<meta http-equiv="refresh" content="0;url=index.php"/>