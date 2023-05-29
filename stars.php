
    <style>
        *{
            font-family:'Courier New',Courier,monospace;
        }
    </style>

<?php
stars(10);
stars(5);
stars(25);
stars(17);

function stars($line){
    for($i=0;$i<$line;$i++){
        for($j=0;$j<($line-1-$i);$j++){
            echo "&nbsp;";
        }

        for($k=0;$k<($i*2+1);$k++){
            echo "*";
        }
        echo "<br>";
    }
}

?>


