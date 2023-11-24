<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Acerca del proyecto

# Frontend para Sistema de Gestión de Clínica - Proyecto Laravel

Este es un proyecto frontend para un sistema de gestión de una clínica desarrollado utilizando Laravel y Bootstrap.

## Requisitos Previos

- PHP 7.4 o superior instalado: [PHP Downloads](https://www.php.net/downloads.php)
- Composer instalado: [Composer Installation](https://getcomposer.org/download/)
- Node.js y npm instalados: [Node.js Downloads](https://nodejs.org/)
- Laravel CLI instalado: [Laravel Installation](https://laravel.com/docs/8.x/installation)

## Configuración del Proyecto

1. Clona el repositorio:

    ```bash
    git clone https://github.com/tu-usuario/tu-proyecto-frontend-clinica.git
    cd tu-proyecto-frontend-clinica
    ```

2. Instala las dependencias:

    ```bash
    composer install
    npm install
    ```

3. Configura el archivo de entorno `.env` con los detalles de tu aplicación.

4. Genera la clave de la aplicación:

    ```bash
    php artisan key:generate
    ```

5. Compila los assets:

    ```bash
    npm run dev
    ```

6. Inicia el servidor de desarrollo:

    ```bash
    php artisan serve
    ```

   La aplicación estará disponible en [http://localhost:8000](http://localhost:8000).

## Estructura del Proyecto

- `resources/views`: Contiene las vistas Blade de Laravel.
- `public/css` y `public/js`: Contiene los archivos CSS y JavaScript compilados.

## Tecnologías Utilizadas

- Laravel
- Bootstrap
- Vue.js (opcional, dependiendo de las necesidades)

## Funcionalidades

- Interfaz de usuario para la gestión de pacientes, médicos, citas, etc.
- Integración con la API REST del backend.
- ...

## Contribuciones

¡Contribuciones son bienvenidas! Si encuentras errores o mejoras, por favor crea un issue o envía un pull request.

## Licencia

Este proyecto está licenciado bajo la Licencia MIT - ver el archivo [LICENSE.md](LICENSE.md) para más detalles.
