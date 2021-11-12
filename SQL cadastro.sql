create database db_nautico default charset=utf8mb4;

create table if not exists adm(
id_adm int auto_increment,
nome varchar(90),
cpf_cnpj varchar(18),
email varchar(50) unique,
senha varchar(255),
chave_ativar varchar(255),
sit_adm int default'2',
created datetime,
modified datetime,
primary key(id_adm)
)engine InnoDB;

create table if not exists barco(
id_barco int auto_increment,
nome_barco varchar(50),
foto_barco varchar(255) default'sem_foto.jpg',
tipo varchar(50),
capacidade int,
atividade varchar(255),
andares int default'1',
comprimento decimal(5,2),
cidade varchar(50),
estado varchar(50),
sit_barco int default'1',
id_adm_fk int,
primary key(id_barco),
foreign key(id_adm_fk) references adm(id_adm)) default charset=utf8mb4;

create table if not exists titular(
id_titular int,
nome varchar(90),
cnpj varchar(18),
cpf varchar(14),
tie_tiem varchar(30),
foreign key (id_titular) references barco(id_barco)) default charset=utf8mb4;

create table if not exists agenda(
id_agenda int,
dia datetime,
andar int,
foreign key (id_agenda) references barco(id_barco));

create table if not exists horarios(
id_horario int,
saida time,
retorno time,
foreign key (id_horario) references barco(id_barco));

create table if not exists log(
id_log int,
andar int,
preco double,
vagas int,
foreign key (id_log) references barco(id_barco));

create table if not exists fotos(
id_foto int,
foto varchar(255),
foreign key (id_foto) references barco(id_barco));




