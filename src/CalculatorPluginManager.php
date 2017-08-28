<?php

namespace Drupal\calculator;

use Drupal\Core\Cache\CacheBackendInterface;
use Drupal\Core\Extension\ModuleHandlerInterface;
use Drupal\Core\Plugin\DefaultPluginManager;

/**
 * PLugin Manager for Claculator Plugins
 */
class CalculatorPluginManager extends DefaultPluginManager {

  public function __construct(\Traversable $namespaces, CacheBackendInterface $cache_backend,
    ModuleHandlerInterface $module_handler) {
    // This tells the plugin manager to look for Calculator plugins in the
    // 'src/Plugin/Calculator' subdirectory of any enabled modules.
    $subdir = 'Plugin/Calculator';
    // The name of the interface that plugins should adhere to. Drupal will
    // enforce this as a requirement. If a plugin does not implement this
    // interface, than Drupal will throw an error.
    $plugin_interface = 'Drupal\calculator\CalculatorInterface';
    // The name of the annotation class that contains the plugin definition.
    $plugin_definition_annotation_name = 'Drupal\calculator\Annotation\Calculator';

    parent::__construct($subdir, $namespaces, $module_handler, $plugin_interface,
      $plugin_definition_annotation_name);

    $this->alterInfo('calculator_info');
    $this->setCacheBackend($cache_backend, 'calculator_info');
  }
}
