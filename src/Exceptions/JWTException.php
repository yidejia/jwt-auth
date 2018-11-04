<?php

/*
 * This file is part of jwt-auth.
 *
 * (c) Sean Tymon <tymon148@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
<<<<<<< HEAD
=======

namespace Tymon\JWTAuth\Exceptions;

class JWTException extends \Exception
{
    /**
     * @var int
     */
    protected $statusCode = 500;

    /**
     * @param string  $message
     * @param int $statusCode
     */
    public function __construct($message = 'An error occurred', $statusCode = null)
    {
        parent::__construct($message);
>>>>>>> 614ee3410a1cc18ef13c8d5ffd491b5608afabd8

namespace Tymon\JWTAuth\Exceptions;

<<<<<<< HEAD
use Exception;
=======
    /**
     * @param int $statusCode
     */
    public function setStatusCode($statusCode)
    {
        $this->statusCode = $statusCode;
    }
>>>>>>> 614ee3410a1cc18ef13c8d5ffd491b5608afabd8

class JWTException extends Exception
{
    /**
<<<<<<< HEAD
     * {@inheritdoc}
=======
     * @return int the status code
>>>>>>> 614ee3410a1cc18ef13c8d5ffd491b5608afabd8
     */
    protected $message = 'An error occurred';
}
