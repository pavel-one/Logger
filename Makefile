up:
	docker-compose up -d
	@make ps
ps:
	docker-compose ps
down:
	docker-compose down
exec:
	docker-compose exec app zsh
exec.nginx:
	docker-compose exec nginx /bin/sh
exec.db:
	docker-compose exec db /bin/sh
redis:
	docker-compose exec redis redis-cli
