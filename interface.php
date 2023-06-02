<?php


interface Animal{
	const type="animal";  //必需是常數
	public function sound();
	public function run();
}


class Cat implements Animal{
    public function name(){
        return '小花';
    }
    public function sound(){
        return '汪汪';
    }
    public function run(){
        return "跑跑";
    }
}
//用類別時會有插件誤判的情況
$cat=new Cat;
echo $cat->name();
echo $cat->sound();
echo $cat->run();

?>