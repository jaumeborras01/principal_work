# Dockerfiles & Docker-Compose

Existe dos archivos para el dockercompose:
* Dockerfile
* docker-compose

## Dockerfile 
***
Es un archivo de texto plano que describe que hay dentro de la imagen, como se crean los contenedores y como deberían montarse.
Con el archivo Dockerfile y el comando ``docker build ['nombre'] [patharchivo]`` podemos indicar como construir el contenedor con una serie de ordenes. Construimos un container de ubuntu pero actualizado:

```Dockerfile
#Le decimos que imagen utilizar (si no esta descargada se hace pull automaticamente)
FROM ubuntu:16.04
#Ahora le indicamos los comandos necesarios propios del sistema
RUN apt-get update
RUN apt-get upgrade
#Le decimos que abra un puerto para conectarnos al bash del contenedor a través de ssh
EXPOSE 22
```

`ADD ['fuente'] ['destino'] ` -> copia los archivos a un destino dentro del contenedor. 

`ADD ./user.sql /var/etc/dept`

`MAINTAINER [nombre] ['correo']` -> Indica el nombre del autor del dockerfile.

`ENV ['llave'] ['valor']` -> Define variables de entorno para nuestro contenedor 

`ENV workdirectory /usr/node`

`CMD ['Parametro1', Parametro2]` -> Ejecuta un comando dentro de la shell del contenedor se ha inicializado. 

`CMD apt-get update && apt-get upgrade -y`

`VOLUME ['path']` -> Crea o monta un volumen dentro del contenedor

## Docker-compose
***
Te permite arrancar, combinar y configurar diferentes contenedores a la vez con un solo proceso. 
Por ejemplo si quieres montar un servidor xampp que requiere de php, mysql y apache2, con un solo archivo de configuración puedes arrancar los tres servicios con la configuración deseada sin ir ejecutando comandos uno a uno transformandolo a una manera inteligible para las personas.

Para levantar nuestro **Docker Compose** utilizaremos el siguiente comando -> ``docker-compose up ['path del directorio']`` 

El archivo de configuracion siempre tendrá el nombre de docker-compose.yml con la extensión yml para que lo detecte automaticamente y funcione sin problemas.

```yaml
#indica la version del compose, revisa la compatibilidad con la version de docker
version: '3'
#abre la lista de servicios o contenedores que manejara el archivo
services:
    #nombre del contenedor
    db:
        #indicamos la imagen (sin o con pull)
        image: mysql:5.7
        #listamos el volumen a crear
        volumes:
        - db_data:/var/lib/mysql
        #en caso de error del funcionamento del contenedor podemos indicar cuando tiene que reiniciar
        restart: always
        #indicamos variables de entorno necesarias
        environment:
        MYSQL_ROOT_PASSWORD: Unpirataen3Barcos
        MYSQL_DATABASE: concesonario
        MYSQL_USER: secretario
        MYSQL_PASSWORD: 1FragataenVela
    
    concesonario:
        #indicamos que se ejecute despues de finalizar el contenedor listado
        depends_on:
        - db
        #podemos indicar el directorio del Dockerfile para el contenedor
        build: ./service/db/concesonario
        #indicamos que puertos habilitar para el contenedor en la red (exterior:interior)
        ports:
        - "8000:80"
        - "3306:3306"
        restart: always
        CONCESONARIO_DB_HOST: db:3306
        CONCESONARIO_DB_USER: secretario
        CONCESONARIO_DB_PASSWORD: concesonario
        CONCESONARIO_DB_NAME: 1FragataenVela

#declaras los volumenes 
volumes:
    db_data: {}

```


## Sources

Para más informacion puedes consultar las siguientes referencias:

* <https://devtutorial.io/how-to-build-a-docker-compose-yaml-files.html>

* <https://openwebinars.net/blog/que-es-dockerfile/>

* <https://www.fosstechnix.com/dockerfile-instructions/>

* <https://docs.divio.com/en/latest/reference/docker-dockerfile/>

* <https://stackoverflow.com/questions/44450265/what-is-a-docker-compose-yml-file?answertab=votes#tab-top>

* <https://docs.divio.com/en/latest/reference/docker-docker-compose/>

* <https://docs.docker.com/compose/compose-file/compose-file-v3/>