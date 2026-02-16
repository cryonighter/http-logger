<?php

namespace Cryonighter\HttpLogger\Handler;

interface ErrorHandler
{
    public function prepareError(string $error): string;
}
