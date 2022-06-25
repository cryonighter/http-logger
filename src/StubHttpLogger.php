<?php

namespace Cryonighter\HttpLogger;

use Psr\Http\Message\UriInterface;

class StubHttpLogger implements HttpLoggerInterface
{
    /**
     * @param string[][] $headers
     */
    public function logRequest(string $protocolVersion, string $method, UriInterface $uri, array $headers = [], string $body = ''): void
    {
        // stub
    }

    /**
     * @param string[][] $headers
     */
    public function logResponse(string $protocolVersion, int $code, string $reason, array $headers, string $body = ''): void
    {
        // stub
    }
}
