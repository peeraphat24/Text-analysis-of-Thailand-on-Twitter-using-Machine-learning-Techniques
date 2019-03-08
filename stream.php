<?php
date_default_timezone_set("Asia/Bangkok");
$month = date("F");
$year = date("Y");
$file = $month . $year;
?>
<body>
    <div class="row px-3 pt-3" >
      <div class="col-lg-12 px-2">
        <div class="card bg2 " style="height:670px;">
          <h5 class="card-title  pl-4 pt-3">Streaming Data</h5>
          <div class="row justify-content-sm-center">
            <div class="col-sm-5 pt-5 mt-5 card-body ">
              <form  method="post" action="index.php">
                <table width="100%">
                  <tr height="50px">
                    <td width="8%" >Filename :</td>
                    <td width="50%" > <input type="text" class="form-control" placeholder="Enter filename." value="" name="file" required></td>
                  </tr>
                  <tr height="50px">
                    <td width="8%" class="">Keyword :</td>
                    <td width="50%" class="">
                        <div class="d-inline" ><input type="text" class="form-control" placeholder="Enter Keyword for fillter Data." name="keyword" data-toggle="tooltip" data-placement="right" title='Keyword ต้องเป็นตัวอักษร,ในกรณีที่ต้องการใส่ keyword หลายตัวให้ใช้การเว้นวรรค,สามารถใช้ " ในการกำหนดขอบเขตของ Keyword ได้ เช่น "wild boar team" เป็นต้น' required></input></div>
                    </td>
                  </tr>
                  <tr>
                    <td colspan="2" >
                      <div class="mx-auto pt-4">
                          <input type="hidden" name="month" value="<?= $month ?>">
                          <center><input type="submit" class="btn btn-sm btn-outline-secondary " name="stream_button" value="Confirm" ></input></center>
                      </div>
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
