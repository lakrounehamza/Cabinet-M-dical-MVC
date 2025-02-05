create database cabinetMvc ;
use cabinetMvc ;
create table if not exists  "user" (
    id  int primary key auto_increment ,
    prenom  varchar(50) not null ,
    nom  varchar(50) not null, 
    email  varchar(50) not null, 
    password  varchar(100)  not null, 
    role intity not null
)
create table if not exists medecin(
    id int primary key  ,
    ban  intity not null,
    constraint fk_medcin foreign key (id)  references "user"(id)
)
create table if not exists patient(
    id int primary key   ,
    ban  intity not null,
    constraint fk_patient foreign key (id)  references "user"(id)
)
create table if not exists rendezvous(
    id primary key auto_increment ,
    statut  enum ('acsupte','confirme'),
    id_patient int not null,
    id_medcin  int not null,
    constraint  FK_rendezpatient foreign key (id_patient) references "user" (id),
    constraint  FK_rendezmedcin foreign key (id_medcin) references "user" (id)
)