<?php

/*
 * This file is part of the Symfony package.
 *
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Songshenzong\ResponseJson\Exception;

use Exception;
use Symfony\Component\HttpKernel\Exception\HttpExceptionInterface;

class HttpException extends \RuntimeException implements HttpExceptionInterface
{

    /**
     * MessageBag errors.
     *
     * @var \Illuminate\Support\MessageBag
     */
    private   $httpStatusCode;
    private   $statusCode;
    protected $errors;
    private   $headers;

    public function __construct($httpStatusCode, $statusCode, $message = null, $errors = null, Exception $previous = null, $headers = [], $code = 0)
    {


        $this -> httpStatusCode = $httpStatusCode;
        $this -> statusCode     = $statusCode;
        $this -> errors         = $errors;
        $this -> headers        = $headers;


        parent ::__construct($message, $code, $previous);
    }


    public function getHttpStatusCode()
    {
        return $this -> httpStatusCode;
    }

    public function getStatusCode()
    {
        // if (!$this -> httpStatusCode) {
        //     return $this -> statusCode;
        // }
        // if ($this -> httpStatusCode != $this -> statusCode) {
        //     return $this -> httpStatusCode;
        // }
        return $this -> statusCode;
    }

    // public function getOriginalStatusCode()
    // {
    //     return $this -> statusCode;
    // }

    public function getErrors()
    {
        return $this -> errors;
    }


    public function getHeaders()
    {
        return $this -> headers;
    }


    public function hasErrors()
    {
        return !empty($this -> errors);
    }
}
