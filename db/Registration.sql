create DATABASE registration;
USE registration;
create table user_reg (
id int primary key auto_increment ,
firstname VARCHAR(100),
lastname VARCHAR(100),
email VARCHAR(100),
Password VARCHAR(100)

);

select * from user_reg;