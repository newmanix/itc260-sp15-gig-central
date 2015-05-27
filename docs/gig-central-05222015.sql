create table test_Customers
( CustomerID int unsigned not null auto_increment primary key,
LastName varchar(50),
FirstName varchar(50),
Email varchar(80)
);

insert into test_Customers values (NULL,"Smith","Bob","bob@example.com");
insert into test_Customers values (NULL,"Jones","Bill","bill@example.com");
insert into test_Customers values (NULL,"Doe","John","john@example.com");
insert into test_Customers values (NULL,"Rules","Ann","ann@example.com");