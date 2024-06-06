Pasos para la instalacion
1. Copiar el repositorio de github
2. Si usa git  abrir una terminal de git en la carpeta www y usar los comandos git init seguido de git clone https://github.com/P2weylermaximiliano/LarvelDom.git o descargarlo directamente 
3. Copiar la carpeta .env.example y renombrarla .env 
4. Configurar la base de datos con el nombre que prefiera 
5. Usando una terminal ejecutar el comando composer install
6. Correr el comando php artisan key:generate --ansi
7. Correr las migraciones con el comando php artisan migrate
8. Usar el comando para instalar npm con npm install 
9. Correr npm con el comando npm run dev
10. en una consola aparte usar el comando php artisan serve

extra
para poner asistencia se necesita ir a asistencia y buscar al alumno por su dni y ahi colocar la assistencia
para poder acceder a la informacion de los logueos se necesita crear a mano en la BD la fila y en donde dice nombre poner admin
para el tema de las condiciones solamente se puede ingresar el dia y para elegir si esta promocional o regular hay qeu ponerlo directamente en apiiController
en caso de que no funcione poner los dias como parametros ingresar de manera manual el primer parametro con id 1 luego deberia funcionar correctamente 
en el archivo cosas.txt tengo varios comandos que utilise para administrar la BD   