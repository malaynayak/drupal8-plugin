<?php
/**
 * @file
 * Contains \Drupal\calculator\Plugin\AreaCalculator.
 */

namespace Drupal\calculator\Plugin\Calculator;

use Drupal\calculator\CalculatorBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Url;
use Drupal\Core\Ajax\AjaxResponse;
use Drupal\Core\Ajax\OpenModalDialogCommand;

/**
 * Demonstrates various area calculators
 *
 * @Calculator(
 *   id = "area_calculator",
 *   title = "Area Calculator",
 *   description = @Translation("Area Calculator"),
 * )
 */
class AreaCalculator extends CalculatorBase {

  public function calculatorForm(array $form, FormStateInterface $form_state){

    $form['rectangle'] = [
      '#type' => 'details',
      "#title" => "Rectangle",
      '#open' => TRUE
    ];

    $form['rectangle']['height'] = [
      '#type' => 'number',
      '#min'=> 1,
      '#title' => t('Height in meters'),
    ];

    $form['rectangle']['width'] = [
      '#type' => 'number',
      '#min'=> 1,
      '#title' => t('Width in meters'),
    ];

    $form['rectangle']['actions'] = array('#type' => 'actions');
    $form['rectangle']['actions']['submit'] = [
      '#type' => 'submit',
      '#value' => 'Calculate',
      '#name' => 'cal_rectangle',
    ];

    $form['triangle'] = [
      '#type' => 'details',
      "#title" => "Triangle",
      '#open' => TRUE
    ];

    $form['triangle']['edge_one'] = [
      '#type' => 'number',
      '#min'=> 1,
      '#title' => t('Edge 1 in meters'),
    ];

    $form['triangle']['edge_two'] = [
      '#type' => 'number',
      '#min'=> 1,
      '#title' => t('Edge 2 in meters')
    ];

    $form['triangle']['edge_three'] = [
      '#type' => 'number',
      '#min'=> 1,
      '#title' => t('Edge 3 in meters')
    ];

    $form['triangle']['actions'] = array('#type' => 'actions');
    $form['triangle']['actions']['submit'] = [
      '#type' => 'submit',
      '#value' => 'Calculate',
      '#name' => 'cal_triangle',
    ];

    $form['circle'] = [
      '#type' => 'details',
      "#title" => "Circle",
      '#open' => TRUE
    ];

    $form['circle']['radius'] = [
      '#type' => 'number',
      '#min'=> 1,
      '#title' => t('Radius in meters')
    ];

    $form['circle']['actions'] = array('#type' => 'actions');
    $form['circle']['actions']['submit'] = [
      '#type' => 'submit',
      '#value' => 'Calculate',
      '#name' => 'cal_circle',
    ];

    return $form;
  }

  public function calculatorFormValidate(array &$form, FormStateInterface $form_state){}

  public function calculatorFormSubmit(array &$form, FormStateInterface $form_state){
    $values_submitted  = $form_state->getValues();
    if(isset($values_submitted['cal_rectangle'])){
      $area = $values_submitted['height'] * $values_submitted['width'];
      drupal_set_message(t('Area of the rectangle is : @area square meters ', ['@area' =>  $area]), 'status', FALSE);
    } else if(isset($values_submitted['cal_triangle'])){
      $edge_one = $values_submitted['edge_one'];
      $edge_two = $values_submitted['edge_two'];
      $edge_three = $values_submitted['edge_three'];
      $s = ($edge_one + $edge_two + $edge_three) / 2 ;
      $area  = sqrt($s * ($s - $edge_one) * ($s - $edge_two) * ($s - $edge_three));
      drupal_set_message(t('Area of the triangle is : @area square meters ', ['@area' =>  $area]), 'status', FALSE);
    } else if(isset($values_submitted['cal_circle'])){
      $area = pi() * pow($values_submitted['radius'], 2) ;
      drupal_set_message(t('Area of the circle is : @area square meters ', ['@area' =>  $area]), 'status', FALSE);
    }
  }
}
