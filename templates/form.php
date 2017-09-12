<?php
$title   = $_POST['title'] ?? '';
$project = $_POST['project'] ?? '';
$data    = $_POST['data'] ?? '';
$file    = $_POST['file'] ?? '';

$projects = ["Все", "Входящие", "Учеба", "Работа", "Домашние дела", "Авто"];
?>

<html>
<head>
  <link rel="stylesheet" href="../css/style.css">
</head>
<div class="modal">
  <button class="modal__close" type="button" name="button">Закрыть</button>

  <h2 class="modal__heading">Добавление задачи</h2>

  <form class="form" enctype="multipart/form-data" action="index.html" method="post">
    <div class="form__row">
      <label class="form__label" for="name">Название <sup>*</sup></label>

      <input class="form__input <?= $errors['title'] ?>" type="text" name="title" id="name" value="<?= $title ?>" placeholder="Введите название">
    </div>

    <div class="form__row">
      <label class="form__label" for="project">Проект <sup>*</sup></label>

      <select class="form__input form__input--select <?= $errors['project'] ?>" name="project" id="project" <?= $project ?>>
        <option value=""></option>
      <?php foreach ($projects as $key): ?>
        <option value="<?= $key; ?>"><?= $key; ?></option>
      <?php endforeach; ?>
      </select>
    </div>

    <div class="form__row">
      <label class="form__label" for="date">Дата выполнения <sup>*</sup></label>

      <input class="form__input form__input--date <?= $errors['date'] ?>" type="text" name="date" id="date" value="<?= $date ?>" placeholder="Введите дату в формате ДД.ММ.ГГГГ">
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
</html>
