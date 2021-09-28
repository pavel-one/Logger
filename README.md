## Описание
Logger

## Установка
1. Расшифровываем сертификаты `git-crypt unlock <path-to-crypt>`
2. Запускаем контейнер `make up`
3. Копируем конфигурацию `cp .env.example .env` и правим `DOCKER_USER` `DOCKER_UID` на свои (`id`)
4. Входим в контейнер `make exec`
5. Устанавливаем зависимости `npm install && composer install && npm run prod`
6. Генерируем ключ `php artisan key:generate`
7. Генерируем конфигурацию laravel-echo `laravel-echo-server init`
8. Копируем файл супервизора `sudo cp logger-supervisor.ini /etc/supervisor.d/logger.ini`
9. Обновляем supervisor и запускаем `supervisorctl reread && supervisorctl update && supervisorctl start all`
10. В hosts добавляем адрес `127.0.0.1 local-logger.pavel.one`
11. Переходим по [https://local-logger.pavel.one](https://local-logger.pavel.one)
