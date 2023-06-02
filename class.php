<?php
class Animal{
    private  $age=10;
    protected $name;
    protected $hair="red";

    function __construct($name){   //建構式,建立物件馬上執行的函式
        $this->name=$name;
    }
    


    public function getName(){
        return $this->name;
    }

    public function setName($string){
        $this->name = $string;
        return $this->name;
    }
    public function age(){   //預設為public 
        return $this->age;
    }
    private function speed(){
        return "跑速1000";
    }
    protected function run(){
        return "跑跑跑";
    }
}
//生成物件
$animal=new Animal("nagachen");
echo"<br>";
echo $animal->getName();
// echo $animal->age;  //無法存取
// echo $animal->hair; //無法存取
echo $animal->setName("小莉");  

echo $animal->age();   //讀取private屬性的方式 Get的方式

// echo $animal->speed();

//繼承使用方式
class Cat extends Animal {
    private $age;
    function __construct($name,$age){
        $this->name=$name;
        $this->age=$age;
    }
    function catRun() {
        return $this->run();
    }

    //覆寫
    function run(){
        return "走走走";
    }
}

echo "<br>";

//需注意繼承後建構子是否要覆寫，
$cat=new Cat('小花',20);
echo $cat->age();   //若要呈現出20，cat需覆寫age()方法
echo $cat->catrun();
echo $cat->run();


?>