
# Router

Este proyecto es una versión mía sobre un router hecho en php sin frameworks.

Esta aplicado con OOP.

Pero para las rutas podemos usar tanto un modelo funcional o métodos estáticos de una clase.

Sirve para aplicar friendlyUrls, es decir, no tener que ver en nuestras url "index.php" por ejemplo.



### ¿Que usé?🤔

✅ Servidor
    
    PHP

✅ CSS:

    Bootstrap

### Hay cosas por mejorar 😅

Seguro hay cositas que iré mejorando, dependiendo bugs que vaya encontrando o mejores formas de optimizar el código.

🖥️ Está pensado para un host, asique les dejo la forma de crear un host virtual, esto para no usar la carpeta de xampp

    Si no quieres hacer esto abría que modificar un poco la URI en el router para sacar la parte de tu carpeta de htdocs.

## Host virtual xampp

➡️ Abrir bloc de notas como administrador

➡️ Buscar carpeta: C:\Windows\System32\drivers\etc

➡️ Todos los archivos

➡️ Agregar nuestro host

    127.0.0.1 web.test  
    Poner .test, otro puede entrar en conflicto si ponemos .com,.net,etc.

➡️ Ir a la carpeta: C:\xampp\apache\conf\extra

➡️ Buscar archivo:  httpd-vhosts.conf

➡️ Agregar

    Siempre poner para que podamos acceder a localhost
    <VirtualHost *:80>
        DocumentRoot "C:/xampp/htdocs"
        ServerName localhost
    </VirtualHost>
    
➡️ Aca va nuestra ruta de nuestro proyecto

    <VirtualHost *:80>
        DocumentRoot "C:/xampp/htdocs/carpetas"
        ServerName web.test
    </VirtualHost> 

➡️ Parar y encender el servicio de apache en xampp
