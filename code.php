<?php

    // get values entered by user
    $spies = $_GET["spies"];
    $players = $_GET["players"];
    $language = $_GET["lang"];
    

    //main function
    function main($spies , $players , $lang){
        if ($lang == "index_en.html"){
            $places = array("shop" , "sea" , "forest");
            $messages = array("You are a spy" , "Press OK if you are ready" , "Give the device to the next person");
        }

        else{
            $places = array("نجاری" , "فروشگاه");
            $messages = array("شما جاسوس هستید" , "برای شروع بازی کلیک کنید" , "دستگاه را به نفر بعدی دهید");
        }

        $place = $places[array_rand($places , 1)];

        $a = array();
        for ($i = 0; $i < $players - $spies; $i++){
            array_push($a , $place);
        }
    
        for ($i = 0; $i < $spies; $i++){
            array_push($a , $messages[0]);
        }
        shuffle($a);
    
    
        echo '<script>alert("'.$messages[1].'")</script>';
        for ($i = 0; $i < $players; $i++){
            echo '<script>alert("'.$a[$i].'")</script>';
            if ($i == $players - 1){
                continue;
            }
            else{
                echo '<script>alert("'.$messages[2].'")</script>';
            }
        }
    }

    // Error Handling
    switch ($language){
        case "index_en.html":
            $message = "Number of spies should be less than players";
            break;

        case "index_fa.html":
            $message = "تعداد جاسوسان باید کمتر از تعداد بازیکنان باشد";
            break; 
    }

    if ($players <= $spies){
        echo '<script>alert("'.$message.'");history.go(-1);</script>';
    }
    else{
        main($spies , $players , $language);
    }
?>