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
namespace Tymon\JWTAuth\Test;

use Mockery;
=======
namespace Tymon\JWTAuth\Test\Providers\JWT;

use Mockery;
use Carbon\Carbon;
>>>>>>> 614ee3410a1cc18ef13c8d5ffd491b5608afabd8
use Tymon\JWTAuth\Payload;
use Tymon\JWTAuth\Blacklist;
use Tymon\JWTAuth\Claims\JwtId;
use Tymon\JWTAuth\Claims\Issuer;
use Tymon\JWTAuth\Claims\Subject;
use Tymon\JWTAuth\Claims\IssuedAt;
use Tymon\JWTAuth\Claims\NotBefore;
<<<<<<< HEAD
use Tymon\JWTAuth\Claims\Collection;
use Tymon\JWTAuth\Claims\Expiration;
use Tymon\JWTAuth\Contracts\Providers\Storage;
use Tymon\JWTAuth\Validators\PayloadValidator;
=======
use Tymon\JWTAuth\Claims\Expiration;
>>>>>>> 614ee3410a1cc18ef13c8d5ffd491b5608afabd8

class BlacklistTest extends AbstractTestCase
{
    /**
     * @var \Tymon\JWTAuth\Contracts\Providers\Storage|\Mockery\MockInterface
     */
    protected $storage;

    /**
     * @var \Tymon\JWTAuth\Blacklist
     */
    protected $blacklist;

    /**
     * @var \Mockery\MockInterface|\Tymon\JWTAuth\Validators\Validator
     */
    protected $validator;

    public function setUp()
    {
<<<<<<< HEAD
        parent::setUp();
=======
        Carbon::setTestNow(Carbon::createFromTimeStampUTC(123));

        $this->storage = Mockery::mock('Tymon\JWTAuth\Providers\Storage\StorageInterface');
        $this->blacklist = new Blacklist($this->storage);
        $this->blacklist->setRefreshTTL(20160);
>>>>>>> 614ee3410a1cc18ef13c8d5ffd491b5608afabd8

        $this->storage = Mockery::mock(Storage::class);
        $this->blacklist = new Blacklist($this->storage);
        $this->validator = Mockery::mock(PayloadValidator::class);
    }

    /** @test */
    public function it_should_add_a_valid_token_to_the_blacklist()
    {
        $claims = [
            new Subject(1),
            new Issuer('http://example.com'),
            new Expiration($this->testNowTimestamp + 3600),
            new NotBefore($this->testNowTimestamp),
            new IssuedAt($this->testNowTimestamp),
            new JwtId('foo'),
        ];

        $collection = Collection::make($claims);

        $this->validator->shouldReceive('setRefreshFlow->check')->andReturn($collection);

        $payload = new Payload($collection, $this->validator);

        $this->storage->shouldReceive('add')->with('foo', ['valid_until' => $this->testNowTimestamp], 20161)->once();
        $this->blacklist->add($payload);
    }

    /** @test */
    public function it_should_add_a_token_with_no_exp_to_the_blacklist_forever()
    {
        $claims = [
            new Subject(1),
            new Issuer('http://example.com'),
<<<<<<< HEAD
            new NotBefore($this->testNowTimestamp),
            new IssuedAt($this->testNowTimestamp),
=======
            new Expiration(100 + 3600),
            new NotBefore(100),
            new IssuedAt(100),
>>>>>>> 614ee3410a1cc18ef13c8d5ffd491b5608afabd8
            new JwtId('foo'),
        ];
        $collection = Collection::make($claims);

        $this->validator->shouldReceive('setRefreshFlow->check')->andReturn($collection);

<<<<<<< HEAD
        $payload = new Payload($collection, $this->validator);

        $this->storage->shouldReceive('forever')->with('foo', 'forever')->once();
        $this->blacklist->add($payload);
    }

    /** @test */
    public function it_should_return_true_when_adding_an_expired_token_to_the_blacklist()
=======
        $this->storage->shouldReceive('add')->once()->with('foo', [], 20160);
        $this->assertTrue($this->blacklist->add($payload));
    }

    /** @test */
    public function it_should_return_true_when_adding_a_refreshable_expired_token_to_the_blacklist()
