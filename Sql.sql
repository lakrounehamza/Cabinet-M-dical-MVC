create database cabinetMvc ;
\c cabinetMvc   
create table if not exists  "user" (
    id  serial primary key  ,       
    prenom  varchar(50) not null ,
    nom  varchar(50) not null, 
    email  varchar(50) not null , 
    password  varchar(100)  not null, 
    role int not null check (role in (0, 1)),
    date_creation  varchar(20) not null
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
create type  enum_statut as  enum ('acsupte','anulle','encore');
create table if not exists rendezvous(
    id serial primary key  ,
    statut enum_statut not null,
    id_patient int not null,
    id_medcin  int not null,
    date_craeted varchar(20) not null,
    constraint  FK_rendezpatient foreign key (id_patient) references "user" (id),
    constraint  FK_rendezmedcin foreign key (id_medcin) references "user" (id)
); 
insert into \"user\"  (statut , id_patient , id_medcin ,date_craeted) values (:statut , :id_patient , :id_medcin ,:date_craeted)
select  u.*  ,r.statut ,r.date_craeted  from "user" u join rendezvous r on u.id =r.id_patient    where r.id_medcin = 1;

