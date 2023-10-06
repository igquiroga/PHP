# Host virtual xampp

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
