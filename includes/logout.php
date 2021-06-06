<?php
    session_start();
    session_unset($_SESSION['uEmail']);
    session_unset($_SESSION['uName']);
    session_unset($_SESSION['user_id_generated']);
    session_destroy();
    echo "<script>location.href='../login.php'</script>";
?>