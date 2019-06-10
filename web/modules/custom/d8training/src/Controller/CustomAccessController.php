<?php
namespace Drupal\d8training\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
 * An example controller.
 */
class CustomAccessController extends ControllerBase {

  /**
   * Returns a render-able array for a test page.
   */
  public function content() {
    return [
       
        '#type' => 'markup',
        '#markup' =>'<h1><b>' . $this->t('Yeh!You have permission to access this page').'</b></h1>',
      ];
  }
}