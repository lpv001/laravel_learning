<?php

    define("EMAIL", "me@example.com\n");
    echo EMAIL;

    define("myCon", true);
    if (myCon) {
        echo myCon."\n";
    }

    define("ONECONSTANT", "some value\n");
    echo ONECONSTANT;

    define("CONSTANT", "Hello world.\n");
    echo CONSTANT;

    $like = "I like php ";
    $num = 7;
    echo $like.$num."\n";
    echo "<p>";
    echo $like." ".$num;
    echo "</p>\n";

    echo "My favorite php version is $num\n\n";

    $var = 1;
    echo $var++."\n";
    echo ++$var."\n";
    echo --$var."\n";
    echo $var--."\n\n";

    $var = "value";
    echo $var."\n";
    $var = 1;
    echo $var."\n";
    $var += 3;
    echo $var."\n";

    $date=date("m-d");

    if ($date === "01-10"){
        echo "Wishing you a very Happy Birthday\n";
    }else{
        echo "Nothing\n";
    }

    $age = array("Peter" => "35", "Ben" => "37", "Joe" => "43");
    foreach($age as $x => $val){
        echo "$x = $val\n";
    }

    $multiDArray = array(
        "A" => array(0 => "red", 2 => "blue", 3 => "green"),
        "B" => array(1 => "orange", 2 => "black"),
        "C" => array(0 => "white", 4 => "purple")
    );

    echo $multiDArray["A"][3]."\n";

?>