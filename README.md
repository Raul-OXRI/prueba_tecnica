<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>


# api prueba tecnica 

#### objetivo:
Evaluar las competencias técnicas, criterio de diseño, buenas prácticas de desarrollo y capacidad de documentación de aspirantes a los puestos de Desarrollador de Software, mediante la construcción de una aplicación web funcional orientada al registro y administración de agencias de Cooperativa
Cobán.

La prueba está diseñada para medir:

- [ ] Lógica de programación y estructura del código

- [ ] Diseño frontend y experiencia de usuario

- [ ] Arquitectura backend y uso de APIs REST

- [ ] Modelado y manejo de base de datos

- [ ] Documentación técnica y despliegue

---

Se realizo el backen en PHP con el framework de Laravel, ya que con este lenguaje me desenvuelvo mejor, por lo que comenzamos con la breve descripcion de que se realizo.

Se crearon los Middlewares del proyecto se utilizo dos, uno de roles y otro de cors. El archivo de cors son los que nos ayudara a conectarnos con la aplicaciones de exterior como fronted y apis.

Despues se creo la logica de autenticación, donde nos ayudara a autenticar si el usuario tiene permisos o esta desactivado.

Otro paso sera la creación del modulo de usuarios donde se creara un CRUD donde se colocara los datos personales de los que utilizaran la plataforma. De igual manera se realizara el modulo principal que es la de Agencias donde se colocara los datos idispensables para realizar el CRUD.

---

## Dependencias

* php = 8.3
* Composer = 2.9.1
* git = 2.43.0

base de datos

* mysql 

#  GITCLONE 

Se recomienda tener una clave Ssh asociada a su github para tener un entorno practico. 

si en dado caso no lo tiene guiarse con el siguiente video:

[Configuración de claves SSH para git y github](https://www.youtube.com/watch?v=akuG7eRtaXc)

se clona el repositorio:

```bash
git clone git@github.com:Raul-OXRI/prueba_tecnica.git
```
se debe de ingresar a la carpeta prueba_tecnica

```bash
cd prueba_tecnica
```
despues se debe de colocar el siguiente comando que nos ayudara a intarlar las dependecias:

```bash
composer install
```
despues de aver instalado las dependencias se debe copiar el env o configuracion de servicios:

```bash
cp .env.example .env
``` 

despues de esto se debe de crear una base de datos ya dependera de usted que nombre se coloque 

```MYSQL
CREATE DATABASE devprueba;
```

se debera de reemplazar estas lineas de codigo 

```
DB_CONNECTION=sqlite
# DB_HOST=127.0.0.1
# DB_PORT=3306
# DB_DATABASE=laravel
# DB_USERNAME=root
# DB_PASSWORD=
```

por las siguientes:

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=devprueba
DB_USERNAME= 'nombre que se tenga de su usuario de bd'
DB_PASSWORD= 'igual aqui depende que password tenga su usuario en la bd'
```

despues de esto se debera de hacer el siguiente comando:
```bash
php artisan migrate
```
y por ultimo se debera de ejecutar el siguiente comando:

```
php artisan serve
```


```bash
composer require intervention/image:^3.0

```