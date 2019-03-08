
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
        background-color: #222126;
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
      <div class="col-sm-12 px-2">
        <div class="card bg2" style="height:670px;">
          <h5 class="card-title pl-4 pt-3">Clustering Data</h5>
          <div class="row justify-content-sm-center">
            <div class="card-body col-sm-6 pt-0 mt-5" >
              <form class="" action="index.php" method="post">
                <table width="100%">                   
                  <tr>
                    <td>
                      <table class="table table-hover mh-100" width="90%">
                        <tr>
                            <th width="10%" style='text-align:center;vertical-align:middle'>#</th>
                            <th width="40%" style='text-align:center;vertical-align:middle'>Filename</th>
                            <th width="30%" style='text-align:center;vertical-align:middle'>Clustered Process</th>
                            <th width="20%" style='text-align:center;vertical-align:middle'>select</th>
                        </tr>
                      </table>
                    </td>
                  </tr>                   
                  <tr>
                    <td>                              
                    <?php getTableData(); ?>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <br>
                      <?php
                        if ($_SESSION['checker'] == 'no') {
                        
                            echo '<center><input type="submit" class="btn btn-sm btn-outline-secondary " name="toCluster" value="Next" disabled></center>';
                                               
                        }
                        if($_SESSION['checker'] == 'yes'){
                          
                             echo '<center><input type="submit" class="btn btn-sm btn-outline-secondary " name="toCluster" value="Next" ></center>';                     
                          
                        }
                      ?>
                    </td>
                  </tr>
                </table>
              </form>
            </div>
          </div>         
        </div>
      </div>
    </div>
  </body>
</html>
