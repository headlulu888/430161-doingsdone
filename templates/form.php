<?php
$title   = $_POST['title'] ?? '';
$project = $_POST['project'] ?? '';
$data    = $_POST['data'] ?? '';
$file    = $_POST['file'] ?? '';

$projects = ["Все", "Входящие", "Учеба", "Работа", "Домашние дела", "Авто"];
?>

<div class="modal">
  <button class="modal__close" type="button" name="button">Закрыть</button>

  <h2 class="modal__heading">Добавление задачи</h2>

  <form class="form" enctype="multipart/form-data" action="./index.html" method="post">
    <div class="form__row">
      <label class="form__label" for="name">Название <sup>*</sup></label>

      <input class="form__input <?php if($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['title'] == '') print('form__input--error'); ?>" type="text" name="title" id="name" value="<?= $title ?>" placeholder="Введите название">
        <?php if($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['data'] == '') print("<span class='form__error'>Зaполните поле</span>")?>
    </div>

    <div class="form__row">
      <label class="form__label" for="project">Проект <sup>*</sup></label>

      <select class="form__input form__input--select <?php if($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['project'] == '') print('form__input--error'); ?>" name="project" id="project">
        <option value="<?= $project; ?>" placeholder="Введите проект"></option>
      <?php foreach ($projects as $key): ?>
        <option value="<?= $key; ?>"><?= $key; ?></option>
      <?php endforeach; ?>
      </select>
        <?php if($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['data'] == '') print("<span class='form__error'>Зaполните поле</span>")?>
    </div>

    <div class="form__row">
      <label class="form__label" for="date">Дата выполнения <sup>*</sup></label>

      <input class="form__input form__input--date <?php if($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['data'] == '') print('form__input--error'); ?>" type="text" name="date" id="date" value="<?= $date ?>" placeholder="Введите дату в формате ДД.ММ.ГГГГ">
        <?php if($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['data'] == '') print("<span class='form__error'>Зaполните поле</span>")?>
    </div>

    <div class="form__row">
      <label class="form__label">Файл</label>

      <div class="form__input-file">
        <input class="visually-hidden" type="file" name="preview" id="preview" value="<?= $file ?>">

        <label class="button button--transparent" for="preview">
            <span>Выберите файл</span>
        </label>
      </div>
    </div>

    <div class="form__row form__row--controls">
      <input class="button" type="submit" name="" value="Добавить">
    </div>
  </form>
</div>
