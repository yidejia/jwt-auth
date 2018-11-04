<?php

/*
 * This file is part of jwt-auth.
 *
 * (c) Sean Tymon <tymon148@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Tymon\JWTAuth\Exceptions;

use Exception;
use Tymon\JWTAuth\Claims\Claim;

class InvalidClaimException extends JWTException
{
    /**
<<<<<<< HEAD
     * Constructor.
     *
     * @param  \Tymon\JWTAuth\Claims\Claim  $claim
     * @param  int  $code
     * @param  \Exception|null  $previous
     *
     * @return void
=======
     * @var int
>>>>>>> 614ee3410a1cc18ef13c8d5ffd491b5608afabd8
     */
    public function __construct(Claim $claim, $code = 0, Exception $previous = null)
    {
        parent::__construct('Invalid value provided for claim ['.$claim->getName().']', $code, $previous);
    }
}
