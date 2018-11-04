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
=======
namespace Tymon\JWTAuth\Test\Providers\JWT;
>>>>>>> 614ee3410a1cc18ef13c8d5ffd491b5608afabd8

use Tymon\JWTAuth\Token;

class TokenTest extends AbstractTestCase
{
    /**
     * @var \Tymon\JWTAuth\Token
     */
    protected $token;

    public function setUp()
    {
        parent::setUp();

        $this->token = new Token('foo.bar.baz');
    }

    /** @test */
    public function it_should_return_the_token_when_casting_to_a_string()
    {
        $this->assertEquals((string) $this->token, $this->token);
    }

    /** @test */
    public function it_should_return_the_token_when_calling_get_method()
    {
        $this->assertInternalType('string', $this->token->get());
    }
}
