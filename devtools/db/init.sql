create table user (
  id int not null auto_increment,
  utilisateur varchar(255) not null,
  email varchar(255) not null,
  pass varchar(255) not null,
  primary key(id)
);
create table evaluation (
  id int not null auto_increment,
  user_id int REFERENCES user(id),
  reponses varchar(255),
  redaction varchar(512),
  primary key(id)
);
create table questions (
  id int not null auto_increment,
  category varchar(255),
  label varchar(255),
  option_1 varchar(255),
  option_2 varchar(255),
  option_3 varchar(255),
  option_4 varchar(255),
  reponse varchar(255),
  primary key(id)
)
insert into
  user (id, utilisateur, email, pass)
values
  (
    1,
    'tibo',
    't.b@outlook.fr',
    '$2y$10$u7GCIHJPq81TqOw7YddOPeTpaZBJux0Br977OLBqBuAZ0qo86rSuy'
  );