- Для запуска приложения вам нужно зайти в директорию docker через командную строку прописать следующую команду: "docker compose up -d --build".

- Внутри контейнера PHP нужно запустить миграцию: "php bin/console doctrine:migrations:migrate"
