<?php

namespace Cryonighter\HttpLogger\Handler;

interface ResponseHandler extends MessageHandler
{
    public function prepareCode(int $code): int;

    public function prepareReason(string $reason): string;
}
