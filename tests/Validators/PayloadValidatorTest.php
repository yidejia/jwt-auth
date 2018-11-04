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
namespace Tymon\JWTAuth\Test\Validators;

use Tymon\JWTAuth\Claims\JwtId;
use Tymon\JWTAuth\Claims\Issuer;
use Tymon\JWTAuth\Claims\Subject;
use Tymon\JWTAuth\Claims\IssuedAt;
use Tymon\JWTAuth\Claims\NotBefore;
use Tymon\JWTAuth\Claims\Collection;
use Tymon\JWTAuth\Claims\Expiration;
use Tymon\JWTAuth\Test\AbstractTestCase;
=======
namespace Tymon\JWTAuth\Test;

use Carbon\Carbon;
>>>>>>> 614ee3410a1cc18ef13c8d5ffd491b5608afabd8
use Tymon\JWTAuth\Validators\PayloadValidator;

class PayloadValidatorTest extends AbstractTestCase
{
    /**
     * @var \Tymon\JWTAuth\Validators\PayloadValidator
     */
    protected $validator;

    public function setUp()
    {
<<<<<<< HEAD
        parent::setUp();

        $this->validator = new PayloadValidator;
=======
        Carbon::setTestNow(Carbon::createFromTimeStampUTC(123));
        $this->validator = new PayloadValidator();
>>>>>>> 614ee3410a1cc18ef13c8d5ffd491b5608afabd8
    }

