<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>


## Cafetería Laravel 9

Aplicación para la gestión de inventario de productos de una cafetería, incluye sistemas de registro de usuario, sección que lista los productos, edición, eliminación,  módulo de venta de producto, el cual resta la cantidad del producto en el stock y suma la cantidad de productos vendidos.

##  Consideraciones para ejecutar el proyecto

- El proyecto incluye sail Docker.

- Después de clonar el proyecto de GitHub, ejecutar: 
docker run --rm --interactive --tty -v $(pwd):/app composer install
o revisar la documentación oficial de Laravel: 
https://laravel.com/docs/9.x/sail#executing-node-npm-commands

- Instalar npm:
./vendor/bin/sail npm install

- Editar artivo .env.example por .env con nombre de la base datos y clave.
nombre db: cafeteria 
usuario: sail
clave: password

- Generar clave:
./vendor/bin/sail artisan key:generate

- Ejecutar proyecto:
./vendor/bin/sail up -d

- Ejecutar vite para que sean procesados los estilos:
./vendor/bin/sail npm run dev

- Copiar en el navegador localhost
