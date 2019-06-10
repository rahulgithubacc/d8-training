<?php
namespace Drupal\d8training;

use Drupal\node\NodeInterface;
use Drupal\node\Entity\Node;
use Drupal\user\Entity\User;
class MyService {
    public function checkAccess()
    {
        $nid = \Drupal::routeMatch()->getParameter('node');

        // print_r($node);
        // print_r(gettype($node));
        // exit();
        $user = \Drupal::currentUser()->id(); 
        $node_obj = \Drupal::entityTypeManager()->getStorage('node')->load($nid);
        $author_id = $node_obj->getOwner()->id();
        // print_r($user);
        // print_r($author_id);
        // exit();
        if($user==$author_id)   {
            return true;
        }
        else    {
            return false;
        }
    }
}