<?php
class Animal{
    private  $age=10;
    protected $name="大雄";
    protected $hair="red";

    function __construct(){   //建構式,建立物件馬上執行的函式
        echo "建立物件";
    }
    
    public function getName(){
        return $this->name;
    }

    public function setName($string){
        $this->name = $string;
        return $this->name;
    }
    public function age(){   //預設為public 
        return $this->run();
    }
    private function speed(){
        return "跑速1000";
    }
    protected function run(){
        return "跑跑跑";
    }
}
//生成物件
$animal=new Animal;
echo"<br>";
echo $animal->getName();
// echo $animal->age;  //無法存取
// echo $animal->hair; //無法存取
echo $animal->setName("小莉");  

echo $animal->age();   //讀取private屬性的方式 Get的方式

// echo $animal->speed();

//繼承使用方式
class Cat extends Animal {

    function catRun() {
        return $this->run();
    }

    //覆寫
    function run(){
        return "走走走";
    }
}

echo "<br>";
$cat=new Cat;
echo $cat->age();
echo $cat->catrun();
echo $cat->run();


?>