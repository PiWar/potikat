<?php

function resJson($statusText, $data, $status = 200)
{
    return response(

    )->json([
        "status" => $statusText,
        "data" => $data,
    ], $status);
}
