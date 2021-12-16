<h5 align="center">Laravel 7.3 & Swagger 3</h5><br>

<p align="center"><a href="https://swagger.io" target="_blank"><img src="https://static1.smartbear.co/swagger/media/assets/images/swagger_logo.svg" width="400"></a></p>


## Описание

Небольшой проект, где с помощью инструмента Swagger (удобный инструмент для создания документации API) можно будет посмотреть, создать, изменить и удалить запись.

## Как установить

После клонирование запустите:<br>

php artisan migrate <br>

Далее запускаем SEEDER имееться три записи для теста.<br>

php artisan db:seed<br>

Если возникнет ошибка необходимо запустить команду<br>

composer dump-autoload<br>

У нас таблица Notebook с данныит готово, теперь можно установить SWAGGER для создании API.<br>

composer require "darkaonline/l5-swagger"

Вы можете опубликовать конфигурацию L5-Swagger и просматривать файлы в своем проекте, запустив:<br>

php artisan vendor:publish --provider "L5Swagger\L5SwaggerServiceProvider"<br>
php artisan l5-swagger:generate<br>

Запускаем проект переходим на http://127.0.0.1:8000/api/documentation.
