<?php

namespace Drupal\admin_toolbar\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Class AdminToolbarSettingsForm. The config form for the admin_toolbar module.
 *
 * @package Drupal\admin_toolbar\Form
 */
class AdminToolbarSettingsForm extends ConfigFormBase {

  /**
   * The cache menu instance.
   *
   * @var \Drupal\Core\Cache\CacheBackendInterface
   */
  protected $cacheMenu;

  /**
   * The menu link manager instance.
   *
   * @var \Drupal\Core\Menu\MenuLinkManagerInterface
   */
  protected $menuLinkManager;

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container) {
    $instance = parent::create($container);
    $instance->cacheMenu = $container->get('cache.menu');
    $instance->menuLinkManager = $container->get('plugin.manager.menu.link');
    return $instance;
  }

  /**
   * {@inheritDoc}
   */
  protected function getEditableConfigNames() {
    return [
      'admin_toolbar.settings',
    ];
  }

  /**
   * {@inheritDoc}
   */
  public function getFormId() {
    return 'admin_toolbar_settings';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $config = $this->config('admin_toolbar.settings');
    $depth_values = range(1, 9);
    $form['menu_depth'] = [
      '#type' => 'select',
      '#title' => $this->t('Menu depth'),
      '#description' => $this->t('Maximal depth of displayed menu.'),
      '#default_value' => $config->get('menu_depth'),
      '#options' => array_combine($depth_values, $depth_values),
    ];

    $form['disable_sticky'] = [
      '#type' => 'checkbox',
      '#title' => $this->t('Disable sticky toolbar'),
      '#description' => $this->t("Disable Admin Toolbar's sticky behavior so it stays at the top of the page when scrolling."),
      '#default_value' => $config->get('disable_sticky'),
    ];

    return parent::buildForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $this->config('admin_toolbar.settings')
      ->set('menu_depth', $form_state->getValue('menu_depth'))
      ->set('disable_sticky', $form_state->getValue('disable_sticky'))
      ->save();
    parent::submitForm($form, $form_state);
    $this->cacheMenu->deleteAll();
    $this->menuLinkManager->rebuild();
  }

}
