create database firstdatabase;

create table firstdatabase.roles
(
  id int primary key auto_increment,
  name varchar(50)
);

insert  into firstdatabase.roles(name)
value ('Assitant'),('teacher'),('student');
select*from firstdatabase.roles;
  

create table firstdatabase.users
( 
  id int primary key auto_increment,
  name varchar(50),
  email varchar(250) unique,
  passw varchar(50),
  role int,
  foreign key (role) references firstdatabase.roles(id)
);

insert into firstdatabase.users(name,email,passw,role)
value ('a','a@gmail.com','1234',2),('b','b@gmail.com','321',3),('c','c@gmail.com','345',2);
select*from firstdatabase.users;
drop table firstdatabase.users;

select firstdatabase.roles.name,firstdatabase.users.name,firstdatabase.users.email,firstdatabase.users.passw,firstdatabase.users.id
from firstdatabase.users   
right join firstdatabase.roles ON firstdatabase.users.role=firstdatabase.roles.id
order by firstdatabase.users.role;


select firstdatabase.users.id,firstdatabase.users.name,firstdatabase.users.email,firstdatabase.users.passw,firstdatabase.roles.name as job
from firstdatabase.users
right join firstdatabase.roles ON firstdatabase.users.role=firstdatabase.roles.id
order by firstdatabase.users.id;






  
  