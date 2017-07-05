<?php
if(!isset($_GET["id"])) {
  header('Location: index.php');
}

require_once('php/mysql_connect.php');
$id = $_GET["id"];
$stmt = $dbc->prepare('SELECT first, middle, last, surname, school FROM debaters WHERE id=?');
$stmt->bind_param('i', $id);
$stmt->execute();
$stmt->bind_result($first, $middle, $last, $surname, $school);
mysqli_stmt_store_result($stmt);
$stmt->fetch();

function getName($first, $middle, $last, $surname) {
  $name = $first;
  if($middle != NULL) {
    $name .= ' ' . $middle;
  }
  if($last != NULL) {
    $name .= ' ' . $last;
  }
  if($surname != NULL) {
    $name .= ' ' . $surname;
  }
  return $name;
}

 ?>

 <html>

   <head>
     <title>Debate Rank - <?php echo getName($first, $middle, $last, $surname); ?></title>
     <?php include 'templates/headers.html'; ?>
     <link href="css/pages/profile.css" rel="stylesheet" type="text/css"/>
   </head>

   <body>

 	<?php include 'templates/nav.html'; ?>

     <section class="bg--primary">
         <div class="container">

             <div class="row">
                 <div class="col-sm-9">
                     <h1><?php echo getName($first, $middle, $last, $surname); ?></h1>
                 </div>
                 <div class="col-sm-3">
                     <h3 align=right><?php echo $school; ?></h3>
                 </div>
             </div>
         </div>
     </section>

     <div class="container">

       <div class="row">
         <div class="col-sm-3"></div>
         <div class="col-sm-3"></div>
         <div class="col-sm-3"></div>

       <div align="right" class="col-sm-3">
       <form action="" method="post">
       <select name="year" id="year" onchange="this.form.submit();">
         <?php

         $stmt = $dbc->prepare('SELECT t.date FROM ld_rounds ld JOIN tournaments AS t ON ld.tournament = t.id WHERE ld.debater = ? ORDER BY t.date LIMIT 1,1');
         $stmt->bind_param('i', $id);
         $stmt->execute();
         $stmt->bind_result($floor_date);
         mysqli_stmt_store_result($stmt);
         $stmt->fetch();

         $stmt = $dbc->prepare('SELECT t.date FROM ld_rounds ld JOIN tournaments AS t ON ld.tournament = t.id WHERE ld.debater = ? ORDER BY t.date DESC LIMIT 1,1');
         $stmt->bind_param('i', $id);
         $stmt->execute();
         $stmt->bind_result($ceil_date);
         mysqli_stmt_store_result($stmt);
         $stmt->fetch();

         function getNextLowerDate($sqlDate, $floordate) {
           if($sqlDate == dateToSQLDate($floordate))
            return $sqlDate;
           $split = split('-|\|', $sqlDate);
           $str = (((int)$split[0]) - 1) . '-07-01|' . (((int)$split[3]) - 1) . '-06-31';
           return $str;
         }

         function dateToSQLDate($date) {
           if(((int)split('-', $date)[1])>=7) {
             $split = split('-', $date);
             $str = $split[0] . '-07-01|' . (((int)$split[0]) + 1) . '-06-31';
             return $str;
           }
           else {
             $split = split('-', $date);
             $str = (((int)$split[0]) - 1) . '-07-01|' . $split[0] . '-06-31';
             return $str;
           }
         }

         $backup =  '';
         $val = dateToSQLDate($ceil_date);

         // Update year POST values here
         if(isset($_POST['year'])){
         $selected_val = $_POST['year'];
         $year = $_POST['year'];
         }
         else {
           $year = $val;
         }

         do {
           $backup = $val;
           $split = split('-|\|', $val);
           echo '<option value="' . $val . '">' . $split[0] . '-' . $split[3] . '</option>';
         } while(($val = getNextLowerDate(dateToSQLDate($val), $floor_date)) != $backup);
          ?>
          <option value="0000-01-01|9999-12-31">All</option>
       </select>
     </form>

     <script type="text/javascript">
      document.getElementById('year').value = "<?php echo $year;?>";
      </script>
   </div>
   </div>

<br>

       <table class="border--round">
       	<thead>
          <tr>
       			<td><center>Micheal attended TOC 3 times!</center></td>
       		</tr>
       	</thead>
       </table>

       <div class="row">
         <div class="col-sm-3">
           <div class="boxed boxed--border">
             <h2>W/L</h2>
             <p style="text-align:left;">W/L
 <span style="float:right;"><?php
            $stmt = $dbc->prepare('SELECT ld.id FROM ld_rounds ld JOIN tournaments AS t ON ld.tournament=t.id WHERE (t.date BETWEEN ? AND ?) AND debater=? AND decision=\'1-0\'');
            $stmt->bind_param('ssi', split('\|', $year)[0], split('\|', $year)[1], $id);
            $stmt->execute();
            mysqli_stmt_store_result($stmt);
            $stmt->fetch();
            $wins = mysqli_stmt_num_rows($stmt);
            echo $wins . ' / ';

            $stmt = $dbc->prepare('SELECT ld.id FROM ld_rounds ld JOIN tournaments AS t ON ld.tournament=t.id WHERE (t.date BETWEEN ? AND ?) AND debater=? AND decision=\'0-1\'');
            $stmt->bind_param('ssi', split('\|', $year)[0], split('\|', $year)[1], $id);
            $stmt->execute();
            mysqli_stmt_store_result($stmt);
            $stmt->fetch();
            $losses = mysqli_stmt_num_rows($stmt);
            echo $losses;
            ?></span>

            <!-- Win percentage -->

            <p style="text-align:left;">Win percentage
<span style="float:right;"><?php
           $stmt = $dbc->prepare('SELECT ld.id FROM ld_rounds ld JOIN tournaments AS t ON ld.tournament=t.id WHERE (t.date BETWEEN ? AND ?) AND debater=? AND (decision=\'1-0\' OR decision=\'0-1\')');
           $stmt->bind_param('ssi', split('\|', $year)[0], split('\|', $year)[1], $id);
           $stmt->execute();
           mysqli_stmt_store_result($stmt);
           $stmt->fetch();
           $total_rounds = mysqli_stmt_num_rows($stmt);
           $win_percentage = substr($wins / $total_rounds, 0, 6);
           if($win_percentage == "1")
              $win_percentage = "100";
           echo $win_percentage . '%';
           ?></span>

          </div>

         </div>

         <div class="col-sm-3">
            <div class="boxed boxed--border">
                <h2>Avg. Speaks</h2>
    </p>
            </div>
         </div>
       </div>
     </div>

     <?php include 'templates/scripts.html'; ?>
   </body>

 </html>
