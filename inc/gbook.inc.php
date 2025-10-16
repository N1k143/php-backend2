<?php
/* Основные настройки */
define("DB_HOST", "127.127.126.3");
define("DB_LOGIN", "root");
define("DB_PASSWORD", "");
define("DB_NAME", "gbook");
        $link = mysqli_connect(DB_HOST, DB_LOGIN, DB_PASSWORD, DB_NAME)
    or die ("ОШибка". mysqli_connect_error());
/* Основные настройки */

/* Сохранение записи в БД */
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = trim($_POST["name"]);
    $email = trim($_POST["email"]);
    $msg = trim($_POST["msg"]);
        
    $name = mysqli_real_escape_string($link, $name);
    $email = mysqli_real_escape_string($link, $email);
    $msg = mysqli_real_escape_string($link, $msg);
    

    
    $query1 = "INSERT INTO msgs (name, email, msg) VALUES ('$name', '$email', '$msg') ";
    


    mysqli_query($link, $query1) or die ("Ошибка: " . mysqli_error($link));
}

/* Сохранение записи в БД */

/* Удаление записи из БД */
if (isset($_GET["del"])) {
    $del = (int)$_GET['del'];
    if($del > 0){
        $query3 = "DELETE FROM msgs WHERE id = $del";

        mysqli_query($link, $query3) or die("Ошибка удаления: " . mysqli_error($link));
    }
}
/* Удаление записи из БД */
?>
<h3>Оставьте запись в нашей Гостевой книге</h3>

<form method="post" action="<?= $_SERVER['REQUEST_URI']?>">
Имя: <br /><input type="text" name="name" /><br />
Email: <br /><input type="text" name="email" /><br />
Сообщение: <br /><textarea name="msg"></textarea><br />

<br />

<input type="submit" value="Отправить!" />

</form>
<?php
/* Вывод записей из БД */
    $query2 = "SELECT id, name, email, msg, UNIX_TIMESTAMP(datetime) as dt FROM msgs ORDER BY id DESC ";
    $result = mysqli_query($link, $query2) or die ("Ошибка выборки: " . mysqli_error($link));
    $count = mysqli_num_rows($result);
    echo "<p>Всего записей в гостевой книге: $count</p>";

    
    while ($row = mysqli_fetch_assoc($result)) {
        $date = date("d-m-Y в H:i", $row['dt']);
        echo "<p>";
        echo "<a href='mailto:" . htmlspecialchars($row['email']) . "'>" . htmlspecialchars($row['name']) . "</a> ";
        echo "$date<br />" . nl2br(htmlspecialchars($row['msg']));
        echo "</p>";
        echo "<p align='right'>
            <a href='?id=gbook&del=" . $row['id'] . "'>Удалить</a>
        </p>";
    }

    mysqli_close($link);
/* Вывод записей из БД */
?>