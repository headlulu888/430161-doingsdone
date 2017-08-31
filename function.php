<?php
    function includeTemplate($pathname, $array) {
        if (file_exists($pathname)) {
            include_once($pathname);
            ob_start();
            ob_end_flush();
        } else {
            return "";
        }
    }
?>