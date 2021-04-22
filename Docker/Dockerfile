FROM ubuntu:16.04

#Dependencies
RUN apt-get update && apt-get -y upgrade
RUN apt-get install -y wget
#PHP 7
RUN wget https://www.apachefriends.org/xampp-files/7.2.2/xampp-linux-x64-7.2.2-0-installer.run
#Dar permisos ejecutable
RUN chmod +x xampp-linux-x64-7.2.2-0-installer.run
RUN ./xampp-linux-x64-7.2.2-0-installer.run

#Enable Docker Port
EXPOSE 80
