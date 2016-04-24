<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  <title>Traveler Dashboard - Add a Trip</title>

  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="/assets/css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="/assets/css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
</head>
<body>
  <?php

   ?>

   <div class="row">
     <div class="col s12">
       <a href="/travels">Home</a>
       <a href="/logout">Logout</a>

     </div>
   </div>
   <div class="row">
     <div class="col s12">
       <h4>Add a Trip</h2>
         <div class="errors">
           <?php echo validation_errors() ?>
         </div>
         <form class="" action="/dashboard/add_destination" method="post">
           <label for="destination">Destination:</label><input type="text" name="destination" value="">
           <label for="description">Description</label><input type="text" name="description" value="">
           <label for="start_date">Travel Date From:</label><input type="date" name="start_date" value="">
           <label for="end_date">Travel Date To:</label><input type="date" name="end_date" value="">
           <input type="submit" value="Add">

         </form>
   </div>

  <!--  Scripts-->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="/assets/js/materialize.js"></script>
  <script src="/assets/js/init.js"></script>

  </body>
</html>
