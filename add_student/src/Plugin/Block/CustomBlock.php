<?php

namespace Drupal\add_student\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides a 'Hello' Block.
 *
 * @Block(
 *   id = "hello_block",
 *   admin_label = @Translation("Hello block"),
 *   category = @Translation("Hello World"),
 * )
 */
class CustomBlock extends BlockBase {

 // protected $loadData;

   // public function __contruct() {
      //  $this->loadData = \Drupal::service('add_student.data_handler');

   // }
  

  //$database = \Drupal
  /**
   * {@inheritdoc}
   */
  public function build() {
  $db = \Drupal::database();
  $query = $db->select('student', 'e');
  $query->fields('e');
    //$query->condition('e.type', 'student');
  $result =   $query->execute()->fetchAll();

  //$this->loadData->getData();
  $query->execute()->fetchAll();
   //var_dump( $result);
   //exit();
        //$ids = [];
        //   foreach($data as $rec){
        //     $nids[] = $rec->id;
         //  }

         //  dump($nids);
         //  exit();

   $element = $this->t('this is my first customblock');
   return [
    '#theme' => 'my_block',
    '#read' => $element,
    '#records' => $result,
    // '#markup' => $this->t('this is custom block'),
   ];
  }
}