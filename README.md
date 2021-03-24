#  Montaje en ambiente local  

se debe montar el proyecto en un servidor apache (puede ser laragon,xampp)

se deben activar los dirvers para  Postgres en php  
extension=pdo_pgsql 
extension=pgsql 

se debe modificar el tipo de encriptación de la autenticación : 

cambiar password_encryption = md5 en  postgresql.conf 
cambiar metodo de autenticacion  md5 en  pg_hba_conf 
reiniciar PostgreSQL 
cambiar la contraseña del usuario 

una vez hecha la conexión de debe crear el esquema "colegio" y luego correr las migraciones de laravel  

con: php artisan migrate 
