<?php

trait ApiResponse
{
    public function successResponse($messages, $data, $statusCode = 200)
    {
        $this->response($messages, $data, $statusCode);
    }

    public function failedResponse($messages, $data, $statusCode)
    {
        $this->response($messages, $data, $statusCode, false);
    }

    public function response($messages, $data, $statusCode, $isSuccess = true)
    {
    }
}
