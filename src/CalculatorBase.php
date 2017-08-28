<?php
namespace Drupal\calculator;

use Drupal\Component\Plugin\PluginBase;
use Drupal\calculator\CalculatorInterface;
use \Drupal\Core\Form\FormInterface;
use Drupal\Core\Form\FormStateInterface;

/**
 * Base class for Calculator Plugin Type
 */
class CalculatorBase extends PluginBase implements CalculatorInterface, FormInterface {

  protected $form_id;

  /**
   * {@inheritdoc}
   */
  public function getFormId(){
    return $this->form_id;
  }

  /**
   * {@inheritdoc}
   */
  public function __construct(){
    $this->form_id =  'calculator_form_'.$this->pluginDefinition['id'];
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state){
    return $form + $this->calculatorForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function validateForm(array &$form, FormStateInterface $form_state){
    $this->calculatorFormValidate($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state){
    $this->calculatorFormSubmit($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
   public function calculatorForm(array $form, FormStateInterface $form_state){
     return [];
   }

   /**
    * {@inheritdoc}
    */
   public function calculatorFormValidate(array &$form, FormStateInterface $form_state){}

   /**
    * {@inheritdoc}
    */
   public function calculatorFormSubmit(array &$form, FormStateInterface $form_state){}
}
