drop table if exists user,
evaluation,
questions;
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
  numero int not null,
  category varchar(255),
  question_link_type varchar(255),
  question_link varchar(512),
  question_label varchar(255) not null,
  reponse_type varchar(255) not null,
  option_A varchar(512) not null,
  option_B varchar(512) not null,
  option_C varchar(512) not null,
  option_D varchar(512) not null,
  reponse varchar(255) not null,
  primary key(id)
);
insert into
  user (id, utilisateur, email, pass)
values
  (
    1,
    'tibo',
    't.b@outlook.fr',
    '$2y$10$u7GCIHJPq81TqOw7YddOPeTpaZBJux0Br977OLBqBuAZ0qo86rSuy'
  );
insert into
  questions (
    id,
    numero,
    category,
    question_link_type,
    question_link,
    question_label,
    reponse_type,
    option_A,
    option_B,
    option_C,
    option_D,
    reponse
  )
values
  (
    1,
    1,
    "Compréhension écrite",
    NULL,
    NULL,
    "Sélectionnez l’infirmier",
    "img",
    "assets/img/imga1.jpg",
    "assets/img/imga (1).jpg",
    "assets/img/imga (2).jpeg",
    "assets/img/imga (4).jpg",
    "A"
  ),(
    2,
    2,
    "Compréhension écrite",
    "img",
    "https://www.tooadhesifs.com/5425-pdt_540/a0003-ps-film-jaune-citron-en-050m.jpg",
    "De quelle couleur est cette image ?",
    "text",
    "Jaune",
    "Verte",
    "Rouge",
    "Bleue",
    "A"
  );