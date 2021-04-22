# Docker-Compose

## Intro
***

Existe dos archivos para el dockercompose:
* Dockerfile
* dockercompose.yml

#### Dockerfile
***
Es un archivo de texto plano que describe que hay dentro de la imagen, como se crean los contenedores y como deberían montarse.

#### Docker-compose.yml
***
Es un archivo de configuracion para docker-compose. Te permite arrancar, combinar y configurar diferentes contenedores a la vez con un solo proceso.

## Dockerfile 
***
Con el archivo Dockerfile podemos indicar como construir el contenedor con una serie de ordenes. Construimos un container de ubuntu pero actualizado;

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

#### Source

<https://devtutorial.io/how-to-build-a-docker-compose-yaml-files.html>
<https://openwebinars.net/blog/que-es-dockerfile/>
<https://www.fosstechnix.com/dockerfile-instructions/>
<https://docs.divio.com/en/latest/reference/docker-dockerfile/>
<https://stackoverflow.com/questions/44450265/what-is-a-docker-compose-yml-file?answertab=votes#tab-top>
<https://docs.divio.com/en/latest/reference/docker-docker-compose/>