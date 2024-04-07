<h1>Prueba Técnica Backend Developer para Nativapps</h1>

<p><b>Caso de uso:</b> aplicación de pacientes médicos.<br>
<b>Objetivo:</b> Desarrollar una API REST con PHP para la gestión de pacientes de un hospital, el
cual permitirá a los médicos del hospital realizar la búsqueda de un paciente, crear nuevos
pacientes y agregar diagnósticos a los pacientes.</p>

<h1>Instalación en servidor local</h1>

<ol>
<li>Descargar e instalar un servidor como <a href='https://laragon.org/download/index.html'>Laragon</a> o <a href='https://www.apachefriends.org/es/index.html'>XAMPP</a></li>
<li>Descargar codigo fuente de la aplicación.</li>
<li>Descomprimir codigo fuente en directorio de <b>HTDOCS</b> o <b>WWW</b>.</li>
<li>Crear base de datos en su manejador de base de datos favorito.</li>
<li>Configurar archivo .env con sus credenciales de base de datos entre otras</li>
<li>Abrir terminal en la carpeta del codigo fuente.</li>
<li>Correr migraciones con el siguiente comando: php artisan migrate</li>
<li>Generar datos de prueba para la base de datos con los siguientes comandos:</br>
<pre>
php artisan db:seed --class=PatientSeeder
php artisan db:seed --class=DiagnosesSeeder
php artisan db:seed --class=DiagnosePatientSeeder
</pre>
</li>
<li>Correr el servidor local con el siguiente comando: php artisan serve</li>
<li>Probar usando la documentación de la <a href="https://documenter.getpostman.com/view/13603269/2sA35MyJdm">api</a></li>
</ol>