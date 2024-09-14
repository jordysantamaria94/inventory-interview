# Inventario -  Jordy Santamaria

Este es un proyecto de inventario construido con Laravel 11. Incluye un CRUD para la gestión de productos y autenticación.

## Requisitos Previos

Antes de comenzar, asegúrate de tener las siguientes herramientas instaladas en tu máquina:

- [Composer](https://getcomposer.org/)
- [PHP 8.1+](https://www.php.net/downloads.php)
- [Node.js & npm](https://nodejs.org/en/download/)
- [Git](https://git-scm.com/)
- [SQLite](https://www.sqlite.org/download.html)

## Instalación

Sigue estos pasos para configurar el proyecto localmente:

### 1. Clonar el Repositorio

```bash
git clone https://github.com/jordysantamaria94/inventory-interview.git
cd proyecto-inventario
```

### 2. Instalar Dependencias de PHP

Instala las dependencias de Composer ejecutando el siguiente comando:

```bash
composer install
```

### 3. Configurar Variables de Entorno

```bash
cp .env.example .env
```

Genera la clave de la aplicación de Laravel:
```bash
php artisan key:generate
```

### 4. Configurar la Base de Datos

Edita el archivo .env para configurar tu base de datos. Por defecto, el proyecto usa SQLite, pero puedes configurarlo para usar MySQL u otro sistema de base de datos. Ejemplo para SQLite:

```bash
DB_CONNECTION=sqlite
DB_DATABASE=/database/database.sqlite
```

### 5. Crear la Base de Datos

```bash
touch database/database.sqlite
```

### 6. Ejecutar Migraciones y Seeders

Ejecuta las migraciones para crear las tablas en la base de datos:

```bash
php artisan migrate
```

### 7. Instalar Dependencias de Node.js

Instala las dependencias de Node.js necesarias para el frontend:

```bash
npm install
```

### 8. Compilar Assets

Compila los assets de frontend usando Laravel Mix:

```bash
npm run dev
```

### 9. Iniciar el Servidor

Inicia el servidor de desarrollo de Laravel:

```bash
php artisan serve
```

Por defecto, esto iniciará el servidor en http://127.0.0.1:8000. Puedes acceder a esta URL en tu navegador web.

### Comandos Útiles

#### Ejecutar pruebas:
```bash
php artisan test
```

#### Ejecutar migraciones:
```bash
php artisan migrate
```

#### Deshacer las últimas migraciones:
```bash
php artisan migrate:rollback
```

#### Compilar assets: 
```bash
npm run dev o npm run prod
```


### Problemas Comunes

Migraciones fallidas: Revisa la configuración de la base de datos en el archivo .env