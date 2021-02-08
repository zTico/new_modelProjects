create database pizzz;
use pizzz;

create table pizza(
id int not null auto_increment,
sabor varchar(50),
primary key(id)
);

insert into pizza values (null, 'Calabresa 2/2');
insert into pizza values (null, 'Mussarela 2/2');

create table entregador(
id int not null auto_increment,
nome varchar(50),
primary key(id)
);

insert into entregador values (null, 'Leonador');
insert into entregador values (null, 'Carlos');

create table bairro(
id int not null auto_increment,
nome varchar(50),
primary key(id)
);

insert into bairro values (null, 'Cidade 2000');
insert into bairro values (null, 'Aldeota');

create table acompanhamento(
id int not null auto_increment,
nome varchar (50),
primary key (id)
);

insert into acompanhamento values (null, 'Coca-Cola 1L');

create table pedidos(
id int not null auto_increment,
id_pizza int not null,
id_acompanhamento int not null,
cliente varchar(60),
endereco varchar(100),
id_bairro int not null,
id_entregador int not null,
valor decimal(8,2),
foreign key (id_pizza) references pizza(id),
foreign key (id_acompanhamento) references acompanhamento(id),
foreign key (id_bairro) references bairro(id),
foreign key (id_entregador) references entregador(id),
primary key(id)
);

select * from pedidos;
update pedidos set id_pizza = 2;

select id_pizza, id_acompanhamento, cliente, endereco, id_bairro, id_entregador, valor
from pedidos where id = 6;

select pz.sabor, a.nome, p.cliente, p.endereco, b.nome,e.nome, p.valor
from pedidos as p
inner join pizza as pz
on p.id_pizza = pz.id
inner join acompanhamento as a
on p.id_acompanhamento = a.id 
inner join bairro as b
on p.id_bairro = b.id
inner join entregador as e
on p.id_entregador = e.id
where p.id = 6;



select p.id, pz.sabor, p.cliente, p.endereco, b.nome as 'bairro', p.valor
from pedidos as p
inner join pizza as pz
on p.id_pizza = pz.id
inner join bairro as b
on p.id_bairro = b.id
order by id desc;