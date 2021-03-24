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
Para migrar la base de datos con los seeders (datos generados automaticamente de categoria, producto y user["admin","1234"]):
```
php artisan migrate --seed
```
En caso de haber actualizado un campo de algún registro, con este comando lo actualizas pero eliminando los datos de la base:
```
php artisan migrate:fresh
```
Crear Listener para almacenar ultima fecha conectado
```
php artisan make:listener LoginListener
```
Eloquent: Mapeador relacional de objetos (ORM) que hace que sea agradable interactuar con su base de datos. Cuando se usa Eloquent, cada tabla de la base de datos tiene un "Modelo" correspondiente que se usa para interactuar con esa tabla. Además de recuperar registros de la tabla de la base de datos, los modelos Eloquent le permiten insertar, actualizar y eliminar registros de la tabla también.
- [Documentacion Eloquent](https://laravel.com/docs/8.x/eloquent#introduction)

Laravel Breeze: Implementación mínima y simple de todas las funciones de autenticación de Laravel, que incluyen inicio de sesión, registro, restablecimiento de contraseña, verificación de correo electrónico y confirmación de contraseña.
- [Documentacion](https://laravel.com/docs/8.x/starter-kits)
- [Tutorial Instalación](https://www.youtube.com/watch?v=Gx3d9n69d9o)

Blade es el motor de plantillas simple pero poderoso que se incluye con Laravel.
- [Documentación](https://laravel.com/docs/8.x/blade#introduction)

# Roles y permisos
Para roles y permisos, ejecutamos el sgte comando para instalar este paquete.
```
composer require spatie/laravel-permission
```
- [Documentation Spatie](https://spatie.be/docs/laravel-permission/v4/installation-laravel)
En vendor/ spatie/ migrations aparecen las tablas necesarias para los roles y permisos, en este video explican brevemente las 5 tablas nuevas:
- [Tutorial 1:10](https://www.youtube.com/watch?v=L42lLOOLB8g)
Entonces, para ubicar dichas tablas en la carpeta de las migraciones, ejecutamos
```
php artisan vendor:publish --provider="Spatie\Permission\PermissionServiceProvider"
```
Los Seeders nos ayudarán a crear datos en la base cuando el programa se ejecute
```
php artisan make:seeder "nameSeeder"
```
Creado los roles y sus permisos, ejecutamos el sgte comando para actualizar las migraciones y los seeders.
```
php artisan migrate:fresh --seed
```


# Librerías
SweetAlert: A BEAUTIFUL, RESPONSIVE, CUSTOMIZABLE, ACCESSIBLE (WAI-ARIA) REPLACEMENT FOR JAVASCRIPT'S POPUP BOXES
- [SweetAlert](https://sweetalert2.github.io/#download)
- [Tutorial Uso](https://www.youtube.com/watch?v=D3Ww5FGa1mY)

Higcharts: Facilita a los desarrolladores la configuración de gráficos interactivos en sus páginas web
- [Highcharts](https://www.highcharts.com/demo/pie-basic)
- [Tutorial](https://www.itsolutionstuff.com/post/how-to-add-charts-in-laravel-5-using-highcharts-example.html)

DOMPDF Wrapper for Laravel: Para crear PDF en Laravel. Es necesario instalarlo por composer
- [Documentacion](https://github.com/barryvdh/laravel-dompdf)
```
composer require barryvdh/laravel-dompdf
```

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

Eliminar mensaje en phpAdmin, esto puede ser causado por las cookies generadas del proyecto... o simplemente abrirlo en otro navegador.
- [Eliminar cookies](https://stackoverflow.com/questions/56537958/phpmyadmin-is-suddenly-showing-errors/56538632)
- [(x) Se detectaron algunos errores en el servidor](https://stackoverflow.com/questions/27370372/phpmyadmin-pop-up-error-notice-keeps-appearing-when-clicking-on-columns-of-datab)

- [Mostrar user logueado](https://es.stackoverflow.com/questions/160151/c%C3%B3mo-obtener-los-datos-del-usuario-logueado-con-laravel-auth)

- [Personalizar Login](https://dev.to/kingsconsult/customize-laravel-auth-laravel-breeze-registration-and-login-1769)

Traducir mensajes error English/Spanish
- [Tutorial](https://www.youtube.com/watch?v=SWg4A7SsRkU)
- [Repositorio](https://github.com/Laraveles/spanish)

Agregar ultima vez conectado y cambiado zona horaria.
- [Tutorial](https://www.youtube.com/watch?v=v4IRYiylQPs)
- [SOF](https://stackoverflow.com/questions/43539332/incorrect-time-returned-in-laravel)