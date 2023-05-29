<?php
//  echo"<pre>";
// // // print_r(all('options'));
//  print_r(find('options',8));
//  print_r(find('options',['subject_id'=>5,'description'=>'5萬']));

//  echo "</pre>";

// update('options',['description'=>'10萬','total'=>200],8);

// insert('options',['description'=>'5萬','subject_id'=>5,'total'=>55]);

// del('options',8);
// del('options',['subject_id'=>5,'description'=>'5萬']);
update('options',['id'=>48 ,'description'=>'10萬','total'=>200]);

insert('options',['description'=>'51萬','subject_id'=>7,'total'=>45]);


function all($table){ //顯示指定資料表的資料
    $dsn="mysql:host=localhost;charset=utf8;dbname=vote";
    $pdo=new PDO($dsn,'root','');
    $sql="select * from $table";
    $rows=$pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    return $rows;

}

function find($table,$arg){
    $dsn="mysql:host=localhost;charset=utf8;dbname=vote";
    $pdo=new PDO($dsn,'root',''); 
    $sql="select * from `$table` where ";
    if(is_array($arg)){
        foreach($arg as $key => $value){
            $tmp[]="`$key`='$value'";
        }

        // print_r($tmp);

        $sql .= join(" && ",$tmp);
        // print_r($sql);

    }else{
        $sql .=" `id` = '$arg' ";
    }
    $row=$pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
    return $row;
}

function update($table,$cols){ //一次更新一筆
    $dsn="mysql:host=localhost;charset=utf8;dbname=vote";
    $pdo=new PDO($dsn,'root',''); 
    
    //['subject'=>'今天天氣很好吧?',
    // 'open_time'=>'2023-05-29',
    // 'close_time'=>'2023-06-05',
    //]
    foreach($cols as $key => $value){
        if($key!='id'){
            $tmp[] = "`$key`='$value'";
        }
    }

    $sql="update `$table`set ".join(",",$tmp)."where `id`='{$cols['id']}'";
    echo $sql;
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

function del($table,$arg){
    $dsn="mysql:host=localhost;charset=utf8;dbname=vote";
    $pdo=new PDO($dsn,'root','');
    $sql="delete from `$table` where";
    if(is_array($arg)){
        foreach($arg as $key => $value){
            $tmp[]="`$key`='$value'";
        }

        // print_r($tmp);

        $sql .= join(" && ",$tmp);
        // print_r($sql);

    }else{
        $sql .=" `id` = '$arg' ";
    }
    echo $sql;
    return $pdo->exec($sql);
}

function save($table,$cols){
    if(isset($cols['id'])){
        update($table,$cols);
    }else{
        insert($table,$cols);
    }
}
?>