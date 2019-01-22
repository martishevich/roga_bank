#start docker container
up:
	sudo docker-compose up -d

#stop docker container
down:
	sudo docker-compose down

#login into docker container
login:
	sudo docker exec -it roga-php /bin/bash





	