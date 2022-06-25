<?php

namespace Cryonighter\HttpLogger\Handler;

use Psr\Http\Message\UriInterface;

interface RequestHandler extends MessageHandler
{
    public function prepareMethod(string $method): string;

    public function prepareUri(UriInterface $uri): UriInterface;
}
