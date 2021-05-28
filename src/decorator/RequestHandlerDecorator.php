<?php

namespace Bermuda\MiddlewareFactory\Decorator;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Psr\Http\Message\ServerRequestInterface;

/**
 * Class RequestHandlerDecorator
 * @package Bermuda\MiddlewareFactory\Decorator
 */
class RequestHandlerDecorator implements RequestHandlerInterface, MiddlewareInterface
{
    private RequestHandlerInterface $handler;

    public function __construct(RequestHandlerInterface $handler)
    {
        $this->handler = $handler;
    }

    /**
     * @inheritDoc
     */
    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        return $this->handler->handle($request);
    }

    /**
     * @inheritDoc
     */
    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        return $this->handler->handle($request);
    }
}
