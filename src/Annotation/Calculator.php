<?php
namespace Drupal\calculator\Annotation;

use Drupal\Component\Annotation\Plugin;

/**
 * Defines a calculator annotation object.
 *
 * @Annotation
 */
class Calculator extends Plugin {
  /**
   * The plugin ID.
   *
   * @var string
   */
  public $id;

  /**
   * The plugin title.
   *
   *  @var \Drupal\Core\Annotation\Translation
   *
   *  @ingroup plugin_translatable
   */
  public $title;

  /**
   * A brief, human readable, description of the calculator type.
   *
   * This property is designated as being translatable because it will appear
   * in the user interface. This provides a hint to other developers that they
   * should use the Translation() construct in their annotation when declaring
   * this property.
   *
   * @var \Drupal\Core\Annotation\Translation
   *
   * @ingroup plugin_translatable
   */
  public $description;
}
