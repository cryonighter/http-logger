<?php

namespace Cryonighter\HttpLogger\Handler;

use Psr\Http\Message\UriInterface;

class DefaultRequestHandler implements RequestHandler
{
    public function prepareVersion(string $protocolVersion): string
    {
        return $protocolVersion;
    }

    public function prepareMethod(string $method): string
    {
        return $method;
    }

    public function prepareUri(UriInterface $uri): UriInterface
    {
        return $uri;
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
