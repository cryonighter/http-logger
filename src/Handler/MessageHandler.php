<?php

namespace Cryonighter\HttpLogger\Handler;

interface MessageHandler
{
    public function prepareVersion(string $protocolVersion): string;

    /**
     * @param string[][] $headers
     */
    public function prepareHeaders(array $headers): array;

    public function prepareBody(string $body): string;

    public function prepareLoggedText(string $text): string;
}
