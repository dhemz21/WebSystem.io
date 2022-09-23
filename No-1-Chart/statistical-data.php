<!DOCTYPE html>
<html lang="en" dir="ltr">
<!--
    Work by Dhemler A. Omapas
-->

<!--
    This webpage displays chart using Chart.js library and MySQL.
    Needs to embed jquery and chart.js libraries.
-->
  <head>
    <meta charset="utf-8">
    <title>Final-Activity | Number 1</title>
    <link rel="stylesheet" type="text/css" href="../style.css">
  </head>
  <body>
    <?php include 'side-nav.html';//Including files to make functions accessible. ?>
    <script type="text/javascript" src="../JSFiles/Chart.min.js">
    </script>
    <script type="text/javascript" src="../JSFiles/jquery.min.js">
    </script>
    <div id="main-content-1" class="content-1">
      <h3>Exam Scores</h3>
      <div class="chart-container">
        <canvas id="bar-chartcanvas"></canvas>
      </div>
      <script type="text/javascript" src="bar.js"></script>
    </div>
  </body>
</html>
