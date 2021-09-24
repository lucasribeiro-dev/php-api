# PHP REST API 

## Run 
`php -S localhost:8000 -t public`

# Database

`php artisan migrate`
`php artisan db:seed`

## Routes

### USERS
GET - /user Pegar todos usuarios 
POST - /user Criar um usuario (paramentros: name,city_id,state_id, address)
PUT - /user/{id} Atualizar usuarios (paramentros: name,city_id,state_id, address)
DELETE - /user/{id} Deletar usuario pelo id

### STATE
GET - /state Pegar todos endereços 
GET - /state/{id} Pegar uma estado pelo id
GET - /state/totalUsers Pegar total de usuarios de um estado



### CITY
GET - /city Pegar todos endereços 
GET - /city/{id} Pegar uma cidade pelo id
GET - /city/totalUsers Pegar total de usuarios de um cidade

### Address
GET - /address Pegar todos endereços 
GET - /address/{id} Pegar um endereço pelo id


