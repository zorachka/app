<?php

declare(strict_types=1);

namespace Project\UI\Http\Action;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Zorachka\Framework\Environment\Environment;
use Zorachka\Framework\Http\Response\ResponseFactory;

final class HomeAction implements RequestHandlerInterface
{
    private ResponseFactory $responseFactory;
    private Environment $environment;

    public function __construct(ResponseFactory $responseFactory, Environment $environment)
    {
        $this->responseFactory = $responseFactory;
        $this->environment = $environment;
    }

    /**
     * @inheritDoc
     */
    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $env = $this->environment->get('APP_ENV');

        return $this->responseFactory->html('Hello, world! ' . $env);
    }
}
