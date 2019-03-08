<body>
    <div class="row px-3 pt-3" >
      <div class="col-lg-12 px-2">
        <div class="card bg2 " style="height:670px;">
          <h5 class="card-title  pl-4 pt-3">Elbow Method</h5>

            <div class="col-sm-12 card-body ">
              <div class="mx-auto"><iframe tabindex="-1" class="chartjs-hidden-iframe" style="margin: 0px; border: 0px; border-image: none; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; display: block; position: absolute; z-index: -1; pointer-events: none;"></iframe>
                <canvas id="lineChart" height="110px" style="display: inline;"></canvas>
              </div>
              <form class="" action="index.php" method="post">
                <center>
                  Number of Cluster :
                  <select class="custom-select" style="width:20%;" name="num_cluster" required>
                    <option selected>Select Number</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                  </select>
                </center>
                <div class="pt-3">
                  <center><input type="submit" class="btn btn-sm btn-outline-secondary " name="cluster_button" value="Confirm" ></input></center>
                </div>
              </form>

              <center>
                <div style="margin-top: 50px;">
                  Hint :  เลือกจากจุดที่พื้นที่กราฟมีลักษณะเป็นข้อศอกมากที่สุด              
                </div>
              </center>
            
            </div>

        </div>
      </div>
    </div>
</body>
