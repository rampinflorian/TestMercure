<?php


namespace App\Services;


use App\Entity\User;
use Lcobucci\JWT\Builder;
use Lcobucci\JWT\Signer\Hmac\Sha256;
use Lcobucci\JWT\Signer\Key;
use Symfony\Component\HttpFoundation\Cookie;
use function Sodium\add;

class MercureCookieGenerator
{
    private string $secret;

    /**
     * MercureCookieGenerator constructor.
     * @param string $secret
     */
    public function __construct(string $secret)
    {
        $this->secret = $secret;
    }

    /**
     * @param User $user
     * @return Cookie
     */
    public function generate(User $user) : Cookie
    {
        $token = (new Builder())
            ->withClaim('mercure', [ 'subscribe' => [sprintf("/user/%s", $user->getId())]])
            ->getToken(new Sha256(), new Key($this->secret));

        return Cookie::create('mercureAuthorization', $token, (new \DateTime())->add(new \DateInterval('PT5H')), '/.well-known/mercure',null,false,true,false,Cookie::SAMESITE_STRICT);
    }
}