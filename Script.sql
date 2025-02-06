create database cabinetMvc ;
\c cabinetMvc 
create table if not exists  "user" (
    id  int primary key  ,       
    prenom  varchar(50) not null ,
    nom  varchar(50) not null, 
    email  varchar(50) not null , 
    password  varchar(100)  not null, 
    role int not null check (role in (0, 1))
);
create table if not exists medecin(
    id int primary key  ,
    ban  int not null check(ban in (0,1)),
    constraint fk_medcin foreign key (id)  references "user"(id)
);
create table if not exists patient(
    id int primary key   ,
    ban  int not null check(ban in (0,1)),
    constraint fk_patient foreign key (id)  references "user"(id)
);
create type  enum_statut as  enum ('acsupte','confirme');
create table if not exists rendezvous(
    id int primary key  ,
    statut enum_statut not null,
    id_patient int not null,
    id_medcin  int not null,
    constraint  FK_rendezpatient foreign key (id_patient) references "user" (id),
    constraint  FK_rendezmedcin foreign key (id_medcin) references "user" (id)
);


