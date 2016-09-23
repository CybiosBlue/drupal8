<?php

namespace Drupal\as_book\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
 * Class DefaultController.
 *
 * @package Drupal\as_book\Controller
 */
class DefaultController extends ControllerBase {

  /**
   * Listing.
   *
   * @return string
   *   Return Hello string.
   */
  public function listing() {
    $query = \Drupal::entityQuery('node');
    $query->condition('status', 1);
    $query->condition('type', 'livre', '=');
    $query->range(0, 10);
    $query->sort('created', 'ASC');
    $nids = $query->execute();

    $nodes = \Drupal\node\Entity\Node::loadMultiple($nids);

    $livre = [];
    foreach ($nodes as $node) {
      $livre[] = node_view($node, 'teaser');
    }

    return [
      '#theme' => 'book_list',
      'books' => $livre,
    ];
  }

}
