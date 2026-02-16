<?php

namespace Cryonighter\HttpLogger\Handler;

class DefaultErrorHandler implements ErrorHandler
{
    public function prepareError(string $error): string
    {
        return $error;
    }
}
