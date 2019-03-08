<?php
set_time_limit(0);
ini_set('memory_limit', '-1');
$cmd1 = "java -classpath \"weka.jar\" weka.filters.unsupervised.attribute.AddCluster -i .\\vector\\$file" . "_vector.arff -o .\\cluster\\$file" . "_cluster.arff -W \"weka.clusterers.SimpleKMeans -N $num\"";
exec($cmd1, $output1);

$cmd2 = 'java -classpath "weka.jar" weka.core.converters.CSVSaver -i .\cluster\\' . $file . '_cluster.arff -o .\cluster\\' . $file . '_cluster.csv';
exec($cmd2, $output2);
$turn = 0;


if (($handle = fopen('.\cluster\\' . $file . '_cluster.csv', "r")) !== false) {
  $count_word_cluster = array();
  for ($q = 0; $q < $num; $q++) {
    $count_word_cluster[$q] = 0;
  }
  while (!feof($handle)) {
    $x = fgetcsv($handle, ',');
    $length = sizeof($x);
    $cluster = $length - 1;
    if ($turn == 0) {
      $tmp_file = array();
      $fp = fopen('.\files\files.csv', "r");
      while (!feof($fp)) {
        $tmp = fgetcsv($fp, ',');
        if ($tmp != "") {
          array_push($tmp_file, $tmp);
        }
      }
      fclose($fp);

      for ($i = 0; $i < sizeof($tmp_file); $i++) {
        if (strcmp($tmp_file[$i][0], $file) === 0) {
          $tmp_file[$i][3] = $sse;
          $tmp_file[$i][4] = $num;
          break;
        }
      }

      $fp2 = fopen('.\files\files.csv', "w");

      for ($i = 0; $i < sizeof($tmp_file); $i++) {
        fputcsv($fp2, $tmp_file[$i]);
      }
      fclose($fp2);

    } else {
      for ($w = 1; $w <= $num; $w++) {
        $index = $w - 1;
        if ($x[$cluster] == "cluster$w") {
          $count_word_cluster[$index] += 1;
        }
      }
    }
    $turn++;
  }
}
fclose($handle);

$summary_cluster = fopen('.\clusterFiles\\'.$file.'_summary.csv',"w");
for ($i=0; $i < sizeof($count_word_cluster); $i++) { 
  $cluster_txt = "cluster".($i+1);
  fputs($summary_cluster,"$cluster_txt,$count_word_cluster[$i]\n");
}
fclose($summary_cluster);
?>
