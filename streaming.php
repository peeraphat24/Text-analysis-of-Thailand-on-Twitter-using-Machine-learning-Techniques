<!DOCTYPE html>
<html>
  <head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script>
      $(document).ready(function() {
        //Preloader
        $(window).ready(function() {
          preloaderFadeOutTime = 0;
          function hidePreloader() {
          var preloader = $(".sk-circle");
          preloader.fadeOut(preloaderFadeOutTime);
          }
          hidePreloader();
        });
      });
    </script>
    <meta charset="utf-8">
    <title>Streaming</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <style media="screen">
    body{
      background-color: #1a1820;
    }
    .sk-circle {
      margin: 100px auto;
      width: 100px;
      height: 100px;
      position: fixed;
      top: 30%;
      left: 45%;
      right: 50%;
      bottom: 50%;

    }
      .label1{
        position: fixed;
        top: 63%;
        left: 28%;
        right: 30%;
      }
      .sk-circle .sk-child {
      width: 100%;
      height: 100%;
      position: absolute;
      left: 0;
      top: 0;
      }
      .sk-circle .sk-child:before {
      content: '';
      display: block;
      margin: 0 auto;
      width: 15%;
      height: 15%;
      background-color: #f8f9fa;
      border-radius: 100%;
      -webkit-animation: sk-circleBounceDelay 1.2s infinite ease-in-out both;
              animation: sk-circleBounceDelay 1.2s infinite ease-in-out both;
      }
      .sk-circle .sk-circle2 {
      -webkit-transform: rotate(30deg);
          -ms-transform: rotate(30deg);
              transform: rotate(30deg); }
      .sk-circle .sk-circle3 {
      -webkit-transform: rotate(60deg);
          -ms-transform: rotate(60deg);
              transform: rotate(60deg); }
      .sk-circle .sk-circle4 {
      -webkit-transform: rotate(90deg);
          -ms-transform: rotate(90deg);
              transform: rotate(90deg); }
      .sk-circle .sk-circle5 {
      -webkit-transform: rotate(120deg);
          -ms-transform: rotate(120deg);
              transform: rotate(120deg); }
      .sk-circle .sk-circle6 {
      -webkit-transform: rotate(150deg);
          -ms-transform: rotate(150deg);
              transform: rotate(150deg); }
      .sk-circle .sk-circle7 {
      -webkit-transform: rotate(180deg);
          -ms-transform: rotate(180deg);
              transform: rotate(180deg); }
      .sk-circle .sk-circle8 {
      -webkit-transform: rotate(210deg);
          -ms-transform: rotate(210deg);
              transform: rotate(210deg); }
      .sk-circle .sk-circle9 {
      -webkit-transform: rotate(240deg);
          -ms-transform: rotate(240deg);
              transform: rotate(240deg); }
      .sk-circle .sk-circle10 {
      -webkit-transform: rotate(270deg);
          -ms-transform: rotate(270deg);
              transform: rotate(270deg); }
      .sk-circle .sk-circle11 {
      -webkit-transform: rotate(300deg);
          -ms-transform: rotate(300deg);
              transform: rotate(300deg); }
      .sk-circle .sk-circle12 {
      -webkit-transform: rotate(330deg);
          -ms-transform: rotate(330deg);
              transform: rotate(330deg); }
      .sk-circle .sk-circle2:before {
      -webkit-animation-delay: -1.1s;
              animation-delay: -1.1s; }
      .sk-circle .sk-circle3:before {
      -webkit-animation-delay: -1s;
              animation-delay: -1s; }
      .sk-circle .sk-circle4:before {
      -webkit-animation-delay: -0.9s;
              animation-delay: -0.9s; }
      .sk-circle .sk-circle5:before {
      -webkit-animation-delay: -0.8s;
              animation-delay: -0.8s; }
      .sk-circle .sk-circle6:before {
      -webkit-animation-delay: -0.7s;
              animation-delay: -0.7s; }
      .sk-circle .sk-circle7:before {
      -webkit-animation-delay: -0.6s;
              animation-delay: -0.6s; }
      .sk-circle .sk-circle8:before {
      -webkit-animation-delay: -0.5s;
              animation-delay: -0.5s; }
      .sk-circle .sk-circle9:before {
      -webkit-animation-delay: -0.4s;
              animation-delay: -0.4s; }
      .sk-circle .sk-circle10:before {
      -webkit-animation-delay: -0.3s;
              animation-delay: -0.3s; }
      .sk-circle .sk-circle11:before {
      -webkit-animation-delay: -0.2s;
              animation-delay: -0.2s; }
      .sk-circle .sk-circle12:before {
      -webkit-animation-delay: -0.1s;
              animation-delay: -0.1s; }

      @-webkit-keyframes sk-circleBounceDelay {
      0%, 80%, 100% {
        -webkit-transform: scale(0);
                transform: scale(0);
      } 40% {
        -webkit-transform: scale(1);
                transform: scale(1);
      }
      }

      @keyframes sk-circleBounceDelay {
      0%, 80%, 100% {
        -webkit-transform: scale(0);
                transform: scale(0);
      } 40% {
        -webkit-transform: scale(1);
                transform: scale(1);
      }
      }
    </style>
  </head>
  <body>
    <div class="sk-circle">
      <div class="sk-circle1 sk-child"></div>
      <div class="sk-circle2 sk-child"></div>
      <div class="sk-circle3 sk-child"></div>
      <div class="sk-circle4 sk-child"></div>
      <div class="sk-circle5 sk-child"></div>
      <div class="sk-circle6 sk-child"></div>
      <div class="sk-circle7 sk-child"></div>
      <div class="sk-circle8 sk-child"></div>
      <div class="sk-circle9 sk-child"></div>
      <div class="sk-circle10 sk-child"></div>
      <div class="sk-circle11 sk-child"></div>
      <div class="sk-circle12 sk-child"></div>
    </div>
    <center><div class="text-light label1" >
      <h2>Streaming and Preprocessing Data, Don't turn off this page.</h2>
    </div></center>
    <?php
        date_default_timezone_set("Asia/Bangkok");
        set_time_limit(0);
        ini_set('memory_limit', '-1');

        $month = $_GET['month'];
        $filename = $_GET['file'];
        $keyword = $_GET['keyword'];



        if (($handle = fopen('data\streaming2.py', "w"))) {
                $text = "from TwitterAPI import TwitterAPI
import csv
import datetime
import codecs

api_key = 'I5gf0T8YkfHIRUutDErRDLtFi'
api_secret = 'DeM1Rp6KsrOYPALcInD5WPTWS7UmI6CPUPdDJXsGgNbjE6pE2A'
access_token = '892969681212002308-0clEM1ooK8MnHcNzf9gcS6QhO5YC2eR'
access_secret = 'aKBr9SCQz7qbK4HfQdJHyymKwgdkUwcF6cg4Kq8MRF31e'
TRACK_TERM = '$keyword'

api = TwitterAPI(api_key,
                  api_secret,
                  access_token,
                  access_secret)


r = api.request('statuses/filter', {'track': TRACK_TERM})
for item in r:
    mydate = datetime.datetime.now()
    y = mydate.strftime(\"%B\")
    if y != '$month':
        break
    if item['lang'] == 'en':
        x =item['text']
        x = x.replace(\"\\n\",\"\")
        x = x.replace(\",\",\" \")+\"\\n\"
        print(x.encode('ascii','ignore'))
        with codecs.open('$filename.csv', 'a',encoding='utf-8') as f:
          f.write(x)
f.close";

                fputs($handle, $text);
                fclose($handle);

          // while (date("F") == $month) {
                exec('cmd.exe');
                echo exec('start run.bat');
          // }
                include 'pre.php';
          echo "  <script type=\"text/javascript\">
            window.open(window.location, '_self').close();
          </script>";
        }
        ?>

  </body>
</html>
