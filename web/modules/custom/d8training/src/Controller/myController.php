<?php
namespace Drupal\d8training\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
 * An example controller.
 */
class myController extends ControllerBase {

  /**
   * Returns a render-able array for a test page.
   */
  public function content() {
    $build = [
      '#markup' => $this->t('Hello World!'),
    ];
    return $build;
  }

}