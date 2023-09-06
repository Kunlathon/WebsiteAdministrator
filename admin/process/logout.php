<?php
    session_start();
    session_destroy();
    exit("<script>window.location='../../admin/index.php';</script>");
?>