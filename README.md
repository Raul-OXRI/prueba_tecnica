<p align="center">
  <a href="https://laravel.com" target="_blank">
    <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="380" alt="Laravel Logo">
  </a>
</p>

# API – Prueba Técnica  
## Sistema de Gestión de Agencias – Cooperativa Cobán

---

## Objetivo del Proyecto

El objetivo de esta prueba técnica es **evaluar las competencias técnicas**, el **criterio de diseño**, el uso de **buenas prácticas de desarrollo**, la **arquitectura de software** y la **capacidad de documentación** del aspirante al puesto de **Desarrollador de Software**.

La evaluación se realiza mediante la construcción de una **aplicación web funcional**, orientada al **registro, administración y visualización de agencias** de la Cooperativa Cobán.

---

## Aspectos Evaluados

- [ ] Lógica de programación y estructura del código  
- [ ] Arquitectura backend y diseño de APIs REST  
- [ ] Modelado y manejo de base de datos  
- [ ] Seguridad, autenticación y roles  
- [ ] Integración con servicios externos  
- [ ] Diseño frontend y experiencia de usuario  
- [ ] Documentación técnica  
- [ ] Preparación para despliegue  

---

## Descripción General de la Solución

La solución se divide en dos partes principales:

- **Backend (API REST)** desarrollado en **Laravel**
- **Frontend** desarrollado en **React**

El sistema permite:

- Autenticación de usuarios
- Control de acceso por roles
- Gestión de usuarios
- Gestión de agencias
- Manejo de estados (activo / inactivo)
- Integración con Amazon S3 para almacenamiento de imágenes
- Preparación para consumo desde aplicaciones externas

---

##  Arquitectura de la Solución

### Backend – API REST
- Arquitectura RESTful
- Autenticación basada en tokens
- Middleware para control de acceso
- Validaciones centralizadas
- Separación clara entre controladores, modelos y servicios

### Frontend
- Aplicación SPA
- Consumo de la API mediante Axios
- Interfaces modernas y responsivas
- Enfoque en experiencia de usuario

---

##  Seguridad y Middleware

Se implementaron los siguientes middlewares:

- **Middleware de Autenticación**  
  Verifica que el usuario esté autenticado mediante token.

- **Middleware de Roles**  
  Restringe el acceso a rutas según el rol del usuario (admin, consulta, etc.).

- **Middleware CORS**  
  Permite la comunicación segura entre el backend y el frontend u otros clientes externos.

---

##  Autenticación

El sistema valida:

- Credenciales del usuario
- Estado del usuario (activo / inactivo)
- Rol asignado

Solo los usuarios autorizados pueden acceder a los módulos protegidos del sistema.

---

##  Módulo de Usuarios

Permite:

- Crear usuarios
- Actualizar información
- Activar / desactivar usuarios
- Asignar roles
- Controlar acceso al sistema

Incluye un **CRUD completo** siguiendo buenas prácticas de validación y seguridad.

---

##  Módulo de Agencias

Es el módulo principal del sistema. Permite:

- Registrar agencias
- Actualizar información
- Consultar agencias activas e inactivas
- Asociar ubicación
- Controlar estado de cada agencia

Toda la información se gestiona mediante endpoints REST.

---

##  Tecnologías Utilizadas

### Backend
- PHP 8.3
- Laravel
- MySQL
- Amazon S3
- Intervention Image

### Frontend
- React
- Tailwind CSS
- DaisyUI
- FontAwesome
- Google Maps JavaScript API (opcional)
- Waze (redireccionamiento)

### Herramientas
- Composer 2.9.1
- Git 2.43.0

---

##  Requisitos Previos

Antes de iniciar, asegúrese de tener instalado:

- PHP >= 8.3
- Composer
- Git
- MySQL

---

##  Clonación del Repositorio

Se recomienda tener una **clave SSH configurada en GitHub**.

📺 Video de referencia:  
[Configuración de claves SSH para Git y GitHub](https://www.youtube.com/watch?v=akuG7eRtaXc)

### Clonar el repositorio

```bash
git clone git@github.com:Raul-OXRI/prueba_tecnica.git
```

### Ingresar al proyecto:

```
cd prueba_tecnica

```

### Instalación del Backend

```
composer install

```

### Configuarar variables de entorno 

```
cp .env.example .env

```

### Crear base de datos
```
CREATE DATABASE devprueba;

```

### Configurar conexión en .env
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=devprueba
DB_USERNAME=SU_USUARIO
DB_PASSWORD=SU_PASSWORD

```

### Ejecutar migraciones

```
php artisan migrate

```

### Iniciar servidor
```
php artisan migrate

```

## Amazon S3 – Manejo de Imágenes

El proyecto utiliza Amazon S3 para almacenamiento de imágenes. Para el procesamiento de imágenes se utiliza:

```
composer require intervention/image:^3.0

```

## Solución de Problemas (Dependencias PHP)
Si presenta errores relacionados con extensiones de PHP, ejecute:

```
sudo apt install -y git unzip curl \
php8.2 php8.2-cli php8.2-fpm php8.2-mysql \
php8.2-mbstring php8.2-zip php8.2-gd \
php8.2-curl php8.2-xml php8.2-bcmath \
libpng-dev libjpeg-dev libfreetype6-dev


```

## Despliegue

El proyecto está preparado para ser desplegado en plataformas como:

Railway

Las variables de entorno deben configurarse correctamente en producción.

