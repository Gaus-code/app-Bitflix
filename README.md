# Bitflix
многостраничный сайт для просмотра коллекции фильмов

## Entry point
скрипты с логикой используют функцию шаблонизатор для отрисовки содержимого
Точка входа находится в директории public, поэтому чтобы зайти с терминала PHPStorm нужно использовать команду:

php -S localhost:(циферки) -t public

## Folder Structure
* В директории views содержатся шаблоны всех необходимых страниц. Layout.php - Общий шаблон для всех страниц
* В директории public содержатся скрипты с логикой для отрисовки страниц, а так же все необходимые стили
* В директорию services вынесены функции для работы с данными, а также функция renderTemplate, отрисовывающая содержимое
* В директории install содержатся файлы для создания и очистки БД
* В корне проекта находятся boot.php(подключение всех необходимых файлов), config.php(файл конфигурации)
