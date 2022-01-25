drop table if exists user,
evaluation,
question;
create table user (
  id int not null auto_increment,
  utilisateur varchar(255) not null,
  email varchar(255) not null,
  pass varchar(255) not null,
  primary key(id)
);
create table evaluation (
  id int not null auto_increment,
  user_id int REFERENCES user(id) ON DELETE CASCADE ON UPDATE CASCADE,
  reponses varchar(255),
  redaction varchar(512),
  pourcentage_reussite int,
  note_redaction int,
  primary key(id)
);
create table question (
  id int not null auto_increment,
  numero int not null unique,
  category varchar(255),
  question_link_type varchar(255),
  question_link varchar(512),
  question_label varchar(255) not null,
  reponse_type varchar(255) not null,
  option_a varchar(512) not null,
  option_b varchar(512) not null,
  option_c varchar(512) not null,
  option_d varchar(512) not null,
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
  user (id, utilisateur, email, pass)
values
  (
    2,
    'vini',
    'vini@outlook.fr',
    '$2y$10$u7GCIHJPq81TqOw7YddOPeTpaZBJux0Br977OLBqBuAZ0qo86rSuy'
  );
insert into
  question (
    id,
    numero,
    category,
    question_link_type,
    question_link,
    question_label,
    reponse_type,
    option_a,
    option_b,
    option_c,
    option_d,
    reponse
  )
values
  (
    1,
    1,
    "Comprehension Ecrite",
    NULL,
    NULL,
    "Sélectionnez l’infirmier",
    "img",
    "assets/img/img1.jpg",
    "assets/img/img2.jpg",
    "assets/img/img3.jpg",
    "assets/img/img4.jpg",
    "a"
  ),
  (
    2,
    2,
    "Comprehension Ecrite",
    "img",
    "https://www.tooadhesifs.com/5425-pdt_540/a0003-ps-film-jaune-citron-en-050m.jpg",
    "De quelle couleur est cette image ?",
    "text",
    "Jaune",
    "Verte",
    "Rouge",
    "Bleue",
    "a"
  ),
  (
    3,
    3,
    "Communication",
    "audio",
    "assets/audio/audio2.mp3",
    "Sélectionnez l’image correspondante à l'audio.",
    "img",
    "assets/img/img5.jpg",
    "assets/img/img6.jpg",
    "assets/img/img7.jpg",
    "assets/img/img8.jpg",
    "a"
  ),
  (
    4,
    4,
    "Communication",
    "audio",
    "assets/audio/audio1.mp3",
    "Sélectionnez l’image correspondante à l'audio.",
    "img",
    "assets/img/img9.jpg",
    "assets/img/img10.jpg",
    "assets/img/img11.jpg",
    "assets/img/img12.jpg",
    "a"
  ),
  (
    5,
    5,
    "Grammaire",
    NULL,
    NULL,
    "Marie habite en France, …………… Paris",
    "text",
    "au",
    "en",
    "à la",
    "à",
    "a"
  ),
  (
    6,
    6,
    "Grammaire",
    NULL,
    NULL,
    "Amina …………… le fromage avec du pain.",
    "text",
    "au",
    "sommes",
    "à la",
    "à",
    "a"
  ),
  (
    7,
    7,
    "Grammaire",
    NULL,
    NULL,
    "Carla et Nicolas …………… mariés.",
    "text",
    "aimes",
    "aiment",
    "aime",
    "aimons",
    "a"
  ),
  (
    8,
    8,
    "Grammaire",
    NULL,
    NULL,
    "Sophie va acheter un pull …………… .",
    "text",
    "aimes",
    "au magasin",
    "à l'hôtel de ville",
    "à la boulangerie",
    "a"
  ),
  (
    9,
    9,
    "Grammaire",
    NULL,
    NULL,
    "Sélectionnez la phrase correcte.",
    "text",
    "L'appartement ne pas est dans le centre-ville.",
    "L'appartement n'est pas dans le centre-ville.",
    "L'appartement pas n'est dans le centre-ville.",
    "L'appartement est ne pas dans le centre-ville.",
    "a"
  ),
  (
    10,
    10,
    "Grammaire",
    "img",
    "assets/img/img13.jpg",
    "Les chaises sont ……………",
    "text",
    "vert",
    "verts",
    "verte",
    "vertes",
    "a"
  ),
  (
    11,
    11,
    "Lexique",
    NULL,
    NULL,
    "Je mange du poulet tous les mercredis.",
    "img",
    "assets/img/img14.jpg",
    "assets/img/img15.jpg",
    "assets/img/img16.jpg",
    "assets/img/img17.jpg",
    "a"
  ),
  (
    12,
    12,
    "Lexique",
    "img",
    "assets/img/img18.png",
    "Sélectionnez le mot correct.",
    "text",
    "Traversez",
    "Tournez à droite",
    "Tournez à gauche",
    "Allez tout droit",
    "a"
  ),
  (
    13,
    13,
    "Lexique",
    NULL,
    NULL,
    "Tous les matins, Sakura et Maurice …………… à 7h30.",
    "text",
    "se lever",
    "se lèver",
    "nous levons",
    "me lève",
    "a"
  ),
  (
    14,
    14,
    "Lexique",
    NULL,
    NULL,
    "Sélectionnez la phrase correcte.",
    "text",
    "Hier, les enfants ont allé à la piscie.",
    "Hier, les enfants a allé à a piscine.",
    "Hier, les enfants sont allé à la piscine",
    "Hier, les enfants est allé à la piscine",
    "a"
  );