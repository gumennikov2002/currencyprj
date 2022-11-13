#  Конвертер валют

## Установка:
1. Склонируйте репозиторий
2. В корне проекта запустить Docker контейнер    
`docker-compose up -d --build`  

3. Открыть контейнер  
`docker exec -it php bash`  

4. Запустить установку composer пакетов   
`composer install`

5. Файл `app/.env.example` переименовать в `.env`
6. В корне проекта запустить установку composer пакетов 
7. Запустить миграции   
`php artisan migrate`
8. Запустить загрузку курсов валют   
`php artisan schedule:run`
9. Проверить приложение по url
`localhost:8010`