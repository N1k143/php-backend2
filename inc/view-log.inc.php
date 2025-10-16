<?
if(!file_exists('log/path.log')){
    echo "<p>Файл журнала не найден.</p>";
    exit;
}

$lines = file('log/path.log', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

echo "<ul>";
foreach($lines as $line) {
    list($dt, $page, $ref) = explode('|', $line);
    $date = date('d-m-Y H:i:s', $dt);
    echo "<li>$date - $page -> $ref</li>";
}
echo "</ul>";