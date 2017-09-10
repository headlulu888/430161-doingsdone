<?php
    function renderTemplate($path, $array) {
        if(file_exists($path)) {
            ob_start('ob_gzhandler');
            extract($array, EXTR_SKIP);
            require_once $path;
            $html = ob_get_clean();
            return $html;
        } else {
            return "";
        }
    }

    function find_project_tasks($tasks, $category) {
        if($category == 'Все') {
            $result = $tasks;
        } else {
            $filtered_array = array_filter($tasks, function($var) use($category) {
                return $var['category'] == $category;
            });
            $result = $filtered_array;
        }
        return $result;
    }

    function calc_number_of_tasks($tasks, $category) {
        return count(find_project_tasks($tasks, $category));
    }
?>
