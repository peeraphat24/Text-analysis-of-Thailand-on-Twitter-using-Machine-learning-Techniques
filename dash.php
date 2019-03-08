
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">
    <title>Hello, world!</title>
    <style media="screen">
      .bg1{
        background-color: #1a1820;
      }
      .bg2{
        background-color: #1a191e;
      }
      .bg3{
        background-color: #211f27;
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
        height: 70vh;
        width: 70vw;
      }
    </style>
  </head>
  <body>
    <div class="row px-3 pt-3" >
      <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 mb-2 px-1">
        <div class="card card-statistics bg2" style="width:100%;height:140px;">
          <div class="card-body">
            <div class="clearfix">
              <div class="float-left">
                <h4 class="instance">
                  <i class="fa fa-file-text-o highlight-icon fa-3x" aria-hidden="true"></i>
                </h4>
              </div>
              <div class="float-right">
                  <p class="card-text float-right">Instances</p><br>
                  <p class="card-text"><h4 class="bold-text font-weight-normal float-right"><?= $instance ?></h4></p>
              </div>
            </div>
             <p class="text-muted">
              <i class="fa fa-exclamation-circle mr-1" aria-hidden="true"></i>Number of Twitt Data
             </p>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 mb-2 px-1">
        <div class="card card-statistics bg2" style="width:100%;height:140px;">
          <div class="card-body">
            <div class="clearfix">
              <div class="float-left">
                <h4 class="feature">
                  <i class="fa fa-bar-chart-o highlight-icon fa-3x js-tilt" aria-hidden="true" data-tilt></i>
                </h4>
              </div>
              <div class="float-right">
                  <p class="card-text float-right">Features</p><br>
                  <p class="card-text"><h4 class="bold-text font-weight-normal float-right"><?= $feature ?></h4></p>
              </div>
            </div>
             <p class="text-muted">
              <i class="fa fa-exclamation-circle mr-1" aria-hidden="true"></i>Number of Found Words
             </p>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 mb-2 px-1">
        <div class="card card-statistics bg2" style="width:100%;height:140px;">
          <div class="card-body">
            <div class="clearfix">
              <div class="float-left">
                <h4 class="cluster">
                  <i class="fa fa-pie-chart fa-3x" aria-hidden="true"></i>
                </h4>
              </div>
              <div class="float-right">
                  <p class="card-text float-right">Cluster</p><br>
                  <p class="card-text"><h4 class="bold-text font-weight-normal float-right"><?= $cluster ?></h4></p>
              </div>
            </div>
             <p class="text-muted">
              <i class="fa fa-exclamation-circle mr-1" aria-hidden="true"></i>Number of Cluster
             </p>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 mb-2 px-1">
        <div class="card card-statistics bg2" style="width:100%;height:140px;" data-toggle="modal" data-target="#sse">
          <div class="card-body">
            <div class="clearfix">
              <div class="float-left">
                <h4 class="sse ">
                  <i class="fa fa-exclamation-triangle fa-3x" aria-hidden="true"></i>
                </h4>
              </div>
              <div class="float-right">
                  <p class="card-text float-right">SSE</p><br>
                  <p class="card-text"><h4 class="bold-text font-weight-normal float-right"><?= $sse ?></h4></p>
              </div>
            </div>
             <p class="text-muted">
              <i class="fa fa-exclamation-circle " aria-hidden="true"></i>Error Sum of Squares
             </p>
          </div>
        </div>
      </div>
    </div>
    <div class="row px-3">
            <div class="col-md-7 mb-2 px-1">
              <div class="card bg2" style="height:420px;">
                <div class="card-body">
                  <h5 class="card-title">Total Cluster</h5>
                    <div class="row">
                      <div  class="col-md-8">
                        <div class="custom-legend-container w-75 mx-auto"><iframe tabindex="-1" class="chartjs-hidden-iframe" style="margin: 0px; border: 0px; border-image: none; left: 0px; top: 0px; width: 100%; height: 100%; right: 0px; bottom: 0px; overflow: hidden; display: block; position: absolute; z-index: -1; pointer-events: none;"></iframe>
                          <canvas width="300" height="300" id="myChart" style="width: 257px; height: 257px; display: block;"></canvas>
                        </div>
                      </div>
                      <div  class="col-md-4 align-items-center align-self-center" >
                        <div class="pt-3 text-light font-weight-light float-left text-center  mh-100 ">
                          <ul class="float-left" style="margin-left: 0px;">
                            <?php 
                              $space = 420 / $cluster;
                              for ($i = 0; $i < $cluster; $i++) { 
                              
                            ?>
                              <div style="margin-top:".$space."px">
                                <i class=" mr-2"><i class="fa fa-circle mr-4" aria-hidden="true" style="color:<?= $color_bg[$i] ?>;"></i><a class="text-light" href="#" data-toggle="modal" data-target="#cluster<?= $i + 1 ?>"> <?= $label_cluster2[$i] ?></a></i><br>
                              </div>
    
                            <?php }  ?>
                          </ul>
                        </div>
                      </div>
                    </div>
                </div>
              </div>
            </div>
            <div class="col-md-5 mb-2 px-1">
              <div class="card bg2" style="height:420px;">
                <div class="card-body">
                  <h5 class="card-title">Most Found Word</h5>
                  <div class="table-responsive table-sales">
                    <table class="table">
                      <thead>
                        <tr>
                          <th>
                            Words
                          </th>
                          <th class="text-right">
                            frequency
                          </th>
                        </tr>
                      </thead>
                      <tbody class="font-weight-light">
                        <tr>
                          <td><?= $mostword[0] ?></td>
                          <td class="text-right">
                            <?= number_format(intval($num_mostword[0])) ?>
                          </td>
                        </tr>
                        <tr>
                          <td><?= $mostword[1] ?></td>
                          <td class="text-right">
                            <?= number_format(intval($num_mostword[1])) ?>
                          </td>
                        </tr>
                        <tr>
                          <td><?= $mostword[2] ?></td>
                          <td class="text-right">
                            <?= number_format(intval($num_mostword[2])) ?>
                          </td>
                        </tr>
                        <tr>
                          <td><?= $mostword[3] ?></td>
                          <td class="text-right">
                            <?= number_format(intval($num_mostword[3])) ?>
                          </td>
                        </tr>
                        <tr>
                          <td><?= $mostword[4] ?></td>
                          <td class="text-right">
                            <?= number_format(intval($num_mostword[4])) ?>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                  <div class="">
                    <center><button type="button" class="btn btn-sm btn-outline-secondary mx-auto" data-toggle="modal" data-target="#all">
                      See all
                    </button></center>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row px-3 mb-3">
              <div class="col-md-12 px-1 ">
                <div class="card bg2" style="height:500px;">
                  <div class="card-body">
                    <h5 class="card-title">Total Word statistics</h5>
                    <div class="mx-auto"><iframe tabindex="-1" class="chartjs-hidden-iframe" style="margin: 0px; border: 0px; border-image: none; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; display: block; position: absolute; z-index: -1; pointer-events: none;"></iframe>
                      <canvas id="barChart" height="110px" style="display: inline;"></canvas>
                    </div>
                  </div>
                </div>
              </div>
          </div>
          <!-- most word Modal -->
          <div class="modal fade" id="all" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content  bg2" >
                <div class="modal-header" style="border: 0px;">
                  <h5 class="modal-title" id="exampleModalLongTitle">Top 50 Founds word</h5>
                  <button type="button" class="close text-light" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body text-light" style="max-height:500px;overflow-y: auto;" width="100%">
                <div class="mx-auto"><iframe tabindex="-1" class="chartjs-hidden-iframe" style="margin: 0px; border: 0px; border-image: none; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; display: block; position: absolute; z-index: -1; pointer-events: none;"></iframe>
                      <canvas id="barChart2" height="800px"  style="display: inline;"></canvas>
                    </div>
             
              </div>
              <div class="modal-footer" style="border: 0px;">
               <button type="button" class="btn btn-sm btn-outline-secondary" data-dismiss="modal">Close</button>
             </div>
            </div>
          </div>
        </div>
        <!-- total word in each cluster -->
        <?php
      
      for ($i = 1; $i <= getWidgetValue("c"); $i++) {
          ?>
            <div class="modal fade" id="cluster<?= $i ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content  bg2" >
                  <div class="modal-header" style="border: 0px;">
                    <h5 class="modal-title" id="exampleModalLongTitle">Top 50 word in Cluster<?= $i ?></h5>
                    <button type="button" class="close text-light" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body text-light" style="max-height:500px;overflow-y: auto;">
                  <div class="mx-auto"><iframe tabindex="-1" class="chartjs-hidden-iframe" style="margin: 0px; border: 0px; border-image: none; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; display: block; position: absolute; z-index: -1; pointer-events: none;"></iframe>
                      <canvas id="barChartCluster<?=$i?>" height="800px" style="display: inline;"></canvas>
                    </div>
                   
                </div>
                <div class="modal-footer" style="border: 0px;">
                 <button type="button" class="btn btn-sm btn-outline-secondary" data-dismiss="modal">Close</button>
               </div>
              </div>
            </div>
          </div>
        <?php

      }
      ?>
       <div class="modal fade" id="sse" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content  bg2" >
                  <div class="modal-header" style="border: 0px;">
                    <h5 class="modal-title" id="exampleModalLongTitle">SSE</h5>
                    <button type="button" class="close text-light" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body text-light" style="max-height:500px;overflow-y: auto;">
                    <?php 
                      $file = $_SESSION['filename'];
                      $x = file_get_contents("./clusterFiles/$file"."_elbow.txt"); 

                      $data_table_sse = explode(",",$x);
                      echo '<table class="table table-hover">';
                      echo '<th width="40%" style="text-align:center;vertical-align:middle"> number of cluster </th><th width="50%" style="text-align:center;vertical-align:middle"> SSE value </th>';
                      echo '<th width="10%" style="text-align:center;vertical-align:middle"> choose </th>';
                      $xx = 2;
                      foreach ($data_table_sse as $element) {
                        if( $xx == intval($cluster)){
                          echo "<tr>";
                          echo "<td width='40%' style='text-align:center;vertical-align:middle'>$xx</td>";
                          echo "<td width='50%' style='text-align:center;vertical-align:middle'>$element</td>";
                          echo "<td width='10%' style='text-align:center;vertical-align:middle'><img src='images/checked.png'></td>";
                          echo '</tr>';
                         
                        }
                        else{
                          echo "<tr>";
                          echo "<td width='40%' style='text-align:center;vertical-align:middle'>$xx</td>";
                          echo "<td width='50%' style='text-align:center;vertical-align:middle'>$element</td>";
                          echo "<td width='10%' style='text-align:center;vertical-align:middle'> </td>";
                          echo '</tr>';
                        }      
                        $xx++;
                      }
                      echo '</table>';
                    ?>
                     <div class="mx-auto"><iframe tabindex="-1" class="chartjs-hidden-iframe" style="margin: 0px; border: 0px; border-image: none; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; display: block; position: absolute; z-index: -1; pointer-events: none;"></iframe>
                        <canvas id="lineChart2" height="110px" style="display: inline;"></canvas>
                      </div>
                  </div>
                <div class="modal-footer" style="border: 0px;">
                 <button type="button" class="btn btn-sm btn-outline-secondary" data-dismiss="modal">Close</button>
               </div>
              </div>
            </div>
          </div>
          <script>
          if (document.getElementById('lineChart2')) {
          var ctx = document.getElementById('lineChart2');
          var lineChart = new Chart(ctx, {
            type: 'line',
            data: {
              labels: ["2", "3", "4", "5", "6", "7","8","9","10"],
              datasets: [{
                label: "SSE",
                data: [<?= $x; ?>],
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
  </body>
</html>
