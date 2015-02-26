<?php

namespace Katropine\OauthBundle\Entity;

/**
 * Description of RefreshToken
 *
 * @author Kristian Beres <kristian@katropine.com>
 * @since Feb 18, 2015
 */


use FOS\OAuthServerBundle\Entity\RefreshToken as BaseRefreshToken;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class RefreshToken extends BaseRefreshToken
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\ManyToOne(targetEntity="Client")
     * @ORM\JoinColumn(nullable=false)
     */
    protected $client;

    /**
     * @ORM\ManyToOne(targetEntity="Katropine\OauthBundle\Entity\User")
     */
    protected $user;
}