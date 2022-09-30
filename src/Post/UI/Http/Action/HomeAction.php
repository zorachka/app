<?php

declare(strict_types=1);

namespace Project\Post\UI\Http\Action;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Zorachka\Framework\Http\Response\ResponseFactory;

final class HomeAction implements RequestHandlerInterface
{
    private ResponseFactory $responseFactory;

    public function __construct(ResponseFactory $responseFactory)
    {
        $this->responseFactory = $responseFactory;
    }

    /**
     * @inheritDoc
     */
    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        return $this->responseFactory->html('Hello, world!');
    }
}
