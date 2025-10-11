<?php 
  include 'inc/headers.inc.php'; 
  include 'inc/cookie.inc.php'; 

if ($visitCounter == 1) {
    echo "<p>Спасибо, что зашли на огонёк!</p>";
} else {
    echo "<p>Вы зашли к нам {$visitCounter}-й раз.</p>";
    echo "<p>Последнее посещение: {$lastVisit}</p>";
}
?>

<!DOCTYPE html>
<html>

<head>
  <title>
    <?=$title?>
  </title>
  <meta charset="utf-8" />
  <link rel="stylesheet" type="text/css" href="inc/style.css" />
</head>

<body>

  <div id="header">
    <!-- Верхняя часть страницы -->
    <img src="logo.gif" width="187" height="29" alt="Наш логотип" class="logo" />
    <span class="slogan">обо всём сразу</span>
    <!-- Верхняя часть страницы -->
  </div>

  <div id="content">
    <!-- Заголовок -->
    <h1><?= $header?></h1>
    <!-- Заголовок -->
    <!-- Область основного контента -->
    <?php 
      include 'inc/routing.inc.php'; 
    ?>
    <!-- Область основного контента -->
  </div>
  <div id="nav">
    <!-- Навигация -->
    <h2>Навигация по сайту</h2>
    <ul>
      <li><a href='index.php'>Домой</a>
      </li>
      <li><a href='index.php?id=contact'>Контакты</a>
      </li>
      <li><a href='index.php?id=about'>О нас</a>
      </li>
      <li><a href='index.php?id=info'>Информация</a>
      </li>
      <li><a href='index.php?id=gbook'>Гостевая книга</a>
      </li>
    </ul>
    <!-- Навигация -->
  </div>
  <div id="footer">
    <!-- Нижняя часть страницы -->
    &copy; Супер-мега сайт, 2000 &ndash; <?= date('Y')?>
      <!-- Нижняя часть страницы -->
  </div>
</body>

</html>