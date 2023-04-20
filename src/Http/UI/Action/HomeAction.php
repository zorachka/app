<?php

declare(strict_types=1);

namespace Project\Http\UI\Action;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Zorachka\Http\Response\ResponseFactory;

final class HomeAction implements RequestHandlerInterface
{
    private ResponseFactory $responseFactory;

    public function __construct(ResponseFactory $responseFactory)
    {
        $this->responseFactory = $responseFactory;
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        return $this->responseFactory::html('<h1>Hello, world!</h1>');
    }
}
