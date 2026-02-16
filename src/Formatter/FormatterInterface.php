<?php

namespace Cryonighter\HttpLogger\Formatter;

use Psr\Http\Message\UriInterface;

interface FormatterInterface
{
    public function formatError(string $error): string;

    /**
     * @param array | string[][] $headers
     */
    public function formatRequest(string $protocolVersion, string $method, UriInterface $url, array $headers = [], string $body = ''): string;

    /**
     * @param array | string[][] $headers
     */
    public function formatResponse(string $protocolVersion, int $code, string $reason, array $headers, string $body = ''): string;
}
