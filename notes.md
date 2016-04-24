# Welcome('/main')
  * register
    * name
    * username
    * password
    * password_conf
  * login
    * username
    * password

### Queries
*  __add__ user
* __show__ all users where username exists
* __show__ user where username matches

# Travels ('/travels')
   * href= logout
 ## Your trip Shedules
  * destination
  * travel_start_date
  * travel_end_date
  * plan
  ### Queries
  * _show_ (users schedule where ID matches)
  ## Others travel plans
  * name
  * destination
  * travel_start_date
  * travel_end_date
  * href = 'Join'
  * href 'add travel plan'
  ### Queries
  * add users.id to table with user ids and destination ids (trip Schedules)
  * __show__ plans that user is not a part of
#  Destination (/travels/destination/(destination ID))
* href "Home"
* href "Logout"
* name
* planner (user.id, user.name)
* description
* start_date
* end_date
## Others joining (not including the creator)
* first_name
* last_name

### Queries
* __show__ destination by id
* __show__ users who are joining the trip ex. creator

#Add a trip (validations)
* name
* description
* start_date
* end_date
* redirect to travel dashboard
### Queries
* __add__ details to destination table
