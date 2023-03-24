<?php

namespace Infusionsoft\Http;

use Psr\Log\LoggerInterface;
use Psr\Log\LoggerTrait;
use Stringable;

class ArrayLogger implements LoggerInterface
{
    use LoggerTrait;

    private array $logs = [];

    public function getLogs(){
        return $this->logs;
    }

    /**
     * Logs with an arbitrary level.
     *
     * @param mixed $level
     * @param Stringable|string $message
     * @param array $context
     * @return void
     */
    public function log($level, Stringable|string $message, array $context = array()): void
    {
        $this->logs[$level][] = [
            'message' => $message,
            'context' => $context
        ];
    }
}