<?php
echo"<pre>";
print_r(all('options'));
echo "</pre>";

function all($table){ //顯示指定資料表的資料
    $dsn="mysql:host=localhost;charset=utf8;dbname=vote";
    $pdo=new PDO($dsn,'root','');
    $sql="select * from $table";
    $rows=$pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    return $rows;

}