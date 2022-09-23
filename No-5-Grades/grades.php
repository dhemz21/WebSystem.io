<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link type="text/css" rel="stylesheet" href="../style.css">
    <title>Final Activity | Number 5</title>
  </head>
  <body>
    <?php
    /*
        Work by Dhemler A. Omapas
    */
      require 'server-connection.php';
      require 'final-activity.php';  //Including and requiring files to make functions accessible.
      include 'side-nav.html';

    ?>
    <div class="content-5">
      <div class="grade-container">
        <form class="grade-form" method="get" action="grades.php">
          <div class="main-grade-container">
            <div class="sub">
              <label for="sub-code">Subject-Code: </label>
              <input type="text" class="subcode" id="sub-code" name="subject_code">
            </div>
            <div class="grade">
              <label for="grades">Grade: </label>
              <input type="text" class="grd" id="grades" name="grades_in_point">
            </div>
            <div class="unt">
              <label for="unit">Units: </label>
              <input type="text" class="units" id="unit" name="sub_units">
            </div>
            <div class="sem_year">
              <label for="year"> Year:</label>
              <select id="year" name="year_level">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
              </select>
              <label for="semester">Semester:</label>
              <select id="semester" name="sem">
                <option value="1">1</option>
                <option value="2">2</option>
              </select>
            </div>
            <div class="submission">
              <input type="submit" value="Add">
            </div>
          </div>
        </form>
      </div>
      <div class="grade_table">
        <div class="gpa">
          <?php computation(); ?>
        </div>
        <h3>1st Year - Sem 1</h3>
        <table class="table_1">
          <tr>
            <th>Subject</th>
            <th>Units</th>
            <th>Grade</th>
            <th>Action</th>
          </tr>
          <?php table_1(); //Calling the function from final-activity.php to display the data from database?>
        </table>
        <table class="table_2">
          <h3>1st Year - Sem 2</h3>
          <tr>
            <th>Subject</th>
            <th>Units</th>
            <th>Grade</th>
            <th>Action</th>
          </tr>
          <?php table_2(); //Calling the function from final-activity.php to display the data from database?>
        </table>
        <table class="table_3">
          <h3>2nd Year - Sem 1</h3>
          <tr>
            <th>Subject</th>
            <th>Units</th>
            <th>Grade</th>
            <th>Action</th>
          </tr>
          <?php table_3(); //Calling the function from final-activity.php to display the data from database?>
        </table>
        <table class="table_4">
          <h3>2nd Year - Sem 2</h3>
          <tr>
            <th>Subject</th>
            <th>Units</th>
            <th>Grade</th>
            <th>Action</th>
          </tr>
          <?php table_4(); //Calling the function from final-activity.php to display the data from database?>
        </table>
        <table class="table_5">
          <h3>3rd Year - Sem 1</h3>
          <tr>
            <th>Subject</th>
            <th>Units</th>
            <th>Grade</th>
            <th>Action</th>
          </tr>
          <?php table_5(); //Calling the function from final-activity.php to display the data from database?>
        </table>
        <table class="table_6">
          <h3>3rd Year - Sem 2</h3>
          <tr>
            <th>Subject</th>
            <th>Units</th>
            <th>Grade</th>
            <th>Action</th>
          </tr>
          <?php table_6(); //Calling the function from final-activity.php to display the data from database?>
        </table>
        <table class="table_7">
          <h3>4th Year - Sem 1</h3>
          <tr>
            <th>Subject</th>
            <th>Units</th>
            <th>Grade</th>
            <th>Action</th>
          </tr>
          <?php table_7(); //Calling the function from final-activity.php to display the data from database?>
        </table>
        <table class="table_8">
          <h3>4th Year - Sem 2</h3>
          <tr>
            <th>Subject</th>
            <th>Units</th>
            <th>Grade</th>
            <th>Action</th>
          </tr>
          <?php table_8(); //Calling the function from final-activity.php to display the data from database?>
        </table>
      </div>
    </div>
    <?php
      //Conditions to restrict user from inputting invalid value and missing out fields.
      if(isset($_GET['subject_code']) && isset($_GET['sub_units']) && isset($_GET['grades_in_point'])){
        $subcode = $_GET['subject_code'];
        $yearlevel = $_GET['year_level'];
        $semester = $_GET['sem'];
        $subunits = $_GET['sub_units'];
        $grade = $_GET['grades_in_point'];

        if(trim($_GET['subject_code']) == ""){
          echo "<script>window.alert('Subject Code missing.');window.location.replace('grades.php');</script>";
        }
        else if(!is_numeric($_GET['grades_in_point']) || $_GET['grades_in_point'] > 5 || $_GET['grades_in_point'] <= 0 || trim($_GET['grades_in_point']) == ""){
          echo "<script>window.alert('Grade must have its proper value.');window.location.replace('grades.php');</script>";
        }
        else if(!is_numeric($_GET['sub_units']) || $_GET['sub_units'] > 4 || $_GET['sub_units'] <= 0 || trim($_GET['sub_units']) == ""){
          echo "<script>window.alert('Number of units must have its proper value.');window.location.replace('grades.php');</script>";
        }
        else{
          $connection = new database_connection();
          $connection -> insert_to_database("mydatabase", "INSERT INTO grades(Sub_Code, Year, Sem, Units, Grade)
                                                           VALUES('$subcode', '$yearlevel', '$semester', '$subunits', '$grade')");
          echo "<script>window.location.replace('grades.php');</script>";
        }
    }

    ?>

  </body>
</html>
