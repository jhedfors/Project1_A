<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  <?php
    $attendees = $destination['attendees'];
    $details = $destination['details'];
   ?>
  <title>Traveler Dashboard - <?php echo $details['destination'] ?></title>

  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="/assets/css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="/assets/css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
</head>
<body>

   <div class="row">
     <div class="col s12">
       <a href="/travels">Home</a>
       <a href="/logout">Logout</a>
     </div>
   </div>
   <div class="row">
     <div class="col s12">
       <h4><?php echo $details['destination'] ?></h4>
       <p><label>Planned By:</label><?php echo $details['planner_name'] ?></p>
       <p><label>Description:</label><?php echo $details['description'] ?></p>
       <p><label>Travel Date From:</label><?php echo date("M d, Y",strtotime($details['start_date'])); ?></p>
       <p><label>Travel Date To:</label><?php echo date("M d, Y",strtotime($details['end_date'])); ?></p>
       <br>
       <h5>Others joining the trip:</h5>
       <?php
      foreach ($destination['attendees'] as $attendee) {
        echo "<p>{$attendee['name']}</p>";
      }


        ?>

   </div>

  <!--  Scripts-->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="/assets/js/materialize.js"></script>
  <script src="/assets/js/init.js"></script>

  </body>
</html>
