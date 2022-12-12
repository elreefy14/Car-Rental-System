INSERT INTO car (car_id,	brand,	model,	model_year,	color)
VALUES (?); 
$users = $databaseConnexion->prepare('SELECT * from users where email = ?');

    $users->execute(array($email));

INSERT INTO reservation (	rno,	user_id,car_id	,reserve,pick_up,return_date)
VALUES (?); 

INSERT INTO `status` (	car_id,	state,	status_date)
VALUES (?); 

INSERT INTO payment (rno,	`date`,	`status`,	method	)
VALUES (?);

INSERT INTO user (	user_id,	fname,	lname,	age	,gender	)
VALUES (?);


//1
SELECT *
FROM ((reservation
INNER JOIN car ON car.car_id = reservation.car_id)
INNER JOIN user ON user.user_id = reservation.user_id)
WHERE reservation.reserve BETWEEN ? AND ?
;
//2
SELECT *
FROM (reservation
INNER JOIN car ON car.car_id = reservation.car_id)
WHERE reservation.reserve BETWEEN ? AND ?
;


//3
SELECT car.car_id status.state
FROM (car
INNER JOIN status ON car.status_id = status.status_id)
WHERE status.date  = ?
;
//4
SELECT *
FROM ((reservation
INNER JOIN car ON car.car_id = reservation.car_id)
INNER JOIN user ON user.user_id = reservation.user_id)
WHERE user.user_id = ?
;

SELECT *
FROM payment
WHERE payment.date BETWEEN ? AND ?
;

CREATE TABLE car
(
    car_id int not null ,
    brand varchar(50) ,
    model varchar(50) ,
    model_year int ,
    color varchar(50) ,
    status varchar(50) ,
    PRIMARY KEY(car_id)
);
CREATE TABLE status
(
    statusId int not null ,
    car_id int ,
    state varchar(50) ,
    status_date datetime ,
    PRIMARY KEY(statusId)
);
CREATE TABLE payment
(
    paymentNo int not null ,
    date datetime ,
    status varchar(50) ,
    method varchar(50) ,
    PRIMARY KEY(paymentNo)
);
CREATE TABLE `user`
(
    user_id int not null ,
    fname varchar(50) ,
    lname varchar(50) ,
    age int,
    gender varchar(50) ,
    PRIMARY KEY(user_id)
);
CREATE TABLE reservation
(
    rno int not null ,
    user_id int ,
    car_id int ,
    paymentNo int,
    reserve datetime ,
    pick_up datetime ,
    return_date datetime ,
    PRIMARY KEY(rno)
);
ALTER TABLE payment ADD FOREIGN KEY (rno) REFERENCES reservation(rno);
ALTER TABLE reservation ADD FOREIGN KEY (user_id) REFERENCES user(user_id);
ALTER TABLE reservation ADD FOREIGN KEY (car_id) REFERENCES car(car_id);
ALTER TABLE status ADD FOREIGN KEY (car_id) REFERENCES car(car_id);