>>>>>>> 614ee3410a1cc18ef13c8d5ffd491b5608afabd8
    {
        $claims = [
            new Subject(1),
            new Issuer('http://example.com'),
<<<<<<< HEAD
            new Expiration($this->testNowTimestamp - 3600),
            new NotBefore($this->testNowTimestamp),
            new IssuedAt($this->testNowTimestamp),
=======
            new Expiration(101),
            new NotBefore(100),
            new IssuedAt(100),
            new JwtId('foo'),
        ];
        $payload = new Payload($claims, $this->validator, true);

        $this->storage->shouldReceive('add')->once()->with('foo', [], 20160);
        $this->assertTrue($this->blacklist->add($payload));
    }

    /** @test */
    public function it_should_return_false_when_adding_an_unrefreshable_token_to_the_blacklist()
    {
        $claims = [
            new Subject(1),
            new Issuer('http://example.com'),
            new Expiration(100), // default refresh_ttl
            new NotBefore(100),
            new IssuedAt(100 - 20160 * 60),
            new JwtId('foo'),
        ];
        $payload = new Payload($claims, $this->validator, true);

        $this->storage->shouldReceive('add')->never();
        $this->assertFalse($this->blacklist->add($payload));
    }

    /** @test */
    public function it_should_return_false_when_adding_a_unrefreshable_token_after_modifying_refresh_ttl()
    {
        $claims = [
            new Subject(1),
            new Issuer('http://example.com'),
            new Expiration(101),
            new NotBefore(100),
            new IssuedAt(100),
>>>>>>> 614ee3410a1cc18ef13c8d5ffd491b5608afabd8
            new JwtId('foo'),
        ];
        $collection = Collection::make($claims);

        $this->validator->shouldReceive('setRefreshFlow->check')->andReturn($collection);

        $payload = new Payload($collection, $this->validator, true);

<<<<<<< HEAD
        $this->storage->shouldReceive('add')->with('foo', ['valid_until' => $this->testNowTimestamp], 20161)->once();
        $this->assertTrue($this->blacklist->add($payload));
=======
        $this->storage->shouldReceive('add')->never();
        $this->blacklist->setRefreshTTL(0);
        $this->assertFalse($this->blacklist->add($payload));
>>>>>>> 614ee3410a1cc18ef13c8d5ffd491b5608afabd8
    }

    /** @test */
    public function it_should_check_whether_a_token_has_been_blacklisted()
    {
        $claims = [
            new Subject(1),
            new Issuer('http://example.com'),
<<<<<<< HEAD
            new Expiration($this->testNowTimestamp + 3600),
            new NotBefore($this->testNowTimestamp),
            new IssuedAt($this->testNowTimestamp),
            new JwtId('foobar'),
        ];

        $collection = Collection::make($claims);

        $this->validator->shouldReceive('setRefreshFlow->check')->andReturn($collection);

        $payload = new Payload($collection, $this->validator);

        $this->storage->shouldReceive('get')->with('foobar')->once()->andReturn(['valid_until' => $this->testNowTimestamp]);

        $this->assertTrue($this->blacklist->has($payload));
    }

    public function blacklist_provider()
    {
        return [
            [null],
            [0],
            [''],
            [[]],
            [['valid_until' => strtotime('+1day')]],
        ];
    }

    /**
     * @test
     * @dataProvider blacklist_provider
     *
     * @param mixed $result
     */
    public function it_should_check_whether_a_token_has_not_been_blacklisted($result)
    {
        $claims = [
            new Subject(1),
            new Issuer('http://example.com'),
            new Expiration($this->testNowTimestamp + 3600),
            new NotBefore($this->testNowTimestamp),
            new IssuedAt($this->testNowTimestamp),
            new JwtId('foobar'),
        ];

        $collection = Collection::make($claims);

        $this->validator->shouldReceive('setRefreshFlow->check')->andReturn($collection);

        $payload = new Payload($collection, $this->validator);

        $this->storage->shouldReceive('get')->with('foobar')->once()->andReturn($result);
        $this->assertFalse($this->blacklist->has($payload));
    }

    /** @test */
    public function it_should_check_whether_a_token_has_been_blacklisted_forever()
    {
        $claims = [
            new Subject(1),
            new Issuer('http://example.com'),
            new Expiration($this->testNowTimestamp + 3600),
            new NotBefore($this->testNowTimestamp),
            new IssuedAt($this->testNowTimestamp),
=======
            new Expiration(123 + 3600),
            new NotBefore(123),
            new IssuedAt(123),
>>>>>>> 614ee3410a1cc18ef13c8d5ffd491b5608afabd8
            new JwtId('foobar'),
        ];
        $collection = Collection::make($claims);

        $this->validator->shouldReceive('setRefreshFlow->check')->andReturn($collection);

        $payload = new Payload($collection, $this->validator);

        $this->storage->shouldReceive('get')->with('foobar')->once()->andReturn('forever');

<<<<<<< HEAD
=======
        $this->storage->shouldReceive('has')->once()->with('foobar')->andReturn(true);
>>>>>>> 614ee3410a1cc18ef13c8d5ffd491b5608afabd8
        $this->assertTrue($this->blacklist->has($payload));
    }

    /** @test */
    public function it_should_check_whether_a_token_has_been_blacklisted_when_the_token_is_not_blacklisted()
    {
        $claims = [
            new Subject(1),
            new Issuer('http://example.com'),
            new Expiration($this->testNowTimestamp + 3600),
            new NotBefore($this->testNowTimestamp),
            new IssuedAt($this->testNowTimestamp),
            new JwtId('foobar'),
        ];
        $collection = Collection::make($claims);

        $this->validator->shouldReceive('setRefreshFlow->check')->andReturn($collection);

        $payload = new Payload($collection, $this->validator);

        $this->storage->shouldReceive('get')->with('foobar')->once()->andReturn(null);

        $this->assertFalse($this->blacklist->has($payload));
    }

    /** @test */
    public function it_should_remove_a_token_from_the_blacklist()
    {
        $claims = [
            new Subject(1),
            new Issuer('http://example.com'),
<<<<<<< HEAD
            new Expiration($this->testNowTimestamp + 3600),
            new NotBefore($this->testNowTimestamp),
            new IssuedAt($this->testNowTimestamp),
=======
            new Expiration(123 + 3600),
            new NotBefore(123),
            new IssuedAt(123),
>>>>>>> 614ee3410a1cc18ef13c8d5ffd491b5608afabd8
            new JwtId('foobar'),
        ];
        $collection = Collection::make($claims);

        $this->validator->shouldReceive('setRefreshFlow->check')->andReturn($collection);

        $payload = new Payload($collection, $this->validator);

        $this->storage->shouldReceive('destroy')->once()->with('foobar')->andReturn(true);
        $this->assertTrue($this->blacklist->remove($payload));
    }

    /** @test */
    public function it_should_set_a_custom_unique_key_for_the_blacklist()
    {
        $claims = [
            new Subject(1),
            new Issuer('http://example.com'),
            new Expiration($this->testNowTimestamp + 3600),
            new NotBefore($this->testNowTimestamp),
            new IssuedAt($this->testNowTimestamp),
            new JwtId('foobar'),
        ];
        $collection = Collection::make($claims);

        $this->validator->shouldReceive('setRefreshFlow->check')->andReturn($collection);

        $payload = new Payload($collection, $this->validator);

        $this->storage->shouldReceive('get')->with(1)->once()->andReturn(['valid_until' => $this->testNowTimestamp]);

        $this->assertTrue($this->blacklist->setKey('sub')->has($payload));
        $this->assertSame(1, $this->blacklist->getKey($payload));
    }

    /** @test */
    public function it_should_empty_the_blacklist()
    {
        $this->storage->shouldReceive('flush')->once();
        $this->assertTrue($this->blacklist->clear());
    }

    /** @test */
    public function it_should_set_and_get_the_blacklist_grace_period()
    {
        $this->assertInstanceOf(Blacklist::class, $this->blacklist->setGracePeriod(15));
        $this->assertSame(15, $this->blacklist->getGracePeriod());
    }

    /** @test */
    public function it_should_set_and_get_the_blacklist_refresh_ttl()
    {
        $this->assertInstanceOf(Blacklist::class, $this->blacklist->setRefreshTTL(15));
        $this->assertSame(15, $this->blacklist->getRefreshTTL());
    }
}
