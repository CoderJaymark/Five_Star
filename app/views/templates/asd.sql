Select distinct title from users;

Select dept.department_name,div.division_name,user.first_name,user.last_name from users user left join department dept 
   on user.department_id=dept.department_id 
   left join division div  on dept.division_id=div.division_id;

3. Select dept.department_name,div.division_name,user.first_name,user.last_name ,user.first_name as manager_first_name
   from users u left join department dept 
   on user.department_id=dept.department_id 
   left join division div  on dept.division_id=div.division_id
   left join users user on user.manager_id=user.manager_id;

4.  Select dept.department_name,div.division_name,user.first_name,user.last_name ,user.first_name as manager_first_name
   from users u left join department dept 
   on user.department_id=dept.department_id 
   left join division div  on dept.division_id=div.division_id
   left join users user on user.manager_id=user.manager_id;
    where dept.department_name!='Whole%';

5.  select count(*) as No_of_Users from users;

6.  select count(*) as No_of_managers from manager;
  
7.  select sum(salary) as total_annual_salary from users

8.  select sum(salary) as total_annual_salary,dv.division_name from users u 
    join department dept on dept.department_id=user.department_id
    join division divv on dv.division_id=dept.division_id group by division_name;

9.  select dv.division_code,dv.division_name,dept.department_code,dept.department_name, sum(salary) as total_annual_salar from users u 
    join department dept on dept.department_id=user.department_id
    join division divv on dv.division_id=dept.division_id group by division_name;

10.//table users
     insert into users (user_login,department_id,date_hired,manager_id,first_name,last_name,title,salary) values ('mike',null,'2011-01-01',1,'Robert','Sayo','CEO',13000000.00);
    
     insert into users (user_login,department_id,date_hired,manager_id,first_name,last_name,title,salary) values ('michelle2',3,'2011-01-01',null,'Mary','Cruz','IT Head',1365000.00); 

     insert into users (user_login,department_id,date_hired,manager_id,first_name,last_name,title,salary) values ('kali',null,'2011-01-01',1,'Robert','Sayo','CEO',13000000.00);
    
     insert into users (user_login,department_id,date_hired,manager_id,first_name,last_name,title,salary) values ('jake12',3,'2011-01-01',null,'Mary','Cruz','IT Head',1365000.00); 
 
   // division

     insert into division (division_name,division_code) values ('RETAIL','RET');

     insert into division (division_name,division_code) values ('WHOLESALE','WHO');

     insert into division (division_name,division_code) values ('HALFSALE','HS');

     insert into division (division_name,division_code) values ('COPERATE','COP');
     insert into division (division_name,division_code) values ('CORPORATE','COR');
  
  // department

    insert into department (department_name,department_code,division_id) values ('IT STAFF ','IT',3);

    insert into department (department_name,department_code,division_id) values ('Softwate Management','SM',3);

    insert into department (department_name,department_code,division_id) values ('Retail Marketing','RETMKT',1);

    insert into department (department_name,department_code,division_id) values ('Wholesale Marketing','WHOMKT',2);

    insert into department (department_name,department_code,division_id) values ('TRADING Marketing','TRDING',2);




11. Select dept.department_name,div.division_name,user.first_name,user.last_name ,user.first_name as manager_first_name
   from users u left join department dept 
   on user.department_id=dept.department_id 
   left join division div  on dept.division_id=div.division_id
   left join users user on user.manager_id=user.manager_id;
    where dept.department_name!='Whole%';
    
12. create table cost_center(
    cost_center_id int AUTO_INCREMENT,
    cost_center_code varchar(45) not null,
    cost_center_name varchar(45) not null,
    department_id int null REFERENCES department(department_id),
    PRIMARY_KEY(cost_center_id )
);
  





 create table manager (
 manager_id int AUTO_INCREMENT,
 manager_first_name varchar(45) not null,
 manager_last_name varchar(45) not null,
 PRIMARY KEY(manager_id )
);