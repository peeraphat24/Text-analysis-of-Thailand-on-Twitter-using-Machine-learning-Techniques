<?php

function getFile()
{
  $data = array();

  if (($handle = fopen('.\files\files.csv', "r")) !== false) {
    while (!feof($handle)) {
      $x = fgetcsv($handle);
      if ($x != "") {
        if ($x[4] > 0) {
          array_push($data, $x[0]);
        }
      }
    }
  }
  fclose($handle);

  for ($i = 0; $i < sizeof($data); $i++) {
    echo '<a class="dropdown-item " href="index.php?filename=' . $data[$i] . '">' . $data[$i] . '</a>';
  }

  if (sizeof($data) == 0) {
    echo '<a class="dropdown-item " href="#">No files</a>';
  }
}
function getWidgetValue($str)
{

  $filename = $_SESSION["filename"];
  $value = 0;
  if ($str == "f") {
    $fp = fopen('.\files\files.csv', "r");
    while (!feof($fp)) {
      $tmp = fgetcsv($fp, ',');
      if ($tmp != "") {
        if ($tmp[0] == "$filename") {
          $value = $tmp[1];
          break;
        }
      }
    }
    fclose($fp);
  } else if ($str == "i") {
    $fp = fopen('.\files\files.csv', "r");
    while (!feof($fp)) {
      $tmp = fgetcsv($fp, ',');
      if ($tmp != "") {
        if ($tmp[0] == "$filename") {
          $value = $tmp[2];
          break;
        }
      }
    }
    fclose($fp);
  } else if ($str == "c") {
    $fp = fopen('.\files\files.csv', "r");
    while (!feof($fp)) {
      $tmp = fgetcsv($fp, ',');
      if ($tmp != "") {
        if ($tmp[0] == "$filename") {
          $value = $tmp[4];
          break;
        }
      }
    }
    fclose($fp);
  } else if ($str == "s") {
    $fp = fopen('.\files\files.csv', "r");
    while (!feof($fp)) {
      $tmp = fgetcsv($fp, ',');
      if ($tmp != "") {
        if ($tmp[0] == "$filename") {
          $value = $tmp[3];
          break;
        }
      }
    }
    fclose($fp);
  }

  return $value;
}
function getDataCluster($num)
{

  $data = "";
  $filename = $_SESSION["filename"];
  $i = 1;
  $fp = fopen('.\clusterFiles\\' . $filename . '_summary.csv', "r");
  while (!feof($fp)) {
    $tmp = fgetcsv($fp, ',');
    if ($tmp != "") {
      if ($i == 1) {
        $data .= "$tmp[1]";
      } else {
        $data .= ",$tmp[1]";
      }

    }
    $i++;
  }
  fclose($fp);




  return $data;
}
function getDataWordCloud($num)
{
  $servername = "localhost";
  $username = "root";
  $password = "1234";
  $dbname = "nsc";
        // Create connection
  $conn = mysqli_connect($servername, $username, $password, $dbname);

        // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  $data = "";
  $filename = $_SESSION["filename"];
  $i = 1;
  $sql = "SELECT word,frequency from $filename" . "_vector";
  $result = mysqli_query($conn, $sql);
  while ($r = mysqli_fetch_array($result)) {
    if ($i == 1) {
      $data .= "{text:'$r[0]',size:$r[1]}";
    } else {
      $data .= ",{text:'$r[0]',size:$r[1]}";
    }
    $i++;
  }

  mysqli_close($conn);
  return $data;
}
function getMostWord($str, $num)
{
  $data = "";
  $filename = $_SESSION["filename"];
  if ($str == "1") {
    $text = array();
    $frequency = array();
    $fp = fopen('.\WordInVector\\' . $filename . '.csv', "r");
    while (!feof($fp)) {
      $tmp = fgetcsv($fp, ',');
      if ($tmp != "") {
        array_push($text, $tmp[0]);
        array_push($frequency, $tmp[1]);
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

    for ($i = $num - 1; $i > ($num - 1) - 50; $i--) {
      if ($data == "") {
        $temp = $json["$i"]["text"];
        $data .= "$temp";
      } else {
        $temp = $json["$i"]["text"];
        $data .= ",$temp";
      }
    }
  } else if ($str == "2") {
    $text = array();
    $frequency = array();
    $fp = fopen('.\WordInVector\\' . $filename . '.csv', "r");
    while (!feof($fp)) {
      $tmp = fgetcsv($fp, ',');
      if ($tmp != "") {
        array_push($text, $tmp[0]);
        array_push($frequency, $tmp[1]);
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

    for ($i = $num - 1; $i > ($num - 1) - 50; $i--) {
      if ($data == "") {
        $temp = $json["$i"]["frequency"];
        $data .= "$temp";
      } else {
        $temp = $json["$i"]["frequency"];
        $data .= ",$temp";
      }
    }
  }

  return $data;
}
function getMostWord2($str, $num)
{
  $data = "";
  $filename = $_SESSION["filename"];
  if ($str == "1") {
    $text = array();
    $frequency = array();
    $fp = fopen('.\WordInVector\\' . $filename . '.csv', "r");
    while (!feof($fp)) {
      $tmp = fgetcsv($fp, ',');
      if ($tmp != "") {
        array_push($text, $tmp[0]);
        array_push($frequency, $tmp[1]);
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

    for ($i = $num - 1; $i > ($num - 1) - 50; $i--) {
      if ($data == "") {
        $temp = $json["$i"]["text"];
        $data .= "'$temp'";
      } else {
        $temp = $json["$i"]["text"];
        $data .= ",'$temp'";
      }
    }
  } else if ($str == "2") {
    $text = array();
    $frequency = array();
    $fp = fopen('.\WordInVector\\' . $filename . '.csv', "r");
    while (!feof($fp)) {
      $tmp = fgetcsv($fp, ',');
      if ($tmp != "") {
        array_push($text, $tmp[0]);
        array_push($frequency, $tmp[1]);
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

    for ($i = $num - 1; $i > ($num - 1) - 50; $i--) {
      if ($data == "") {
        $temp = $json["$i"]["frequency"];
        $data .= "'$temp'";
      } else {
        $temp = $json["$i"]["frequency"];
        $data .= ",'$temp'";
      }
    }
  }

  return $data;
}
function getTotal($str, $num)
{
  $data = "";
  $filename = $_SESSION["filename"];
  if ($str == "1") {
    $text = array();
    $frequency = array();
    $fp = fopen('.\WordInVector\\' . $filename . '.csv', "r");
    while (!feof($fp)) {
      $tmp = fgetcsv($fp, ',');
      if ($tmp != "") {
        array_push($text, $tmp[0]);
        array_push($frequency, $tmp[1]);
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

    for ($i = $num - 1; $i > ($num - 1) - 50; $i--) {
      if ($data == "") {
        $temp = $json["$i"]["text"];
        $data .= "'$temp'";
      } else {
        $temp = $json["$i"]["text"];
        $data .= ",'$temp'";
      }
    }
  } else if ($str == "2") {
    $text = array();
    $frequency = array();
    $fp = fopen('.\WordInVector\\' . $filename . '.csv', "r");
    while (!feof($fp)) {
      $tmp = fgetcsv($fp, ',');
      if ($tmp != "") {
        array_push($text, $tmp[0]);
        array_push($frequency, $tmp[1]);
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

    for ($i = $num - 1; $i > ($num - 1) - 50; $i--) {
      if ($data == "") {
        $temp = $json["$i"]["frequency"];
        $data .= "'$temp'";
      } else {
        $temp = $json["$i"]["frequency"];
        $data .= ",'$temp'";
      }
    }
  }

  return $data;
}
function getTotalforCluster($str, $num)
{
  $data = "";
  $filename = $_SESSION["filename"];
  if ($str == "1") {
    $text = array();
    $frequency = array();
    $fp = fopen('.\clusterFiles\\' . $filename . '_cluster' . $num . '.csv', "r");
    while (!feof($fp)) {
      $tmp = fgetcsv($fp, ',');
      if ($tmp != "") {
        array_push($text, $tmp[0]);
        array_push($frequency, $tmp[1]);
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

    if (sizeof($text) < 50) {
      for ($i = abs(sizeof($text) - 1); $i > 0; $i--) {
        if ($data == "") {
          $temp = $json["$i"]["text"];
          $data .= "'$temp'";
        } else {
          $temp = $json["$i"]["text"];
          $data .= ",'$temp'";
        }
      }
    } else {
      for ($i = abs(sizeof($text) - 1); $i > abs((sizeof($text) - 1) - 50); $i--) {
        if ($data == "") {
          $temp = $json["$i"]["text"];
          $data .= "'$temp'";
        } else {
          $temp = $json["$i"]["text"];
          $data .= ",'$temp'";
        }
      }
    }
  } else if ($str == "2") {
    $text = array();
    $frequency = array();
    $fp = fopen('.\clusterFiles\\' . $filename . '_cluster' . $num . '.csv', "r");
    while (!feof($fp)) {
      $tmp = fgetcsv($fp, ',');
      if ($tmp != "") {
        array_push($text, $tmp[0]);
        array_push($frequency, $tmp[1]);
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
    if (sizeof($text) < 50) {
      for ($i = abs(sizeof($text) - 1); $i > 0; $i--) {
        if ($data == "") {
          $temp = $json["$i"]["frequency"];
          $data .= "'$temp'";
        } else {
          $temp = $json["$i"]["frequency"];
          $data .= ",'$temp'";
        }
      }
    } else {
      for ($i = abs(sizeof($text) - 1); $i > abs((sizeof($text) - 1) - 50); $i--) {
        if ($data == "") {
          $temp = $json["$i"]["frequency"];
          $data .= "'$temp'";
        } else {
          $temp = $json["$i"]["frequency"];
          $data .= ",'$temp'";
        }
      }
    }
  }

  return $data;
}
function getTableData()
{
  $tmp = array();
  $index = 1;
  $count2 = 0;
  if (($handle = fopen('.\files\files.csv', "r")) !== false) {
    echo '<div style="height:300px; overflow:auto;">';
    echo '<table class="table table-hover mh-100" align="center">';
    while (!feof($handle)) {
      $x = fgetcsv($handle);

      if ($x[0] != "") {
        echo '<tr>';
        echo "<td width=10% style='text-align:center;vertical-align:middle'>$index<td>";
        echo '<td width="40%" style="text-align:center;vertical-align:middle">' . $x[0] . '<td>';
        if ($x[4] > 0) {
          echo '<td class="text-center cluster" width="30%" style="text-align:center;vertical-align:middle"><img src="images/checked.png" alt="IMG"></td>';
          echo '<td  width="20%" align="center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input class="form-check-input" type="radio" name="filetocluster" value="' . $x[0] . '" id="defaultCheck1" disabled></td>';


        } else {
          echo '<td class="text-center cluster" width="30%" style="text-align:center;vertical-align:middle"><img src="images/multiply.png" alt="IMG"></td>';
          echo '<td  width="20%" align="center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input class="form-check-input" type="radio" name="filetocluster" value="' . $x[0] . '" id="defaultCheck1"></td>';
          $count2++;

        }
        echo '</tr>';
        $index++;
      }
    }
    echo '</table>';
    echo '</div>';
  }
  fclose($handle);

  if ($count2 > 0) {
    $_SESSION["checker"] = "yes";
  }
  if ($count2 == 0) {
    $_SESSION["checker"] = "no";
  }
}
function getElbow()
{
  $filename = $_SESSION['filetocluster'];
  $data = "";

  for ($i = 2; $i <= 10; $i++) {
    $cmd = "";
    $output = "";
    $cmd = "java -classpath \"weka.jar\" weka.clusterers.SimpleKMeans -t C:\\xampp\\htdocs\\nsc\\vector\\$filename" . "_vector.arff -N $i";
    exec($cmd, $output);

    $sse_start = intval(strpos($output[5], ":")) + 2;
    $sse_end = intval(strpos($output[5], ".")) + 3;
    $len = $sse_end - $sse_start;
    if ($i == 2) {
      $data .= substr($output[5], $sse_start, $len);
    } else {
      $data .= "," . substr($output[5], $sse_start, $len);
    }
  }
  $myfile = fopen("./clusterFiles/$filename"."_elbow.txt", "w") or die("Unable to open file!");
    $txt = "$data";
    fwrite($myfile, $txt);
    fclose($myfile);

  return $data;
}
function cluster()
{
  $file = $_SESSION['filetocluster'];
  $num = $_SESSION['num_cluster'];
  $cmd = "java -classpath \"weka.jar\" weka.clusterers.SimpleKMeans -t C:\\xampp\\htdocs\\nsc\\vector\\$file" . "_vector.arff -N $num";
  exec($cmd, $output);

  $sse_start = intval(strpos($output[5], ":")) + 2;
  $sse_end = intval(strpos($output[5], ".")) + 3;
  $len = $sse_end - $sse_start;

  $sse = substr($output[5], $sse_start, $len);

  include 'cluster.php';
  include 'findWord.php';
  $_SESSION['filename'] = $_SESSION['filetocluster'];
  header_remove(); 
  header('Location:http://localhost/nsc/index.php', true, 303);
  exit;
}
function login($email, $pass)
{

  if ($pass == "1234" && $email == "admin@email.com") {
    $_SESSION["name"] = "Ton's Witsarut";
    $_SESSION["email"] = "admin@email.com";
    $_SESSION["status"] = "admin";

  }

}
function logout()
{
  session_unset();
  session_destroy();
}
?>