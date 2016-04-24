<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  <title>Traveler Dashboard - Travels</title>

  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="/assets/css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="/assets/css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
</head>
<body>
  <?php
    $first_name = $this->session->userdata('first_name');
    $active_id = $this->session->userdata('active_id');
   ?>

   <div class="row">
     <div class="col s12">
       <a href="/logout">Logout</a>
     </div>
   </div>
   <div class="row">
     <div class="col s12">
       <h2>Hello, <?php echo $first_name ?>!</h2>
       <p>
         Your Trip Schedules
       </p>
       <table>
         <thead>
           <tr>
             <th>Destination</th>
             <th>Travel Start Date</th>
             <th>Travel End Date</th>
             <th>Plan</th>
           </tr>
         </thead>
         <tbody>
           <?php
           foreach ($trips as $trip) {
             if ($trip['user_id'] == $active_id) {
            ?>
               <tr>
                 <td><a href="travels/destination/<?php echo $trip['dest_id']; ?>"><?php echo $trip['destination']; ?></a></td>
                 <td><?php echo date("M d, Y",strtotime($trip['start_date'])); ?></td>
                 <td><?php echo date("M d, Y",strtotime($trip['end_date'])); ?></td>
                 <td><?php echo $trip['description']; ?></td>
               </tr>
            <?php
              }
            }
             ?>
         </tbody>
       </table>
       <p>
         Other User's Travel Plans
       </p>
       <table>
         <thead>
           <tr>
             <th>Name</th>
             <th>Destination</th>
             <th>Travel Start Date</th>
             <th>Travel End Date</th>
             <th>Do You Want to Join?</th>
           </tr>
         </thead>
         <tbody>
           <?php
           foreach ($trips as $trip) {
             if ($trip['user_id'] != $active_id && $trip['user_planner_id'] != $active_id) {
            ?>
           <tr>
             <td><?php echo $trip['name']; ?></td>
             <td><a href="travels/destination/<?php echo $trip['dest_id']; ?>"><?php echo $trip['destination']; ?></a></td>
             <td><?php echo date("M d, Y",strtotime($trip['start_date'])); ?></td>
             <td><?php echo date("M d, Y",strtotime($trip['end_date'])); ?></td>
             <td><a href="/join_trip/<?php echo $trip['dest_id']; ?>">Join</a></td>
           </tr>
           <?php
             }
           }
            ?>
         </tbody>
       </table>

     </div>

   </div>
   <div class="row">
     <div class="col s12">
       <a href="/travels/add">Add Travel Plan</a>
     </div>
   </div>


  <!--  Scripts-->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="/assets/js/materialize.js"></script>
  <script src="/assets/js/init.js"></script>

</body>
</html>
