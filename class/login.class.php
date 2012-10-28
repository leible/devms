<?php

class login {
    public static function login() {
        if (!$_SESSION['user']) {
            echo '<script>';
            echo 'window.location.href='.URL.'login.php';
            echo '</script>';
        }
    }
}

?>
