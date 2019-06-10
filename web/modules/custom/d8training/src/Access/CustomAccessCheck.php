<?php
namespace Drupal\d8training\Access;

use Drupal\Core\Session\AccountInterface;
use Drupal\Core\Access\AccessResult;
use Drupal\Core\Routing\Access\AccessInterface;
use Drupal\d8training\MyService;

/**
 * Checks access for displaying configuration translation page.
 */
class CustomAccessCheck implements AccessInterface{

  /**
   * Drupal core Request Stack.
   *
   * @var \Drupal\example\MyService
   */
  private $myService;

  /**
   * CustomAccessCheck constructor.
   *
   * @param \Drupal\example\MyService
   *   MyService does things.
   */
  public function __construct(MyService $myService) {
    $this->myService = $myService;
  }

  /**
   * A custom access check.
   *
   * @param \Drupal\Core\Session\AccountInterface $account
   *   Run access checks for this account.
   *
   * @return \Drupal\Core\Access\AccessResultInterface
   *   The access result.
   */
  
  public function access(AccountInterface $account) {
    // Check permissions and combine that with any custom access checking needed. Pass forward
    // parameters from the route and/or request as needed.
    return ($this->myService->checkAccess()) ? AccessResult::allowed() : AccessResult::forbidden();
  }

}