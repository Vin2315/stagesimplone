create table user(
  id int auto_increment,
  utilisateur varchar(255) not null,
  email varchar(255) not null,
  pass varchar(255) not null,
  primary key(id)
);