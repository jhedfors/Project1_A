select * from users;
select * from schedules;
select * from destinations;

INSERT INTO users (name, username, password,created_at, modified_at) values ('Kazu Hedfors','khedfors','12345678',NOW(),NOW());
-- add user

SELECT username, password FROM users
WHERE username='jhedfors';
-- show from users

select * from destinations;
-- show all destinations

INSERT INTO destinations (destination, description, start_date, end_date,created_at, modified_at,user_planner_id)
VALUES ('Mountain View, CA', 'Tour Google campus', '2016-05-10', '2016-05-11', NOW(),NOW(),2);

-- add destination

select * from schedules;
-- 
INSERT INTO schedules ( user_id, destination_id ) VALUES (1, 2);
 -- add user to schedule
 
 -- JOINS --

 select * from destinations;
   
-- show all schedules
 SELECT 
    users.name, destination, start_date, end_date, description
FROM
    destinations
        LEFT JOIN
    schedules ON destinations.id = schedules.destination_id 
        LEFT JOIN
    users ON users.id = schedules.user_id  OR users.id = destinations.user_planner_id;
	-- WHERE users.id = 1; 
-- show all schedules for user


-- show all schedules
 SELECT 
    users.name, destination, start_date, end_date, description
FROM
    destinations
        LEFT JOIN
    schedules ON destinations.id = schedules.destination_id 
        LEFT JOIN
    users ON users.id = schedules.user_id  OR users.id = destinations.user_planner_id
	WHERE destinations.id = 1; 
-- show all schedules for user
 SELECT 
    users.name, destination, start_date, end_date, description
FROM
    destinations
        LEFT JOIN
    schedules ON destinations.id = schedules.destination_id 
        LEFT JOIN
    users ON  users.id = destinations.user_planner_id
   WHERE destinations.id = ; 
-- show all schedules not for user





 SELECT users.name, destination, start_date, end_date, description FROM destinations
 LEFT JOIN schedules ON destinations.id = schedules.destination_id
 LEFT JOIN users ON users.id = schedules.user_id
 WHERE users.id = 2;
-- show schedule by ID


SELECT 
    users.id AS user_id,
    users.name,
    destination,
    destinations.id AS dest_id,
    user_planner_id,
    start_date,
    end_date,
    description
FROM
    destinations
        LEFT JOIN
    schedules ON destinations.id = schedules.destination_id
        LEFT JOIN
    users ON users.id = schedules.user_id
        OR users.id = destinations.user_planner_id
ORDER BY CASE WHEN users.id = 2 THEN 1 ELSE 2 END, users.id;

