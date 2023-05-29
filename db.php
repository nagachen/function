<?php
// echo"<pre>";
// // print_r(all('options'));
//    print_r(find('options',8));
// echo "</pre>";

// update('options',['description'=>'10萬','total'=>200],8);

// insert('options',['description'=>'5萬','subject_id'=>5,'total'=>55]);

del('options',50);

function all($table){ //顯示指定資料表的資料
    $dsn="mysql:host=localhost;charset=utf8;dbname=vote";
    $pdo=new PDO($dsn,'root','');
    $sql="select * from $table";
    $rows=$pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    return $rows;

}

function find($table,$id){
    $dsn="mysql:host=localhost;charset=utf8;dbname=vote";
    $pdo=new PDO($dsn,'root',''); 
    $sql="select * from `$table` where `id`='$id'";
    $row=$pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
    return $row;
}

function update($table,$cols,$id){ //一次更新一筆
    $dsn="mysql:host=localhost;charset=utf8;dbname=vote";
    $pdo=new PDO($dsn,'root',''); 
    $tmp='';
    //['subject'=>'今天天氣很好吧?',
    // 'open_time'=>'2023-05-29',
    // 'close_time'=>'2023-06-05',
    //]
    foreach($cols as $key => $value){
        $tmp .= "`$key`='$value',";
    }
    //刪除前後多餘的逗號','
    $tmp=trim($tmp,',');
    $sql="update `$table`set $tmp where `id`='$id'";
    $result=$pdo->exec($sql);
    return $result;
}

function insert($table,$cols){
    $dsn="mysql:host=localhost;charset=utf8;dbname=vote";
    $pdo=new PDO($dsn,'root',''); 
    $col=array_keys($cols);//取出key 陣列
    $sql ="insert into $table (`";
    $sql .= join("`,`",$col);
    $sql .= "`) values ('";
    $sql .=join("','",$cols);
    $sql .="')";
    // $sql="insert into $table (`".join("`,`",$col)."`) 
        // values('".join("','",$cols)."')";
        echo $sql;
        $result=$pdo->exec($sql);
    return $result;

}

function del($table,$id){
    $dsn="mysql:host=localhost;charset=utf8;dbname=vote";
    $pdo=new PDO($dsn,'root','');
    $sql="delete from `$table` where `id`='$id'";
    $pdo->exec($sql);
}
?>