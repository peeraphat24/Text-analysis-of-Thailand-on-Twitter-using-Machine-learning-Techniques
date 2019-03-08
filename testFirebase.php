<html >
  <head>
    <script src="https://www.gstatic.com/firebasejs/4.12.1/firebase.js"></script>
    <script>
      var config = {
        apiKey: "AIzaSyAgjRRaHBssBkmrav5H-RJS1TgE6nOFYos",
        authDomain: "project-fe26c.firebaseapp.com",
        databaseURL: "https://project-fe26c.firebaseio.com/",
        projectId: "project-fe26c",
        storageBucket: "project-fe26c.appspot.com",
        messagingSenderId: "631473430287"
      };
      firebase.initializeApp(config);
      var database = firebase.database();

      function writeFilename(filename,num_of_file) {
        
        firebase.database().ref('files/counter').transaction(function (current_value) {       
          return (current_value || 0) + 1;
        });
    
        firebase.database().ref('files/'+num_of_file).set({
            month : filename,
            clustered:'no',
            cluster: 0,
            sse : 0,
          });
      }

    </script>
  </head>
</html>
