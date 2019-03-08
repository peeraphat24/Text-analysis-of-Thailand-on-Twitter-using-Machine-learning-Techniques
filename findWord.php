<?php

set_time_limit(0);
ini_set('memory_limit', '-1');

// get num of feature and instance
$fp3 = fopen('.\files\files.csv', "r");
    while (!feof($fp3)) {
      $tmp = fgetcsv($fp3, ',');
      if($tmp != ""){
        if($tmp[0] == $file){
          $num_of_attribute = $tmp[1];
          $num_of_instance = $tmp[2];
          break;
        }
      }
    }
fclose($fp3);

// get word in vector
$word = array();
$fp4 = fopen('.\WordInVector\\'.$file.'.csv', "r");
    while (!feof($fp4)) {
      $tmp_word = fgetcsv($fp4, ',');
      if($tmp_word != ""){
        array_push($word,$tmp_word[0]);
      }
    }
fclose($fp4);



// loop for serch word each cluster
$y = 1;
while ($y <= $num) {
  //echo "find word in cluster$y : <br>";
  $num_word = array();
  for ($w = 0; $w < $num_of_attribute; $w++) {
    $num_word[$w] = 0;
  }
  $id = 1;
  
      //get num of found words of each cluster
  if (($handle2 = fopen('.\cluster\\' . $file . '_cluster.csv', "r")) !== false) {
    while (!feof($handle2)) {
      // loop for serch num of found words of each cluster


      $x = fgetcsv($handle2, ',');
      $length = sizeof($x);
      $index_cluster = $length - 1;
      for ($i = 0; $i < $num_of_attribute; $i++) {
        if ($x[$i] == "1" && $x[$index_cluster] == "cluster$y") {
          $num_word[$i] += 1;
        }
      }
    }
         //get found words
   /* if ($num_word > 0) {
      
      echo " -- $json $num_word word <br>";
      $id++;
    }*/
  }

  $file_cluster = fopen('.\clusterFiles\\'.$file.'_cluster'.$y.'.csv',"w");
  for ($i = 0; $i < $num_of_attribute; $i++) {
    if ($num_word[$i] > 0) {
     fputs($file_cluster,"$word[$i],$num_word[$i]\n");
    }
  }
  fclose($file_cluster);

  $y++;
}
?>
