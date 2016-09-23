<?php

namespace Drupal\as_book\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides a 'ReservationBlock' block.
 *
 * @Block(
 *  id = "reservation_block",
 *  admin_label = @Translation("Réserver ce livre"),
 * )
 */
class ReservationBlock extends BlockBase {

  public function build()
  {
  $form = \Drupal::formBuilder()->getForm('Drupal\as_book\Form\ReservationForm');
  $current_path = \Drupal::request()->getRequestUri();
  $form['book_id']['#value'] = str_replace('/node/', NULL, $current_path);



    $build = [];
    $build['reservation_block'] = $form;

    return $build;
  }
}
