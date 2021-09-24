# PHP REST API 

## Command 
`php -S 127.0.0.1:8090`

## Database
Precisa criar o banco de dados e as tabelas (tem um dump para ser usado na basta dump_db)

## Routes

### USERS
GET - /php-api/api/user/read.php Pegar todos usuarios 
GET - /php-api/api/user/delete.php?id=1 Deletar um usuario
POST - /php-api/api/user/create.php Criar usuarios (paramentros: name,city_id,state_id, address)
POST - /php-api/api/user/update.php Update Record (paramentros: name,city_id,state_id,address,id )

### STATE
GET - /php-api/api/state/read.php Pegar todos estados 
GET - /php-api/api/state/readBy.php?id=1 Pegar um id por estado
GET - /php-api/api/state/totalUsers.php?id=1 Pegar total de usuarios de um estado



### CITY
GET - /php-api/api/city/read.php Pegar todas cidades 
GET - /php-api/api/citystate/readBy.php?id=1 Pegar uma cidade pelo id
GET - /php-api/api/citystate/totalUsers.php?id=1 Pegar total de usuarios de um cidade

### Address
GET - /php-api/api/address/read.php Pegar todos endereços 
GET - /php-api/api/address/readBy.php?id=1 Pegar um endereço pelo id