    /** @test */
    public function it_should_return_true_when_providing_a_valid_payload()
    {
<<<<<<< HEAD
        $claims = [
            new Subject(1),
            new Issuer('http://example.com'),
            new Expiration($this->testNowTimestamp + 3600),
            new NotBefore($this->testNowTimestamp),
            new IssuedAt($this->testNowTimestamp),
            new JwtId('foo'),
=======
        $payload = [
            'iss' => 'http://example.com',
            'iat' => 100,
            'nbf' => 100,
            'exp' => 100 + 3600,
            'sub' => 1,
            'jti' => 'foo',
>>>>>>> 614ee3410a1cc18ef13c8d5ffd491b5608afabd8
        ];

        $collection = Collection::make($claims);

        $this->assertTrue($this->validator->isValid($collection));
    }

    /**
     * @test
     * @expectedException \Tymon\JWTAuth\Exceptions\TokenExpiredException
     * @expectedExceptionMessage Token has expired
     */
    public function it_should_throw_an_exception_when_providing_an_expired_payload()
    {
<<<<<<< HEAD
        $claims = [
            new Subject(1),
            new Issuer('http://example.com'),
            new Expiration($this->testNowTimestamp - 1440),
            new NotBefore($this->testNowTimestamp - 3660),
            new IssuedAt($this->testNowTimestamp - 3660),
            new JwtId('foo'),
=======
        $this->setExpectedException('Tymon\JWTAuth\Exceptions\TokenExpiredException');

        $payload = [
            'iss' => 'http://example.com',
            'iat' => 20,
            'nbf' => 20,
            'exp' => 120,
            'sub' => 1,
            'jti' => 'foo',
>>>>>>> 614ee3410a1cc18ef13c8d5ffd491b5608afabd8
        ];

        $collection = Collection::make($claims);

        $this->validator->check($collection);
    }

    /**
     * @test
     * @expectedException \Tymon\JWTAuth\Exceptions\TokenInvalidException
     * @expectedExceptionMessage Not Before (nbf) timestamp cannot be in the future
     */
    public function it_should_throw_an_exception_when_providing_an_invalid_nbf_claim()
    {
<<<<<<< HEAD
        $claims = [
            new Subject(1),
            new Issuer('http://example.com'),
            new Expiration($this->testNowTimestamp + 1440),
            new NotBefore($this->testNowTimestamp + 3660),
            new IssuedAt($this->testNowTimestamp - 3660),
            new JwtId('foo'),
=======
        $this->setExpectedException('Tymon\JWTAuth\Exceptions\TokenInvalidException');

        $payload = [
            'iss' => 'http://example.com',
            'iat' => 100,
            'nbf' => 150,
            'exp' => 150 + 3600,
            'sub' => 1,
            'jti' => 'foo',
>>>>>>> 614ee3410a1cc18ef13c8d5ffd491b5608afabd8
        ];

        $collection = Collection::make($claims);

        $this->validator->check($collection);
    }

    /**
     * @test
     * @expectedException \Tymon\JWTAuth\Exceptions\InvalidClaimException
     * @expectedExceptionMessage Invalid value provided for claim [iat]
     */
    public function it_should_throw_an_exception_when_providing_an_invalid_iat_claim()
    {
<<<<<<< HEAD
        $claims = [
            new Subject(1),
            new Issuer('http://example.com'),
            new Expiration($this->testNowTimestamp + 1440),
            new NotBefore($this->testNowTimestamp - 3660),
            new IssuedAt($this->testNowTimestamp + 3660),
            new JwtId('foo'),
=======
        $this->setExpectedException('Tymon\JWTAuth\Exceptions\TokenInvalidException');

        $payload = [
            'iss' => 'http://example.com',
            'iat' => 150,
            'nbf' => 100,
            'exp' => 150 + 3600,
            'sub' => 1,
            'jti' => 'foo',
>>>>>>> 614ee3410a1cc18ef13c8d5ffd491b5608afabd8
        ];

        $collection = Collection::make($claims);

        $this->validator->check($collection);
    }

    /**
     * @test
     * @expectedException \Tymon\JWTAuth\Exceptions\TokenInvalidException
     * @expectedExceptionMessage JWT payload does not contain the required claims
     */
    public function it_should_throw_an_exception_when_providing_an_invalid_payload()
    {
        $claims = [
            new Subject(1),
            new Issuer('http://example.com'),
        ];

        $collection = Collection::make($claims);

        $this->validator->check($collection);
    }

<<<<<<< HEAD
    /**
     * @test
     * @expectedException \Tymon\JWTAuth\Exceptions\InvalidClaimException
     * @expectedExceptionMessage Invalid value provided for claim [exp]
     */
    public function it_should_throw_an_exception_when_providing_an_invalid_expiry()
    {
        $claims = [
            new Subject(1),
            new Issuer('http://example.com'),
            new Expiration('foo'),
            new NotBefore($this->testNowTimestamp - 3660),
            new IssuedAt($this->testNowTimestamp + 3660),
            new JwtId('foo'),
=======
        $payload = [
            'iss' => 'http://example.com',
            'sub' => 1,
>>>>>>> 614ee3410a1cc18ef13c8d5ffd491b5608afabd8
        ];

        $collection = Collection::make($claims);

        $this->validator->check($collection);
    }

    /** @test */
    public function it_should_set_the_required_claims()
    {
        $claims = [
            new Subject(1),
            new Issuer('http://example.com'),
        ];

        $collection = Collection::make($claims);

        $this->assertTrue($this->validator->setRequiredClaims(['iss', 'sub'])->isValid($collection));
    }

    /** @test */
    public function it_should_check_the_token_in_the_refresh_context()
    {
        $claims = [
            new Subject(1),
            new Issuer('http://example.com'),
            new Expiration($this->testNowTimestamp - 1000),
            new NotBefore($this->testNowTimestamp),
            new IssuedAt($this->testNowTimestamp - 2600), // this is LESS than the refresh ttl at 1 hour
            new JwtId('foo'),
        ];

        $collection = Collection::make($claims);

        $this->assertTrue(
            $this->validator->setRefreshFlow()->setRefreshTTL(60)->isValid($collection)
        );
    }

    /** @test */
    public function it_should_return_true_if_the_refresh_ttl_is_null()
    {
        $claims = [
            new Subject(1),
            new Issuer('http://example.com'),
            new Expiration($this->testNowTimestamp - 1000),
            new NotBefore($this->testNowTimestamp),
            new IssuedAt($this->testNowTimestamp - 2600), // this is LESS than the refresh ttl at 1 hour
            new JwtId('foo'),
        ];

        $collection = Collection::make($claims);

        $this->assertTrue(
            $this->validator->setRefreshFlow()->setRefreshTTL(null)->isValid($collection)
        );
    }

    /**
     * @test
     * @expectedException \Tymon\JWTAuth\Exceptions\TokenExpiredException
     * @expectedExceptionMessage Token has expired and can no longer be refreshed
     */
    public function it_should_throw_an_exception_if_the_token_cannot_be_refreshed()
    {
<<<<<<< HEAD
        $claims = [
            new Subject(1),
            new Issuer('http://example.com'),
            new Expiration($this->testNowTimestamp),
            new NotBefore($this->testNowTimestamp),
            new IssuedAt($this->testNowTimestamp - 5000), // this is MORE than the refresh ttl at 1 hour, so is invalid
            new JwtId('foo'),
=======
        $this->setExpectedException('Tymon\JWTAuth\Exceptions\TokenInvalidException');

        $payload = [
            'iss' => 'http://example.com',
            'iat' => 100,
            'exp' => 'foo',
            'sub' => 1,
            'jti' => 'foo',
        ];

        $this->validator->check($payload);
    }

    /** @test **/
    public function it_should_throw_an_exception_when_required_claims_are_missing()
    {
        $this->setExpectedException('Tymon\JWTAuth\Exceptions\TokenInvalidException');

        $payload = [
            'iss' => 'http://example.com',
            'foo' => 'bar',
            // these are inserted to check for regression to a previous bug
            // where the check would only compare keys of autoindexed name arrays
            // (There are enough to account for all of the required claims' indices)
            'autoindexed',
            'autoindexed',
            'autoindexed',
            'autoindexed',
            'autoindexed',
            'autoindexed',
            'autoindexed',
>>>>>>> 614ee3410a1cc18ef13c8d5ffd491b5608afabd8
        ];

        $collection = Collection::make($claims);

        $this->validator->setRefreshFlow()->setRefreshTTL(60)->check($collection);
    }
}
