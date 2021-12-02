<?php

namespace Tests\Unit\Exceptions;

use App\Exceptions\Handler;
use Exception;
use Illuminate\Container\Container;
use Mockery;
use Neomerx\JsonApi\Exceptions\JsonApiException;
use Neomerx\JsonApi\Document\Error;
use Tests\TestCase;

class HandlerTest extends TestCase
{
    public function testReturnsJsonApiException()
    {
        $container = new Container;
        $handler = new Handler($container);
        $request = Mockery::mock(stdClass::class);
        $request->shouldReceive('getAcceptableContentTypes')->andReturn(['application/vnd.api+json']);
        $response = $handler->render($request, new Exception('My custom error message'));
        $this->assertEquals($response->headers->get('Content-Type'), 'application/vnd.api+json');
    }

    public function testReturnsJsonException()
    {
        $container = new Container;
        $handler = new Handler($container);
        $exception = new Exception();
        $request = Mockery::mock(stdClass::class);
        $request->shouldReceive('getAcceptableContentTypes')->andReturn([]);
        $request->shouldReceive('expectsJson')->andReturn(true);
        $response = $handler->render($request, $exception);
        $this->assertEquals($response->headers->get('Content-Type'), 'application/json');
    }

    public function testPreparesJsonApiException()
    {
        $container = new Container;
        $handler = new Handler($container);
        $error = new Error();
        $exception = new JsonApiException($error);
        $request = Mockery::mock(stdClass::class);
        $request->shouldReceive('getAcceptableContentTypes')->andReturn(['application/json']);
        $request->shouldReceive('expectsJson')->andReturn(true);
        $response = $handler->render($request, $exception);
        $this->assertEquals($response->headers->get('Content-Type'), 'application/json');
    }
}
