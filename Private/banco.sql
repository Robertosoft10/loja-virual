CREATE DATABASE lojavirtual;
USE lojavirtual;

CREATE TABLE tb_login(
idUser int not null auto_increment primary key,
username varchar(255),
user_email varchar(255),
password varchar(255)
);
CREATE TABLE tb_categorias(
idCateg int not null auto_increment primary key,
categoria varchar(30)
);

CREATE TABLE tb_itens(
idItem int not null auto_increment primary key,
nome_item varchar(255),
preco varchar(20),
valor varchar(20),
codigo varchar(30),
sexo varchar(30),
categ_item int,
imagem varchar(255),
descricao varchar(900),
foreign key (categ_item) references tb_categorias (idCateg)
);

CREATE TABLE tb_loja(
idLoja int not null auto_increment primary key,
razao varchar(255),
cnpj varchar(30),
fone varchar(30),
email varchar(255),
endereco varchar(500)
);
CREATE TABLE tb_propaganda(
idProp int not null auto_increment primary key,
mensagem varchar(50),
propaganda varchar(100),
desconto varchar(30),
imagem_site varchar(255)
);
CREATE TABLE tb_propaganda_femin(
idProFemin int not null auto_increment primary key,
titulo varchar(50),
imagem_femin varchar(255)
);
CREATE TABLE tb_propaganda_masc(
idProMasc int not null auto_increment primary key,
titulo varchar(50),
imagem_masc varchar(255)
);
CREATE TABLE tb_usuario(
  idUser int not null auto_increment primary key,
  nome_user varchar(255),
  email_user varchar(255),
  senha_user varchar(255),
  nivel_user varchar(30)
);
CREATE TABLE tb_mensagens_user(
  idMensag int not null auto_increment primary key,
  mensage_user varchar(255),
  nome_user varchar(255),
  email_user varchar(255),
  data_mensge varchar(30)
);
CREATE TABLE tb_pedidos(
  idPedido int not null auto_increment primary key,
  user int,
  item int,
  quantidade varchar(30),
  valor_pedido varchar(30),
  data_pedido varchar(30),
foreign key (user) references tb_login (idUser),
foreign key (item) references tb_itens (idItem)
);
CREATE TABLE tb_compras(
idCompra int not null auto_increment primary key,
usuario_login int,
endereco varchar(900),
cep varchar(20),
parcelas varchar(30),
telefone varchar(20),
cpf varchar(30),
nomeCartao varchar(50),
numeroCartao varchar(50),
data_compra varchar(50),
foreign key (usuario_login) references tb_login (idUser)
);
