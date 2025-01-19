<?php

namespace Cryonighter\HttpLogger;

use Cryonighter\HttpLogger\Formatter\PlainTextFormatter;
use Cryonighter\HttpLogger\Handler\DefaultRequestHandler;
use Cryonighter\HttpLogger\Handler\DefaultResponseHandler;
use Cryonighter\HttpLogger\Handler\RequestHandler;
use Cryonighter\HttpLogger\Handler\ResponseHandler;
use Cryonighter\HttpLogger\Formatter\FormatterInterface;
use Psr\Http\Message\UriInterface;

/**
 * The simplest implementation of the logger
 */
class StreamHttpLogger implements HttpLoggerInterface
{
    /**
     * @var resource
     */
    private $handle;

    /**
     * @var FormatterInterface
     */
    private $formatter;

    /**
     * @var RequestHandler
     */
    private $requestHandler;

    /**
     * @var ResponseHandler
     */
    private $responseHandler;

    /**
     * @param resource $handle
     */
    public function __construct($handle, FormatterInterface $formatter, RequestHandler $requestHandler, ResponseHandler $responseHandler)
    {
        $this->handle = $handle;
        $this->formatter = $formatter;
        $this->requestHandler = $requestHandler;
        $this->responseHandler = $responseHandler;
    }

    public static function create($handle = null, ?FormatterInterface $formatter = null, ?RequestHandler $requestHandler = null, ?ResponseHandler $responseHandler = null): self
    {
        return new self(
            $handle ?? STDOUT,
            $formatter ?? new PlainTextFormatter(),
            $requestHandler ?? new DefaultRequestHandler(),
            $responseHandler ?? new DefaultResponseHandler()
        );
    }

    /**
     * @param string[][] $headers
     */
    public function logRequest(string $protocolVersion, string $method, UriInterface $uri, array $headers = [], string $body = ''): void
    {
        fwrite(
            $this->handle,
            $this->requestHandler->prepareLoggedText(
                $this->formatter->formatRequest(
                    $this->requestHandler->prepareVersion($protocolVersion),
                    $this->requestHandler->prepareMethod($method),
                    $this->requestHandler->prepareUri($uri),
                    $this->requestHandler->prepareHeaders($headers),
                    $this->requestHandler->prepareBody($body)
                )
            )
        );
    }

    /**
     * @param string[][] $headers
     */
    public function logResponse(string $protocolVersion, int $code, string $reason, array $headers, string $body = ''): void
    {
        fwrite(
            $this->handle,
            $this->responseHandler->prepareLoggedText(
                $this->formatter->formatResponse(
                    $this->responseHandler->prepareVersion($protocolVersion),
                    $this->responseHandler->prepareCode($code),
                    $this->responseHandler->prepareReason($reason),
                    $this->responseHandler->prepareHeaders($headers),
                    $this->responseHandler->prepareBody($body)
                )
            )
        );
    }
}
