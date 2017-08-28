<?php
namespace Drupal\calculator\controller;

use Drupal;
use Drupal\Core\Ajax\AjaxResponse;
use Drupal\Core\Ajax\OpenModalDialogCommand;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Drupal\Core\Controller\ControllerBase;
use Drupal\calculator\CalculatorPluginManager;
use Drupal\Core\Form\FormBuilder;
use Drupal\Core\Url;

class CalculatorController extends ControllerBase {

  /*
   * The Calculator Plugin Manager
   * @var Drupal\calculator\CalculatorPluginManager
   */
  private $calculator_plugin_manager;

  /*
   * The Form builder
   * @var \Drupal\Core\Form\FormBuilder
   */
  private $form_builder;

  /**
   * Constructs the CalculatorController.
   *
   * @param Drupal\calculator\CalculatorPluginManager $calculator_plugin_manager
   *   The Calculator Plugin Manager
   */
  public function __construct(CalculatorPluginManager $calculator_plugin_manager, FormBuilder $form_builder){
    $this->calculator_plugin_manager = $calculator_plugin_manager;
    $this->form_builder = $form_builder;
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container){
      return new static(
        $container->get('plugin.manager.calculator'),
        $container->get('form_builder')
      );
  }

  /**
   * Lists all calculator plugins
   */
  public function list(){
    $items = [];
    $calculator_plugins = $this->calculator_plugin_manager->getDefinitions();
    if(!empty($calculator_plugins)){
      foreach($calculator_plugins as $key => $plugin){
        $items[] = Drupal::l($plugin['title'], Url::fromRoute('calculator.load',['id' => $key]));
      }
    }
    return [
      '#theme' => 'item_list',
      '#list_type' => 'ul',
      '#title' => 'Calculators',
      '#items' => $items,
    ];
  }

  /**
   * Loads a calculator plugin
   *
   * @param string $id is the id of the plugin
   */
  public function load($id){
    $content = [];
    // Create a class instance through the manager.
    $plugin_instance = $this->calculator_plugin_manager->createInstance($id);
    // Return the calculator form
    $content['form'] = $this->form_builder->getForm($plugin_instance);
    return $content;
  }
}
