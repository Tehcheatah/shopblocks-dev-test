composer:
	 docker run --rm --interactive --tty \
      --volume $(shell pwd):/app \
      composer/composer install
setup:
	if [ ! -f .env ]; then cp .env.example .env; fi
	make composer
	make start
	make mysql-ready
	./vendor/bin/sail artisan migrate
	./vendor/bin/sail artisan key:generate
	./vendor/bin/sail npm install
	./vendor/bin/sail npx mix
start:
	./vendor/bin/sail up -d
mysql-ready:
	./vendor/bin/sail exec -T mysql bash -c 'until mysqladmin ping -h localhost --silent; do echo "Waiting for MySQL..."; sleep 1; done'
reset:
	./vendor/bin/sail down -v
	make setup
