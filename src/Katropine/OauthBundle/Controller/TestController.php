<?php
namespace Katropine\OauthBundle\Controller;

/**
 * Description of ApiController
 *
 * @author Kristian Beres <kristian@katropine.com>
 * @since Feb 19, 2015
 */

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\JsonResponse;

class TestController extends Controller
{
    /**
     * @Route("/articles")
     * @return JsonResponse
     */
    public function articlesAction()
    {
        $articles = array('article1', 'article2', 'article3');
        return new JsonResponse($articles);
    }
    /**
     * @Route("/user")
     * @return JsonResponse
     */
    public function userAction()
    {
        $user = $this->container->get('security.context')->getToken()->getUser();
        if($user) {
            return new JsonResponse(array(
                'id' => $user->getId(),
                'username' => $user->getUsername()
            ));
        }

        return new JsonResponse(array(
            'message' => 'User is not identified'
        ));

    }
   /**
     * @Route("/test")
     * @return JsonResponse
     */
    public function test(){
        var_dump($_GET['code']); exit;
    }
}