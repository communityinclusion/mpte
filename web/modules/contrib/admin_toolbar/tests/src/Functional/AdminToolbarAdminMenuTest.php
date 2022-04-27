<?php

namespace Drupal\Tests\admin_toolbar\Functional;

use Drupal\Core\Url;
use Drupal\menu_link_content\Entity\MenuLinkContent;
use Drupal\Tests\toolbar\Functional\ToolbarAdminMenuTest;

/**
 * Tests the caching of the admin menu subtree items.
 *
 * @group admin_toolbar
 */
class AdminToolbarAdminMenuTest extends ToolbarAdminMenuTest {

  /**
   * Modules to enable.
   *
   * @var array
   */
  protected static $modules = [
    'admin_toolbar',
  ];

}
