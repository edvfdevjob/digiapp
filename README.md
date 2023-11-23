<p align="center"><a href="https://www.digi-api.com" target="_blank"><img src="https://www.digi-api.com/logo.png" width="400"></a></p>

# README

### Web
1.https://stingray-app-nhwqz.ondigitalocean.app/
2. Alojada en DigitalOcean.

## Pasos para Ejecutar Proyecto DigiApp Con Laravel y Livewire (LOCAL)

### Requisitos previos
1. Asegúrate de tener [Composer](https://getcomposer.org/) instalado.
2. Verifica que [Node.js](https://nodejs.org/) y [npm](https://www.npmjs.com/) estén instalados.

### Configuración Inicial
1. Clona este repositorio: git clone https://github.com/edvfdevjob/digiapp.git
2. Accede al directorio del proyecto: cd digiapp
3. Instala las dependencias de PHP: composer install
4. Copia el archivo de entorno: cp .env.example .env
5. Genera la clave de la aplicación: php artisan key:generate

### Configuración del Entorno (.env)
1. Abre el archivo .env en tu editor de texto favorito.
2. Configura la conexión a la base de datos (DB_CONNECTION, DB_HOST, DB_PORT, DB_DATABASE, DB_USERNAME, DB_PASSWORD).
3. Configura los datos de SMTP para el correo electrónico (MAIL_MAILER, MAIL_HOST, MAIL_PORT, MAIL_USERNAME, MAIL_PASSWORD, MAIL_ENCRYPTION).
NOTA: Los datos smtp los proporciono en un txt enviado al mismo correo de la entrega.

### Configuración de Livewire
1. Ejecuta el comando para publicar los assets de Livewire: php artisan livewire:publish --assets

### Migraciones y Seeders
1. Ejecuta las migraciones para crear las tablas de la base de datos: php artisan migrate

### Comandos para Ejecutar el Sistema
1. Inicia el servidor Laravel: php artisan serve
1. Inicia el servidor npm: npm run dev
2. Abre tu navegador y visita [http://127.0.0.1:8000](http://127.0.0.1:8000)

¡Listo! Ahora deberías tener el proyecto DigiApp ejecutándose localmente en tu máquina. ¡Disfruta de tus digimons!