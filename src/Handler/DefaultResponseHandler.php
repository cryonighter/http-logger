<?php

namespace Cryonighter\HttpLogger\Handler;

class DefaultResponseHandler implements ResponseHandler
{
    public function prepareVersion(string $protocolVersion): string
    {
        return $protocolVersion;
    }

    public function prepareCode(int $code): int
    {
        return $code;
    }

    public function prepareReason(string $reason): string
    {
        return $reason;
    }

    /**
     * @inheritDoc
     */
    public function prepareHeaders(array $headers): array
    {
        return $headers;
    }

    public function prepareBody(string $body): string
    {
        return $body;
    }

    public function prepareLoggedText(string $text): string
    {
        return $text;
    }
}
