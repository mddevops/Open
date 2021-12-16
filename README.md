<h1 align="center">Laravel 7.3 & Swagger 3</h1><br>

<p align="center"><a href="https://swagger.io" target="_blank"><img src="https://static1.smartbear.co/swagger/media/assets/images/swagger_logo.svg" width="400"></a></p>


## Описание

Небольшой проект, где с помощью инструмента Swagger (удобный инструмент для создания документации API) можно будет посмотреть, создать, изменить и удалить запись.

## Как установить

После клонирования запустите:<br>

composer install<br>

Вы всегда можете сгенерировать файл .env вручную, запустив:

cp .env.example .env <br>
php artisan key:generate <br>

Создаём базу указываем в .env названия database,user и password, далее запускаем миграцию<br> 

php artisan migrate <br>

Далее запускаем SEEDER, имееться три записи в БД для теста.<br>

php artisan db:seed<br>

У нас таблица Notebook с данными готово, запускаем проект переходим на http://127.0.0.1:8000/api/documentation

У меня возникла такая ошибка 

Failed to fetch.<br>
Possible Reasons:<br>

CORS<br>
Network Failure<br>
URL scheme must be "http" or "https" for CORS request.<br>

когда указал в Controller-е @OA\Server url="http://localhost/api/v1" для устронение ошибки прописал url="http://127.0.0.1:8000/api/v1"<br>

Путь: App\Http\Controllers\API\Controller
 * @OA\Server(
 *     description="Laravel Swagger API server",
 *     url="http://127.0.0.1:8000/api/v1"


## Тестирование

При работе с API использую программу Postman. Удобный и простой инструмент для теста.

Это мой первый опыт с SWAGGER-ом по этому добавление записи с изображением выдала ошибку. 
Протестировал в Postman-e, все работает. Если хотите изменить запись с изображением Выберите метод POST но в form-data добавьте KEY: _method VALUE:PUT, так как Метод Laravel PATCH и PUT не работает с form-data. <br>
![image](https://user-images.githubusercontent.com/91971089/146359469-567db039-8196-43b6-bfc3-d93d20542baa.png)


