# COMMANDS:
#### delete ALL docker containers
docker system prune -a 

#### start composer
docker-compose up

####  start composer as demon
docker-compose up -d

#### login into php container
docker exec -it test-php /bin/bash

#### add color alias - ll
alias ll='ls -la --color=tty'

### simple start docker
docker system prune -a && docker-compose up -d

## docker files for local run
* mariadb // create after first run - delete to reset DB 
* docker-compose.yml
* Dockerfile

## Url / Links / Credentials 
* PhpMyAdmin [http://localhost:8080](http://localhost:8080) 
  * u: root
  * p: password `look file docker-compose.yml`

### Mysql Connect
* from local
    * host: localhost
* from container
    * host: test-mysql
* user: root
* pass: password `look file docker-compose.yml`

## docker version
```
$ docker version
Client:
 Version:           18.06.1-ce
 API version:       1.38
 Go version:        go1.10.3
 Git commit:        e68fc7a
 Built:             Tue Aug 21 17:24:51 2018
 OS/Arch:           linux/amd64
 Experimental:      false

Server:
 Engine:
  Version:          18.06.1-ce
  API version:      1.38 (minimum version 1.12)
  Go version:       go1.10.3
  Git commit:       e68fc7a
  Built:            Tue Aug 21 17:23:15 2018
  OS/Arch:          linux/amd64
  Experimental:     false
```
#NB! The first time start can take a very long time
