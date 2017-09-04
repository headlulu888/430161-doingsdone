<?php
// Имя
$name = "Андрей";

// Массив проектов
$projects = ["Все", "Входящие", "Учеба", "Работа", "Домашние дела", "Авто"];

//Массив Задач проектов
$tasks = [
    ['name' => 'Собеседование в IT компании',
        'date_deadline' => '01.06.2018',
        'project_name' => 'Работа',
        'is_done' => false],

    ['name' => 'Выполнить тестовое задание',
        'date_deadline' => '25.05.2018',
        'project_name' => 'Работа',
        'is_done' => false],

    ['name' => 'Сделать задание первого раздела',
        'date_deadline' => '21.04.2018',
        'project_name' => 'Учеба',
        'is_done' => true],

    ['name' => 'Встреча с другом',
        'date_deadline' => '22.04.2018',
        'project_name' => 'Входящие',
        'is_done' => false],

    ['name' => 'Купить корм для кота',
        'date_deadline' => 'Нет',
        'project_name' => 'Домашние дела   ',
        'is_done' => false],

    ['name' => 'Заказать пиццу',
        'date_deadline' => 'Нет',
        'project_name' => 'Домашние дела   ',
        'is_done' => false]
];

function get_tasks_count_by_project_name($tasks, $project_name) {
    if ($project_name == 'Все') {
        return count($tasks);
    } else {
        $count = 0;
        foreach ($tasks as $task) {
            if ($task['project_name'] == $project_name) {
                $count++;
            }
        }
    }
    return $count;
}

// показывать или нет выполненные задачи
$show_complete_tasks = rand(0, 1);

// устанавливаем часовой пояс в Московское время
date_default_timezone_set('Europe/Moscow');

$days = rand(-3, 3);
$task_deadline_ts = strtotime("+" . $days . " day midnight"); // метка времени даты выполнения задачи
$current_ts = strtotime('now midnight'); // текущая метка времени

// запишите сюда дату выполнения задачи в формате дд.мм.гггг
$date_deadline = date("d.m.Y", $task_deadline_ts);

// в эту переменную запишите кол-во дней до даты задачи
$days_until_deadline = ($task_deadline_ts - $current_ts) / 86400;

require_once "./function.php";

$page_content = renderTemplate('templates/index.php', ['tasks' => $tasks, 'show_complete_tasks' =>$show_complete_tasks]);

$layout_content = renderTemplate('templates/layout.php', ['content' => $page_content, 'name' => $name, 'title' => 'Дела в порядке - Главная!', 'projects' => $projects, 'tasks' => $tasks]);

print($layout_content);
?>
