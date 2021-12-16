<?php
namespace App\Http\Controllers\API;

/**
 * @OA\Info(
 *     title="Laravel Swagger (FUTURE)",
 *     version="1.0.0",
 *     @OA\Contact(
 *         email="mddevelop@yandex.ru"
 *     )
 * )
 * @OA\Server(
 *     description="Laravel Swagger API server",
 *     url="http://127.0.0.1:8000/api/v1"
 * )
 * @OA\SecurityScheme(
 *     type="apiKey",
 *     in="header",
 *     name="X-APP-ID",
 *     securityScheme="X-APP-ID"
 * )
 */

class Controller extends \App\Http\Controllers\Controller
{
}
