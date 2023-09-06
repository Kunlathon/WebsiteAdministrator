<?php
session_start();
session_destroy();
echo "<meta charset='utf-8'/><script>alert('ออกจากระบบสำเร็จ!!');location.href='../../index.php';</script>";
?>