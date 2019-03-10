<?php
session_start();
echo "<script>alert('Datang kembali, $_SESSION[nama] ');</script>";
session_destroy();
?>
<meta http-equiv="refresh" content="0;url=index.php"/>