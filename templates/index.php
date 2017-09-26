<h2 class="content__main-heading">Список задач</h2>

<modal class="search-modal" action="index.php" method="post">
    <input class="search-modal__input" type="text" name="" value="" placeholder="Поиск по задачам">

    <input class="search-modal__submit" type="submit" name="" value="Искать">
</modal>

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
                    <input class="checkbox__input visually-hidden" type="checkbox" <?= ($task['is_done']==true ? 'checked' : ''); ?>>
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
