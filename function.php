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

<<<<<<< HEAD
function calc_number_of_tasks($tasks, $projects) {
    return count(find_project_tasks($tasks, $projects));
}

function validateEmail($value) {
    return filter_var($value, FILTER_VALIDATE_EMAIL);
}
=======
    // // валидация даты
    // function validate_date($value) {
    //   if($value) {
    //     $tmp = exploda(".", $value);
    //     if(!checkdate($tmp[1], $tmp[0], $tmp[2])) {
    //       return "Введите дату в формате ДД.ММ.ГГГГ";
    //     }
    //   }
    // }
    //
    // // валидация формы
    // function validate_form($required, $rules, $data) {
    //   $errors = [];
    //   foreach($data as $key => $value) {
    //     if(in_array($key, $required) && $value == "") {
    //       $errors[$key] = "Заполните это поле";
    //     }
    //     if(key_exists($key, $rules)) {
    //       $error_text = call_user_func($rules[$key], $value);
    //       if($error_text) {
    //         $errors[$key] = $error_text;
    //       }
    //     }
    //   }
    //   return $errors;
    // }

    function validate_date($value) {
      return (strtotime($value) && ($value == date("d.m.Y", strtotime($value))));
    }

    function validate_project($value) {
      return ($value != 0);
    }
>>>>>>> 1f9e675ba056b6018f39e71beda6d23b13cc26e4
?>
