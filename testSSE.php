<?php

$filename = "February2018";

  //$cmd ="java -classpath \"weka.jar\" weka.clusterers.SimpleKMeans -t C:\\xampp\htdocs\\nsc\\vector\\$filename"."_vector.arff -N $i";
  // echo $cmd."<br>";
  // exec($cmd,$output);

  //$cmd ="java -classpath \"weka.jar\" VisualizeClusterAssignments -t C:\\xampp\htdocs\\nsc\\vector\\$filename"."_vector.arff -W \"weka.clusterers.SimpleKMeans -N 7\"";
  $cmd = "java -classpath \"weka.jar\" weka.filters.unsupervised.attribute.AddCluster -i C:\\xampp\htdocs\\nsc\\vector\\$filename"."_vector.arff -o C:\\xampp\htdocs\\nsc\\vector\\output.arff -W \"weka.clusterers.SimpleKMeans -N 7\"";
  exec($cmd,$output);

  for ($i=0; $i < sizeof($output); $i++) {
    echo "$output[$i]<br>";
  }
?>
