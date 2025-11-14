<?php

namespace Drupal\admin_toolbar_search\Constants;

/**
 * Constants for the Admin Toolbar Search module.
 */
final class AdminToolbarSearchConstants {

  /**
   * HTML IDs used to display the admin toolbar search.
   *
   * @see admin_toolbar_search_toolbar_alter()
   * @see \Drupal\Tests\admin_toolbar_search\Functional\AdminToolbarSearchSettingsFormTest
   *
   * @var array<string, string>
   */
  const ADMIN_TOOLBAR_SEARCH_HTML_IDS = [
    'search_tab' => 'admin-toolbar-search-tab',
    'search_tab_mobile' => 'admin-toolbar-mobile-search-tab',
    'search_toolbar_item' => 'toolbar-item-administration-search',
    'search_tray' => 'toolbar-item-administration-search-tray',
    'search_input' => 'admin-toolbar-search-input',
  ];

}
