<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use LaravelJsonApi\Core\Exceptions\JsonApiException;
use LaravelJsonApi\Core\Document\Error;
use LaravelJsonApi\Exceptions\ExceptionParser;
use Throwable;

class Handler extends ExceptionHandler
{

    protected $dontReport = [
        JsonApiException::class,
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->renderable(ExceptionParser::make()->renderable());
    }

    public function render($request, Throwable $e)
    {
        if($e instanceof \UnexpectedValueException) {
            return Error::make()
            ->setStatus(422)
            ->setDetail($e->getMessage())
            ->prepareResponse($request);
        }
        return parent::render($request, $e);
    }

}
