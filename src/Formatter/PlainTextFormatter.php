<?php

namespace Cryonighter\HttpLogger\Formatter;

use Psr\Http\Message\UriInterface;

class PlainTextFormatter implements FormatterInterface
{
    /**
     * @var string
     */
    private $lineSeparator;

    public function __construct(string $lineSeparator = PHP_EOL)
    {
        $this->lineSeparator = $lineSeparator;
    }

    public function formatError(string $error): string
    {
        return $error;
    }

    /**
     * @param array | string[][] $headers
     */
    public function formatRequest(string $protocolVersion, string $method, UriInterface $url, array $headers = [], string $body = ''): string
    {
        $message = "$method {$this->preparePath($url->getPath())} HTTP/$protocolVersion{$this->lineSeparator}{$this->headersToString($headers)}{$this->lineSeparator}{$this->lineSeparator}";

        if (!empty($body)) {
            $message .= "$body{$this->lineSeparator}{$this->lineSeparator}";
        }

        return $message;
    }

    /**
     * @param array | string[][] $headers
     */
    public function formatResponse(string $protocolVersion, int $code, string $reason, array $headers, string $body = ''): string
    {
        $message = "HTTP/$protocolVersion $code $reason{$this->lineSeparator}{$this->headersToString($headers)}{$this->lineSeparator}{$this->lineSeparator}";

        if (!empty($body)) {
            $message .= "$body{$this->lineSeparator}{$this->lineSeparator}";
        }

        return $message;
    }

    /**
     * @param array | string[][] $headers
     */
    private function headersToString(array $headers): string
    {
        $result = [];

        foreach ($headers as $headerName => $headerValues) {
            $result[] = implode(
                $this->lineSeparator,
                array_map(
                    function (string $headerValue) use ($headerName): string {
                        return "$headerName: $headerValue";
                    },
                    $headerValues
                )
            );
        }

        return implode($this->lineSeparator, $result);
    }

    private function preparePath(?string $path): string
    {
        return empty($path) ? '/' : $path;
    }
}
