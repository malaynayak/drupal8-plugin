<?php
namespace Drupal\calculator;

use Drupal\Core\Form\FormStateInterface;

/**
 * An interface for all Calculator type plugins.
 */
interface CalculatorInterface {

  public function calculatorForm(array $form, FormStateInterface $form_state);

  public function calculatorFormValidate(array &$form, FormStateInterface $form_state);

  public function calculatorFormSubmit(array &$form, FormStateInterface $form_state);

}
