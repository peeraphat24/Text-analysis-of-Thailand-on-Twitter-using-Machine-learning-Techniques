<?php
  $data = "";
  $filename ="november2017";
  $num = 1006;
    $text = array();
    $frequency = array();
    $fp = fopen('.\WordInVector\\'.$filename.'.csv',"r");
    while (!feof($fp)) {
      $tmp = fgetcsv($fp, ',');
      if($tmp != ""){
        array_push($text,$tmp[0]);
        array_push($frequency,$tmp[1]);
      }
    }
    fclose($fp);
    $x = '[';
    for ($i = 0; $i < sizeof($text); $i++) {
      if ($i == 0) {
        $x .= "{\"text\":\"$text[$i]\",\"frequency\":\"$frequency[$i]\"}";
      } else {
        $x .= ",{\"text\":\"$text[$i]\",\"frequency\":\"$frequency[$i]\"}";
      }
    }
    $x .= ']';
    

    $json = json_decode($x, true);
   


    usort($json, function ($a, $b) {
      return $a['frequency'] <=> $b['frequency'];
    });

    for ($i = $num-1; $i > ($num-1) - 50; $i--) {
      if ($data == "") {
        $temp = $json["$i"]["text"];
        $data .= "$temp";
      } else {
        $temp = $json["$i"]["text"];
        $data .= ",$temp";
      }
    }

    echo $data;
?>