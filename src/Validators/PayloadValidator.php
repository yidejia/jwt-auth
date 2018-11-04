<?php

/*
 * This file is part of jwt-auth.
 *
 * (c) Sean Tymon <tymon148@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Tymon\JWTAuth\Validators;

use Tymon\JWTAuth\Claims\Collection;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;

class PayloadValidator extends Validator
{
    /**
     * The required claims.
     *
     * @var array
     */
    protected $requiredClaims = [
        'iss',
        'iat',
        'exp',
        'nbf',
        'sub',
        'jti',
    ];

    /**
<<<<<<< HEAD
     * The refresh TTL.
     *
=======
>>>>>>> 614ee3410a1cc18ef13c8d5ffd491b5608afabd8
     * @var int
     */
    protected $refreshTTL = 20160;

    /**
     * Run the validations on the payload array.
     *
     * @param  \Tymon\JWTAuth\Claims\Collection  $value
     *
     * @return \Tymon\JWTAuth\Claims\Collection
     */
    public function check($value)
    {
        $this->validateStructure($value);

        return $this->refreshFlow ? $this->validateRefresh($value) : $this->validatePayload($value);
    }

    /**
     * Ensure the payload contains the required claims and
     * the claims have the relevant type.
<<<<<<< HEAD
     *
     * @param  \Tymon\JWTAuth\Claims\Collection  $claims
=======
>>>>>>> 614ee3410a1cc18ef13c8d5ffd491b5608afabd8
     *
     * @throws \Tymon\JWTAuth\Exceptions\TokenInvalidException
     *
     * @return void
     */
    protected function validateStructure(Collection $claims)
    {
<<<<<<< HEAD
        if ($this->requiredClaims && ! $claims->hasAllClaims($this->requiredClaims)) {
=======
        if (count(array_diff($this->requiredClaims, array_keys($payload))) !== 0) {
>>>>>>> 614ee3410a1cc18ef13c8d5ffd491b5608afabd8
            throw new TokenInvalidException('JWT payload does not contain the required claims');
        }
    }

    /**
     * Validate the payload timestamps.
<<<<<<< HEAD
     *
     * @param  \Tymon\JWTAuth\Claims\Collection  $claims
=======
>>>>>>> 614ee3410a1cc18ef13c8d5ffd491b5608afabd8
     *
     * @throws \Tymon\JWTAuth\Exceptions\TokenExpiredException
     * @throws \Tymon\JWTAuth\Exceptions\TokenInvalidException
<<<<<<< HEAD
     *
     * @return \Tymon\JWTAuth\Claims\Collection
=======
     * @return bool
>>>>>>> 614ee3410a1cc18ef13c8d5ffd491b5608afabd8
     */
    protected function validatePayload(Collection $claims)
    {
        return $claims->validate('payload');
    }

    /**
     * Check the token in the refresh flow context.
<<<<<<< HEAD
     *
     * @param  \Tymon\JWTAuth\Claims\Collection  $claims
=======
>>>>>>> 614ee3410a1cc18ef13c8d5ffd491b5608afabd8
     *
     * @throws \Tymon\JWTAuth\Exceptions\TokenExpiredException
     *
     * @return \Tymon\JWTAuth\Claims\Collection
     */
    protected function validateRefresh(Collection $claims)
    {
<<<<<<< HEAD
        return $this->refreshTTL === null ? $claims : $claims->validate('refresh', $this->refreshTTL);
=======
        if (isset($payload['iat']) && Utils::timestamp($payload['iat'])->addMinutes($this->refreshTTL)->isPast()) {
            throw new TokenExpiredException('Token has expired and can no longer be refreshed', 400);
        }

        return true;
>>>>>>> 614ee3410a1cc18ef13c8d5ffd491b5608afabd8
    }

    /**
     * Set the required claims.
<<<<<<< HEAD
     *
     * @param  array  $claims
=======
>>>>>>> 614ee3410a1cc18ef13c8d5ffd491b5608afabd8
     *
     * @return $this
     */
    public function setRequiredClaims(array $claims)
    {
        $this->requiredClaims = $claims;

        return $this;
    }

    /**
     * Set the refresh ttl.
<<<<<<< HEAD
     *
     * @param  int  $ttl
     *
     * @return $this
=======
     *
     * @param int  $ttl
>>>>>>> 614ee3410a1cc18ef13c8d5ffd491b5608afabd8
     */
    public function setRefreshTTL($ttl)
    {
        $this->refreshTTL = $ttl;

        return $this;
    }
}
