<?php
if(!isset($_GET["id"])) {
  header('Location: index.html');
}
 ?>

 <html>

   <head>
     <title>Debate Rank</title>
     <?php include 'templates/headers.html'; ?>
   </head>

   <body>

 	<?php include 'templates/nav.html'; ?>

     <section class="bg--primary">
         <div class="container">
             <div class="row">
                 <div class="col-sm-10">
                     <h1>Micheal Myers</h1>
                 </div>
                 <div class="col-sm-2">
                     <h3 align=right>Tom C. Clark High School</h3>
                 </div>
             </div>
         </div>
     </section>

     <?php include 'templates/scripts.html'; ?>
   </body>

 </html>
