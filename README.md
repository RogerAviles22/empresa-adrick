# empresa-adrick
El restaurante Adrick´s Jr no lleva un control ordenado con respecto a sus ventas, generalmente porque se pierden facturas, debido a esto se propuso como solución a este problema la implementación de un sistema de facturación web.

# Instalación
Para hacer uso de la aplicación, instala
- [XAMPP](https://www.apachefriends.org/es/index.html).
- [Composer](https://getcomposer.org/)
- [Tutorial de Instalación y Ejecuión Inicial](https://www.youtube.com/watch?v=KKpXpWCTlbo&list=PLPl81lqbj-4KHPEGngoy5PSjjxcwnpCdb)

Finalizado la instalación, por CMD instala laravel de forma global
```
composer global require laravel/installer
```
Crear un proyecto
```
laravel new <nombre-proyecto>
```
Entra al proyecto
```
cd <nombre-proyecto>
```
Ejecuta Apache y MySQL en XAMPP y a continuación el servidor de esta forma
```
php artisan serve
```
Para crear un controller con los métodos sugeridos para crear CRUD, vinculando su modelo y en una carpeta específica, que será usado para conectar la vista con los urls de la pág :
```
php artisan make:controller <Carpeta>/<NameController> --resource --model=<NameModels>
```
Para migrar la base de datos:
```
php artisan migrate
```
Eloquent: Mapeador relacional de objetos (ORM) que hace que sea agradable interactuar con su base de datos. Cuando se usa Eloquent, cada tabla de la base de datos tiene un "Modelo" correspondiente que se usa para interactuar con esa tabla. Además de recuperar registros de la tabla de la base de datos, los modelos Eloquent le permiten insertar, actualizar y eliminar registros de la tabla también.
- [Documentacion Eloquent](https://laravel.com/docs/8.x/eloquent#introduction)

Laravel Breeze: Implementación mínima y simple de todas las funciones de autenticación de Laravel, que incluyen inicio de sesión, registro, restablecimiento de contraseña, verificación de correo electrónico y confirmación de contraseña.
- [Documentacion](https://laravel.com/docs/8.x/starter-kits)
- [Tutorial Instalación](https://www.youtube.com/watch?v=Gx3d9n69d9o)

Blade es el motor de plantillas simple pero poderoso que se incluye con Laravel.
- [Documentación](https://laravel.com/docs/8.x/blade#introduction)

# Librerías
SweetAlert: A BEAUTIFUL, RESPONSIVE, CUSTOMIZABLE, ACCESSIBLE (WAI-ARIA) REPLACEMENT FOR JAVASCRIPT'S POPUP BOXES
- [SweetAlert](https://sweetalert2.github.io/#download)

# Clonar
- [Tutorial para ejecutar proyecto de Laravel](https://www.youtube.com/watch?v=EdZ0hQtrfEU)

# Estructura del documento
Las secciones más importantes del proyecto son los sgtes:

## Models
Aquí estarán los Modelos del sistema con sus respectivos atributos modelados de la base de datos.
/app/Models

## Views
Las vistas de las páginas son creadas con el renderizador de plantillas .blade
/resources/views

## Controllers
Aquí está el Controlador donde se cargarán las vistas y funciones CRUD del proyecto dependiendo de las acciones del usuario.
/app/Http/Controllers/PagesController.php

## Database
Las tablas a migrar en la base de datos, con sus respectivos atributos, están en
/database/migrations

## public 
En /public tendremos los recursos a usar en el proyecto (css/js/imgs/fonts)

## Routes
Las rutas de vital importancia estarán en los sgtes carpetas:
/routes/web.php

# Recomendaciones
Si en algún momento no se reflejan los cambios en pantalla, presionar Shift + Ctrl +R 