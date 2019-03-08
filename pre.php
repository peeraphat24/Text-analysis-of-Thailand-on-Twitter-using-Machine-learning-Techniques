<?php 
require __DIR__ . '/vendor/autoload.php';
use Google\Cloud\Language\LanguageClient;

?>
<?php

$data = array('');
$aphabet = array('a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z');
$aphabet1 = array(' a ', ' b ', ' c ', ' d ', ' e ', ' f ', ' g ', ' h ', ' i ', ' j ', ' k ', ' l ', ' m ', ' n ', ' o ', ' p ', ' q ', ' r ', ' s ', ' t ', ' u ', ' v ', ' w ', ' x ', ' y ', ' z ');
$aphabet2 = array(' aa ', ' bb ', ' cc ', ' dd ', ' ee ', ' ff ', ' gg ', ' hh ', ' ii ', ' jj ', ' kk ', ' ll ', ' mm ', ' nn ', ' oo ', ' pp ', ' qq ', ' rr ', ' ss ', ' tt ', ' uu ', ' vv ', ' ww ', ' xx ', ' yy ', ' zz ');
$aphabet3 = array(' aaa ', ' bbb ', ' ccc ', ' ddd ', ' eee ', ' fff ', ' ggg ', ' hhh ', ' iii ', ' jjj ', ' kkk ', ' lll ', ' mmm ', ' nnn ', ' ooo ', ' ppp ', ' qqq ', ' rrr ', ' sss ', ' ttt ', ' uuu ', ' vvv ', ' www ', ' xxx ', ' yyy ', ' zzz ');

$count = 0;

  //เรียกไฟล์ที่ได้จากการสตรีมมาเขียนค่าลงอาเรย์
set_time_limit(0);
ini_set('memory_limit', '-1');
if (($handle = fopen('.\data\\' . $filename . '.csv', "r")) !== false) {

  while (!feof($handle)) {
    $x = fgetcsv($handle);
    $data[$count] = " " . strtolower($x[0]);
    $count++;
  }


}
fclose($handle);

// cleansing-data
for ($i = 0; $i < $count - 1; $i++) {

  $data[$i] = preg_replace('/\b(https?|ftp|file):\/\/[-A-Z0-9+&@#\/%?=~_|$!:,.;]*[A-Z0-9+&@#\/%=~_|$]/i', '', $data[$i]);
  $data[$i] = preg_replace("/[^ \w]+/", '', $data[$i]);
  $data[$i] = preg_replace('/[^\da-z ]/i', ' ', $data[$i]);
  $data[$i] = preg_replace('/\d+/u', '', $data[$i]);
  $data[$i] = str_replace('rt ', ' ', $data[$i]);
  $data[$i] = str_replace('ed ', ' ', $data[$i]);
  //$data[$i] = str_replace('s ', '', $data[$i]);
  for ($q = 0; $q < sizeof($aphabet2); $q++) {
    $data[$i] = str_replace($aphabet1[$q], '', $data[$i]);
    $data[$i] = str_replace($aphabet2[$q], '', $data[$i]);
    $data[$i] = str_replace($aphabet3[$q], '', $data[$i]);
  }
  //echo $i . " >> " . $data[$i] . "<br>";
}

//เขียนลงไฟล์ arff เพื่อเตรียมเข้า weka
$text = "@relation $filename\n@attribute text String\n@data\n";
$fp2 = fopen('.\data\\' . $filename . '.arff', "w");
fputs($fp2, $text);

for ($i = 0; $i < $count - 1; $i++) {
  fputs($fp2, "'" . $data[$i] . "'\n");
}
fclose($fp2);



// // $num_of_file = countFiles();

// // echo "<script>writeFilename('$filename',$num_of_file)</script>";

$cmd = 'java -classpath "weka.jar" weka.filters.unsupervised.attribute.StringToWordVector -i C:\xampp\htdocs\nsc\data\\' . $filename . '.arff -R first-last -W 1000 -prune-rate -1.0 -N 0 -stemmer weka.core.stemmers.SnowballStemmer -stopwords-handler weka.core.stopwords.Rainbow > C:\xampp\htdocs\nsc\vector\\' . $filename . '_vector.arff';
exec($cmd, $output);

$cmd1 = 'java -classpath "weka.jar" weka.core.converters.CSVSaver -i C:\xampp\htdocs\nsc\vector\\' . $filename . '_vector.arff -o C:\xampp\htdocs\nsc\vector\\' . $filename . '_vector.csv';
exec($cmd1, $output);


unlink('C:\xampp\htdocs\nsc\data\\' . $filename . '.arff');


$length = 0;
$length2 = 0;
$turn = 0;
$num_feature = 0;

$frequency = array();
$word = array();

if (($handle2 = fopen('.\vector\\' . $filename . '_vector.csv', "r")) !== false) {
  while (!feof($handle2)) {
    $x = fgetcsv($handle2, ',');
    $length = sizeof($x);



    if ($turn == 0) {

      for ($i = 1; $i <= $length; $i++) {
        $word_index = $i - 1;
        $frequency[$word_index] = 0;
        $word[$word_index] = $x[$word_index];
        $num_feature++;
      }

      $turn++;
    } elseif ($turn != 0) {

      for ($i = 1; $i <= $length; $i++) {
        $index = $i - 1;

        if ($x[$index] == 1) {
          $frequency[$index] = $frequency[$index] + 1;
        }

      }
      $turn++;
    }
  }
  fclose($handle2);

  $fp3 = fopen('.\WordInVector\\' . $filename . '.csv', "w");

  for ($i = 1; $i <= $num_feature; $i++) {
    $index = $i - 1;

    //echo "$i >> $word[$index] : $frequency[$index] <br>";
    fputs($fp3, "$word[$index],$frequency[$index]\n");
  }
  fclose($fp3);

  $fp4 = fopen('.\files\files.csv', "a+");

  $tmp_txt = file_get_contents('.\files\files.csv');

  if (strpos($tmp_txt,$filename) === false) {
  // name,feature,instance,sse,cluster
    $count--;
    fputs($fp4, "$filename,$num_feature,$count,0,0 \n");
  }
  fclose($fp4);
}

?>
