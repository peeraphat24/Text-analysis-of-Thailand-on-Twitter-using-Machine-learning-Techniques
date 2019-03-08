<?php
ob_start();
session_start();
require __DIR__ . '/vendor/autoload.php';
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- loading -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script>
      $(document).ready(function() {
        //Preloader
        $(window).ready(function() {
          preloaderFadeOutTime = 0;
          function hidePreloader() {
          var preloader = $(".spinner-wrapper");
          preloader.fadeOut(preloaderFadeOutTime);
          }
          hidePreloader();
        });
      });
    </script>

    <!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> -->


    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
    <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
 

    <!--===============================================================================================-->
    	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
    <!--===============================================================================================-->
    	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
    <!--===============================================================================================-->
    	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    	<link rel="stylesheet" type="text/css" href="css/util.css">
    	<link rel="stylesheet" type="text/css" href="css/main.css">
    <!--===============================================================================================-->
    <title>AnalysisTH</title>
    <style>
    @include media-breakpoint-up(lg) {
      html {
        font-size: 1.6rem;
        }
      }
      .bg1{
        background-color: #1a1820;

      }
      .bg2{
        background-color: #1a191e;
      }
      .bg3{
        background-color:#211f27;
      }
      body{
        font-size: 1em;
      }
      .instance{
        color:#81d4fa;
      }
      .cluster{
        color:#00e676;
      }
      .feature{
        color:#f44336;
      }
      .sse{
        color:#ffee58;
      }
      .chart-container {
        position: relative;
        margin: auto;
        height: 80vh;
        width: 80vw;
      }
      .footer {
          position: fixed;
          left: 0;
          bottom: 0;

          height:40px;
          background-color: #000a12;
      }
      div{
        margin-left: 0px;
        margin-right: 0px;
      }
      .tab {
          float: left;
          background-color: #211f27;
          width: 100%;
          height: 300px;
      }
      /* Style the buttons inside the tab */
      .tab button {

          background-color: #211f27;
          padding: 22px 16px;
          width: 100%;
          border: none;
          outline: none;
          text-align:center;
          cursor: pointer;
          border-color: #1a1820;
      }
      /* Change background color of buttons on hover */
      .tab button:hover {
          background-color:#211f27;
      }
      /* Create an active/current "tab button" class */
      .tab button.active {
          background-color:#1a1820;
          border-color: #1a1820;
      }
      .spinner {
        position: absolute;
        top: 50%;
        left: 45%;
        right: 50%;
        bottom: 50%;
        width: 150px;
        text-align: center;
      }
      .spinner > div {
        width: 40px;
        height: 40px;
        background-color: #f8f9fa;

        border-radius: 100%;
        display: inline-block;
        -webkit-animation: sk-bouncedelay 1.4s infinite ease-in-out both;
        animation: sk-bouncedelay 1.4s infinite ease-in-out both;
      }
      .spinner .bounce1 {
        -webkit-animation-delay: -0.32s;
        animation-delay: -0.32s;
      }
      .spinner .bounce2 {
        -webkit-animation-delay: -0.16s;
        animation-delay: -0.16s;
      }
      @-webkit-keyframes sk-bouncedelay {
        0%, 80%, 100% { -webkit-transform: scale(0) }
        40% { -webkit-transform: scale(1.0) }
      }
      @keyframes sk-bouncedelay {
        0%, 80%, 100% {
          -webkit-transform: scale(0);
          transform: scale(0);
        } 40% {
          -webkit-transform: scale(1.0);
          transform: scale(1.0);
        }
      }
      .spinner-wrapper {
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: #1a1820;
        z-index: 999999;
      }
    </style>

  </head>
  <body class="bg3 text-light" >
    <div class="spinner-wrapper mx-auto">
      <div class="spinner">
        <div class="bounce1"></div>
        <div class="bounce2"></div>
        <div class="bounce3"></div>
      </div>
    </div>
    <?php
    // call function from external file
    include "function.php";
    // set memory
    set_time_limit(0);
    ini_set('memory_limit', '-1');
    // authentication
    if (!empty($_POST['login'])) {
      $email = $_POST['email'];
      $pass = $_POST['pass'];

      login($email, $pass);
    } else if (empty($_SESSION['name'])) {
      echo "<script type='text/javascript'>document.location.href='login.php';</script>";
    }
    // get name when login by guest
    if (!empty($_GET['name'])) {
      $_SESSION['name'] = $_GET['name'];
    }
    // logout
    if (!empty($_GET['logout'])) {
      logout();
      echo "<script type='text/javascript'>document.location.href='login.php';</script>";
    }
 

    if (!empty($_GET['filename'])) {
      $_SESSION["filename"] = $_GET['filename'];
    }
    if (!empty($_SESSION["filename"])) {
        # code...

      $instance = number_format(getWidgetValue("i"));
      $feature = number_format(getWidgetValue("f"));
      $cluster = number_format(getWidgetValue("c"));
      $sse = number_format(getWidgetValue("s"), 2);
      $label_cluster = "";
      for ($i = 1; $i <= $cluster; $i++) {
        if ($i == 1) {
          $label_cluster .= "'cluster$i'";
        } else {
          $label_cluster .= ",'cluster$i'";
        }
      }

      $data_cluster = getDataCluster($cluster);

      $num = getWidgetValue("f");

      //$data_wordCloud = getDataWordCloud($num);

      $mostword = explode(",", getMostWord("1", getWidgetValue("f")));
      $num_mostword = explode(",", getMostWord("2", getWidgetValue("f")));

      $label_cluster2 = explode(",", str_replace("'", "", $label_cluster));
      $color_bg = array('#745af2', '#5cd069', '#fecb01', '#ff8a80', '#c6ff00', '#84ffff', '#f44336', '#388e3c', '#ffff00');

      $colors = "";
      $checker = 0;
      while ($checker < 10000) {
        $color = substr(str_shuffle('ABCDEF0123456789'), 0, 6);
        if ($checker == 0) {
          $colors .= "'#$color'";
        } else {
          $colors .= ",'#$color'";
        }
        $checker++;
      }

      $label_totalWord = getTotal("1", getWidgetValue("f"));
      $data_totalWord = getTotal("2", getWidgetValue("f"));
    } else {
      $instance = 0;
      $feature = 0;
      $cluster = 0;
      $sse = 0;
      
      $label_totalWord = "";
      $data_totalWord = "";
      $colors = "";
      $data_cluster = "";
      $label_cluster = "";
    }
    ?>
    <div class="container-fluid">
      <div class="row">
        <!-- sidebar -->
        <div class="col-lg-2 bg3 px-0">
          <div class="sticky-top" >
            <div class="row">
              <div class="col-sm-12 pt-3">
                <div class=" px-2 text-center mb-2 my-2 " >
        					<h5 class="text-light">AnalysisTH</h5>
        				</div>
              </div>
              <div class="col-sm-12 pt-5">
                <div class=" px-2 text-center mb-2" >
                  <?php
                  if (!empty($_SESSION['name']) && $_SESSION['name'] != "guest") {
                    echo '<img src="images/user.png" class=" rounded-circle img-fluid js-tilt"  alt="IMG" height="50px" style="max-width:50%" data-tilt>';

                  } else {
                    echo '<img src="images/user.png" class=" rounded-circle img-fluid js-tilt"  alt="IMG" height="50px" style="max-width:50%" data-tilt>';
                  }
                  ?>
        				</div>
                <div class="pt-2">
                  <h4 class="text-center text-muted">
                    <?php
                    if (!empty($_SESSION['name']) && $_SESSION['name'] != "guest") {
                      echo $_SESSION['name'];
                    } else {
                      echo "Guest";
                    }
                    ?>
                </h4>
                </div>
                <div class="mb-3">
                  <p class="text-center">
                    <?php
                    if (!empty($_SESSION['name']) && $_SESSION['name'] != "guest") {

                      echo "ADMINISTRATOR";

                    } else {
                      echo "GENERAL USER";
                    }
                    ?>
                </p>
                <center><a href="index.php?logout=1" class="text-danger"><i data-feather="power"></i></a></center>
                </div>



              </div>
            </div>
            <div class="col-sm-12 px-0">
              <div class="tab bg3 ">
                <button class="tablinks text-light" onclick="openCity(event, 'visual')"<?php if (!!empty($_POST['toCluster'])) echo 'id="defaultOpen"'; ?>>
                  <div class="mx-auto mb-2 text-muted font-weight-light js-tilt" data-tilt>
                    <i class="fa fa-television fa-3x" aria-hidden="true"></i>
                  </div>
                  Visualize Data
                </button>
                <button class="tablinks text-light" onclick="openCity(event, 'manage')" <?php if (!empty($_POST['toCluster'])) echo 'id="defaultOpen"'; ?> <?php if ($_SESSION['name'] == 'guest') echo "disabled"; ?>>
                    <div class="mx-auto mb-2 text-muted font-weight-light js-tilt" data-tilt>
                      <i class="fa fa-pencil-square-o fa-3x" aria-hidden="true"></i>
                    </div>
                    Clustering Data
                </button>
                <button class="tablinks text-light" onclick="openCity(event, 'stream')" <?php if ($_SESSION['name'] == 'guest') echo "disabled"; ?>>
                    <div class="mx-auto mb-2 text-muted font-weight-light js-tilt" data-tilt>
                      <i class="fa fa-download fa-3x" aria-hidden="true"></i>
                    </div>
                    Streaming Data
                </button>
              </div>
            </div>
          </div>
        </div>
        <!-- show content area-->
        <div class="col-lg-10 bg1 " style="min-height: 800px;" >

          <!-- header -->
          <div class="sticky-top bg3">
            <div class="row">
                <div class="col-lg-12 px-0 bg3">
                    <div class="  justify-content-between flex-md-nowrap align-items-center d-flex" style="height:60px;">
                          <h1 class="h1 ml-2"> </h1>
                      <div class="btn-toolbar mb-2 mb-md-0 mr-3 float-right">

                        <button class="btn btn-sm btn-outline-secondary dropdown-toggle"  type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>

                          <?php
                          if (!empty($_SESSION["filename"])) {
                            echo " " . $_SESSION["filename"];
                          } else {
                            echo " Select Data";
                          }
                          ?>

                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                          <?php getFile(); ?>
                        </div>
                      </div>
                    </div>
                </div>
            </div>
          </div>
          <!-- Visualize -->
          <div id="visual" class="tabcontent">
          <?php
          if (!empty($_SESSION['filename'])) {
            include 'dash.php';
          }
          ?>
          </div>
          <!-- manage -->
          <div id="manage" class="tabcontent">
            <?php
            if (!empty($_POST['toCluster'])) {
              $_SESSION['filetocluster'] = $_POST['filetocluster'];
              $elbow_data = getElbow();
              include 'selectK.php';
            } else if (!empty($_POST['cluster_button'])) {
              $_SESSION['num_cluster'] = $_POST['num_cluster'];
              cluster();
            } else {
              include 'manage.php';
            }

            ?>
          </div>
          <div id="stream" class="tabcontent">

              <?php

              include 'stream.php';
              if (!empty($_POST['stream_button'])) {
                $month = $_POST['month'];
                $file = $_POST['file'];
                $keyword = $_POST['keyword'];

                echo "<script type=\"text/javascript\">
                              window.open('streaming.php?file=$file&&month=$month&&keyword=$keyword', '_blank')
                          </script>";
              }

              ?>

          </div>
        </div>
      </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <!-- cluster graph -->
    <?php
      if (!empty($_SESSION['filename'])) {
    ?>
    <script>
        if (document.getElementById('myChart')) {
        var ctx = document.getElementById('myChart');
        var myChart = new Chart(ctx, {
          type: 'doughnut',
          data: {
            labels: [<?= $label_cluster ?>],
            datasets: [{
              label: 'Cluster',
              data: [<?= $data_cluster ?>],
              backgroundColor: [
                  '#745af2',
                  '#5cd069',
                  '#fecb01',
                  '#ff8a80',
                  '#c6ff00',
                  '#84ffff',
                  '#f44336',
                  '#388e3c',
                  '#ffff00'
              ]
            }]
          },
          options:{
            responsive: false,
            cutoutPercentage: 70,
            legend : false,
            animation: {
                animateScale: true,
                animateRotate: true
            },
            tooltips: {
              mode: 'index',
              callbacks: {
                afterLabel: function(tooltipItem, data) {
                  //get the concerned dataset
                  var dataset = data.datasets[tooltipItem.datasetIndex];
                  //calculate the total of this data set
                  var total = dataset.data.reduce(function(previousValue, currentValue, currentIndex, array) {
                    return previousValue + currentValue;
                  });
                  //get the current items value
                  var currentValue = dataset.data[tooltipItem.index];
                  //calculate the precentage based on the total and current item, also this does a rough rounding to give a whole number
                  var precentage = Math.floor(((currentValue/total) * 100)+0.5);

                  return "Percentage : "+precentage + "%";
                }
              }
            }
          }
        });
      }
      </script>
      <!-- total word chart -->
      <script>
          if (document.getElementById('barChart')) {
          var ctx = document.getElementById('barChart');
          var barChart = new Chart(ctx, {
            type: 'bar',
            data: {
              labels: [<?= $label_totalWord ?>],
              datasets: [{
                label: 'Total word',
                data: [<?= $data_totalWord ?>],
                backgroundColor: [<?= $colors ?>]
              }]
            },
            options:{
                      scales: {
                        display:false,
                        yAxes: [{
                          ticks: {
                            beginAtZero: true
                          }
                        }],
                        xAxes: [{
                          ticks: {
                            display: false
                          }
                        }]
                      },
                      legend: {
                        label:{
                            fontSize: 0
                        },
                        display: false
                      },
                      elements: {
                        point: {
                          radius: 0
                        }
                      },
                      tooltips: {
                        mode: 'nearest',
                        intersect: true
                      }
                    }
          });
        }
      </script>
      <!-- top 50 chart -->
      <script>
          if (document.getElementById('barChart2')) {
          var ctx = document.getElementById('barChart2');
          var barChart2 = new Chart(ctx, {
            type: 'horizontalBar',
            data: {
              labels: [<?= getMostWord2("1", getWidgetValue("f")); ?>],
              datasets: [{
                label: 'Total word',
                data: [<?= getMostWord2("2", getWidgetValue("f")); ?>],
                backgroundColor: [<?= $colors ?>]
              }]
            },
            options:{
                      scales: {
                        display:false,
                        yAxes: [{
                          ticks: {
                            beginAtZero: true
                          }
                        }],
                        xAxes: [{
                          ticks: {
                            display: false
                          }
                        }]
                      },
                      legend: {
                        label:{
                            fontSize: 0
                        },
                        display: false
                      },
                      elements: {
                        point: {
                          radius: 0
                        }
                      },
                      tooltips: {
                        mode: 'nearest',
                        intersect: true
                      }
                    }
          });
        }
      </script>
      <!-- top 50 in cluster1-->
      <?php
        for ($i=1; $i <= $cluster ; $i++) { 
  
      ?>
      <script>
          if (document.getElementById('<?= "barChartCluster$i"; ?>')) {
          var ctx = document.getElementById('<?= "barChartCluster$i"; ?>');
          var <?= "barChartCluster$i"; ?> = new Chart(ctx, {
            type: 'horizontalBar',
            data: {
              labels: [<?= getTotalforCluster("1", $i); ?>],
              datasets: [{
                label: 'Total word',
                data: [<?= getTotalforCluster("2", $i); ?>],
                backgroundColor: [<?= $colors ?>]
              }]
            },
            options:{
                      scales: {
                        display:false,
                        yAxes: [{
                          ticks: {
                            beginAtZero: true
                          }
                        }],
                        xAxes: [{
                          ticks: {
                            display: false
                          }
                        }]
                      },
                      legend: {
                        label:{
                            fontSize: 0
                        },
                        display: false
                      },
                      elements: {
                        point: {
                          radius: 0
                        }
                      },
                      tooltips: {
                        mode: 'nearest',
                        intersect: true
                      }
                    }
          });
        }
      </script>
      <?php
        }
       }

       if (!empty($_POST['toCluster'])) {
      ?>
         <!-- elbow chart -->
         <script>
          if (document.getElementById('lineChart')) {
          var ctx = document.getElementById('lineChart');
          var lineChart = new Chart(ctx, {
            type: 'line',
            data: {
              labels: ["2", "3", "4", "5", "6", "7","8","9","10"],
              datasets: [{
                label: "SSE",
                data: [<?= $elbow_data; ?>],
                backgroundColor: [
                  'rgba(255, 99, 132, 0.2)',
                  'rgba(54, 162, 235, 0.2)',
                  'rgba(255, 206, 86, 0.2)',
                  'rgba(75, 192, 192, 0.2)',
                  'rgba(153, 102, 255, 0.2)',
                  'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                  'rgba(255,99,132,1)',
                  'rgba(54, 162, 235, 1)',
                  'rgba(255, 206, 86, 1)',
                  'rgba(75, 192, 192, 1)',
                  'rgba(153, 102, 255, 1)',
                  'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
              }]
            },
          option : {
            scales: {
              yAxes: [{
                ticks: {
                  beginAtZero: false
                }
              }]
            },
            legend: {
              display: false
            },
            elements: {
              point: {
                radius: 0
              }
            }

          }
          });
        }
      </script>
      <?php
       }
      ?>
      <script>
         feather.replace();
      </script>
      <script>
        function openCity(evt, cityName) {
            var i, tabcontent, tablinks;
            tabcontent = document.getElementsByClassName("tabcontent");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }
            tablinks = document.getElementsByClassName("tablinks");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" active", "");
            }
            document.getElementById(cityName).style.display = "block";
            evt.currentTarget.className += " active";
        }

        // Get the element with id="defaultOpen" and click on it
        document.getElementById("defaultOpen").click();
      </script>
    
    <!--===============================================================================================-->
    	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
    <!--===============================================================================================-->
    	<script src="vendor/bootstrap/js/popper.js"></script>
    	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
    	<script src="vendor/select2/select2.min.js"></script>
    <!--===============================================================================================-->
    	<script src="vendor/tilt/tilt.jquery.min.js"></script>
    	<script >
    		$('.js-tilt').tilt({
    			scale: 1.1
    		})
    	</script>
    <!--===============================================================================================-->
    <script src="js/main.js"></script>   
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    
  </body>
</html>
