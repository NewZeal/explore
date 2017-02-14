<?php

namespace Drupal\custom_formatter\Plugin\Field\FieldFormatter;

use Drupal\Core\Field\FormatterBase;
use Drupal\Core\Field\FieldItemListInterface;

/**
 * Plugin implementation of the 'Custom' formatter.
 *
 * @FieldFormatter(
 *   id = "Custom",
 *   label = @Translation("Custom"),
 *   field_types = {
 *     "string", "text"
 *   }
 * )
 */
class CustomFormatter extends FormatterBase {

  /**
   * {@inheritdoc}
   */
  public function settingsSummary() {
    $summary = array();
    $settings = $this->getSettings();

    $summary[] = t('Displays the custom formatter.');

    return $summary;
  }

  /**
   * {@inheritdoc}
   */
  public function viewElements(FieldItemListInterface $items, $langcode) {
    $element = array();

    foreach ($items as $delta => $item) {
      // Render each element as markup.
      $element[$delta] = array(
        '#type' => 'markup',
        '#markup' => '<div class="custom-format">' . $item->value . '</div>',
      );
    }

    return $element;
  }

}
