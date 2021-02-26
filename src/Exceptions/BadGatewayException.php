<?php


namespace HalloVerden\BrregHttpClient\Exceptions;


use HalloVerden\HttpExceptions\Http\HttpException;
use Symfony\Component\HttpFoundation\Response;

class BadGatewayException extends HttpException {

  public function __construct($message = null, array $data = null, \Throwable $previous = null, array $headers = [], $code = 0) {
    parent::__construct(Response::HTTP_BAD_GATEWAY, $message, $data, $previous, $headers, $code);
  }

}
