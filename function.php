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

function find_project_tasks($tasks, $projects) {
    if($projects == 'Все') {
        $result = $tasks;
    } else {
        $arrlist=[];
        foreach($tasks as $key => $value) {
            if ($value['project_name'] === $projects)
                $arrlist[]=$value;
        }

        $filtered_array = $arrlist;
        $result = $filtered_array;
    }
    return $result;
}

function calc_number_of_tasks($tasks, $projects) {
    return count(find_project_tasks($tasks, $projects));
}

function validateEmail($value) {
    return filter_var($value, FILTER_VALIDATE_EMAIL);
}
?>
