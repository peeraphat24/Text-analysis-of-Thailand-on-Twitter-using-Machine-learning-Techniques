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
      firebase.database().ref('vector').remove();
      firebase.database().ref('WordInVector').remove();
      firebase.database().ref('files').remove();
    </script>
  </head>
</html>
