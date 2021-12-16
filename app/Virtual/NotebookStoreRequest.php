<?php

/**
 * @OA\Schema(
 *     type="object",
 *     title="Example storring request",
 *     description="Some simple request create as example",
 * )
 */
class NotebookStoreRequest
{
    /**
     * @OA\Property(
     *     title="Name Surname",
     *     description="Name surname storring",
     *     example="Mirzoev Daler",
     * )
     *
     * @var string
     */
    public $fio;

    /**
     * @OA\Property(
     *     title="Phone number",
     *     description="Phone number for storring",
     *     example="9256444480",
     * )
     *
     * @var int
     */
    public $phone_number;

    /**
     * @OA\Property(
     *     title="Email",
     *     description="Email for storring",
     *     example="mddevelop@yandex.ru",
     * )
     *
     * @var string
     */
    public $email;

    /**
     * @OA\Property(
     *     title="Birth date",
     *     description="Birthdate for storring",
     *     example="1992-03-10",
     * )
     *
     */
    public $birthdate;

    /**
     * @OA\Property(
     *     title="Image",
     *     description="Image for storring",
     *     example="example.jpg",
     * )
     *
     * @var string
     */
    public $image;
}
