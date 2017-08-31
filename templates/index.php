<?php
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

?>

<h2 class="content__main-heading">Список задач</h2>

<form class="search-form" action="index.php" method="post">
    <input class="search-form__input" type="text" name="" value="" placeholder="Поиск по задачам">

    <input class="search-form__submit" type="submit" name="" value="Искать">
</form>

<div class="tasks-controls">
    <div class="radio-button-group">
        <label class="radio-button">
            <input class="radio-button__input visually-hidden" type="radio" name="radio" checked="">
            <span class="radio-button__text">Все задачи</span>
        </label>

        <label class="radio-button">
            <input class="radio-button__input visually-hidden" type="radio" name="radio">
            <span class="radio-button__text">Повестка дня</span>
        </label>

        <label class="radio-button">
            <input class="radio-button__input visually-hidden" type="radio" name="radio">
            <span class="radio-button__text">Завтра</span>
        </label>

        <label class="radio-button">
            <input class="radio-button__input visually-hidden" type="radio" name="radio">
            <span class="radio-button__text">Просроченные</span>
        </label>
    </div>

    <label class="checkbox">
        <!--добавить сюда аттрибут "checked", если переменная $show_complete_tasks равна единице-->
        <input id="show-complete-tasks" class="checkbox__input visually-hidden" type="checkbox"
            <?php if($show_complete_tasks == 1): ?>
                checked
            <?php endif; ?>>
        <span class="checkbox__text">Показывать выполненные</span>
    </label>
</div>

<table class="tasks">
    <!--показывать следующий тег <tr/>, если переменная равна единице-->
    <!-- Перебор задач -->
    <?php foreach ($tasks as $task): ?>
        <tr class="tasks__item task <?= ($task['is_done'] ? 'task--completed' : ''); ?>">
            <td class="task__select">
                <label class="checkbox task__checkbox">
                    <input class="checkbox__input visually-hidden" type="checkbox" <?= ($task['is_done'] ? 'checked' : ''); ?>>
                    <span class="checkbox__text"><?= $task['name']; ?></span>
                </label>
            </td>
            <td class="task__date"><?= $task['date_deadline']; ?></td>

            <td class="task__controls">
                <button class="expand-control" type="button" name="button">Выполнить первое задание</button>
                <ul class="expand-list hidden">
                    <li class="expand-list__item">
                        <a href="#">Выполнить</a>
                    </li>
                    <li class="expand-list__item">
                        <a href="#">Удалить</a>
                    </li>
                </ul>
            </td>
        </tr>
    <?php endforeach; ?>
    <!-- Конец перебора задач -->
</table>