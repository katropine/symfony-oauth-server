<?php

namespace Katropine\OauthBundle\Entity;

/**
 * Description of User
 *
 * @author Kristian Beres <kristian@katropine.com>
 * @since Feb 19, 2015
 */
use Symfony\Component\Security\Core\User\UserInterface;
use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * Acme\UserBundle\Entity\User
 *
 * @ORM\Table(name="user")
 * @ORM\Entity(repositoryClass="Katropine\OauthBundle\Repository\UserRepository")
 */
class User extends BaseUser implements UserInterface, \Serializable {

    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(name="is_active", type="boolean")
     */
    protected $isActive;

    /**
     * @ORM\Column(type="string", length=32)
     */
    private $apiKey;

    public function __construct() {
        parent::__construct();
        $this->isActive = true;
        $this->salt = md5(uniqid(null, true));
    }

    public function getId() {
        return $this->id;
    }

    /**
     * @inheritDoc
     */
    public function setUsername($username) {
        $this->username = $username;
        $this->email = $username;
    }

    /**
     * @inheritDoc
     */
    public function getRoles() {
        return array('ROLE_USER');
    }

    /**
     * @inheritDoc
     */
    public function eraseCredentials() {
        
    }

    /**
     * @param mixed $apiKey
     */
    public function setApiKey($apiKey) {
        $this->apiKey = $apiKey;
    }

    /**
     * @return mixed
     */
    public function getApiKey() {
        return $this->apiKey;
    }

    /**
     * @see \Serializable::serialize()
     */
    public function serialize() {
        return serialize(
                array(
                    $this->id,
                )
        );
    }

    /**
     * @see \Serializable::unserialize()
     */
    public function unserialize($serialized) {
        list (
                $this->id,
                ) = unserialize($serialized);
    }

}
