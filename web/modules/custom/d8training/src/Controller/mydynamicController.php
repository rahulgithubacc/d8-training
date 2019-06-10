<?php
/**
 * @file
 * Contains \Drupal\hello\Controller\HelloController.
 */
namespace Drupal\d8training\Controller;
 
use Drupal\Core\Controller\ControllerBase;
 
class mydynamicController extends ControllerBase {
  public function content($name = 0) {
    return array(
      '#type' => 'markup',
      '#markup' => t('Welcome @name', array('@name' => $name)),
    );
  }
}
