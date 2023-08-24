<?php

namespace App\Http\Annotations;

class OpenApiSpec
{
    /**
     * @OA\Info(
     *     version="1.0",
     *     title="Laravel API",
     *     description="A simple API that allows you to register and login a user",
     *     @OA\Contact(name="SabreSoftware"),
     * )
     */
    public function dummy()
    {
        // This is just a dummy method to hold the @OA\Info annotation.
    }
}
