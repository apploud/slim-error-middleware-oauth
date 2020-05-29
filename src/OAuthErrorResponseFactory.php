<?php

declare(strict_types = 1);

namespace Apploud\OAuthErrorMiddleware;

use Apploud\ErrorMiddleware\ErrorResponseFactory;
use InvalidArgumentException;
use League\OAuth2\Server\Exception\OAuthServerException;
use Psr\Http\Message\ResponseFactoryInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Throwable;

class OAuthErrorResponseFactory implements ErrorResponseFactory
{
	/** @var ResponseFactoryInterface */
	private $responseFactory;


	public function __construct(ResponseFactoryInterface $responseFactory)
	{
		$this->responseFactory = $responseFactory;
	}


	/**
	 * @phpcsSuppress SlevomatCodingStandard.Functions.UnusedParameter.UnusedParameter
	 */
	public function createResponse(Throwable $error, ServerRequestInterface $request): ResponseInterface
	{
		if ($error instanceof OAuthServerException) {
			return $error->generateHttpResponse($this->responseFactory->createResponse());
		}

		throw new InvalidArgumentException('Error must be instance of ' . OAuthServerException::class);
	}
}
