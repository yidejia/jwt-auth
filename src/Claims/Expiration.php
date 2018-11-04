<?php

/*
 * This file is part of jwt-auth.
 *
 * (c) Sean Tymon <tymon148@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Tymon\JWTAuth\Claims;

use Tymon\JWTAuth\Exceptions\TokenExpiredException;

class Expiration extends Claim
{
    use DatetimeTrait;

    /**
<<<<<<< HEAD
     * {@inheritdoc}
=======
     * The claim name.
     *
     * @var string
>>>>>>> 614ee3410a1cc18ef13c8d5ffd491b5608afabd8
     */
    protected $name = 'exp';

    /**
<<<<<<< HEAD
     * {@inheritdoc}
=======
     * Validate the expiry claim.
     *
     * @param  mixed  $value
     * @return bool
>>>>>>> 614ee3410a1cc18ef13c8d5ffd491b5608afabd8
     */
    public function validatePayload()
    {
        if ($this->isPast($this->getValue())) {
            throw new TokenExpiredException('Token has expired');
        }
    }
}
