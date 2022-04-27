<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Symfony\Component\HttpFoundation\Response;

class RequestErrorStub extends FormRequest
{
    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(resJson(
            "validation error",
            ["errors" => $validator->errors()],
            Response::HTTP_CONFLICT));
    }
}
