<?php
 
namespace Drupal\add_student\Form;
 
use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Database\Database;
use Drupal\Core\Url;
use Drupal\Core\Routing;
 
/**
 * Provides the form for adding countries.
 */
class AddStudent extends FormBase {

 
 
  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'add_student_form';
  }
 
  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $form['fname'] = [
      '#type' => 'textfield',
      '#title' => $this->t('First Name'),
      '#required' => TRUE,
      '#maxlength' => 20,
      '#default_value' => (isset($data['fname'])) ? $data['fname'] : '',
    ];
	 $form['sname'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Second Name'),
      '#required' => TRUE,
      '#maxlength' => 20,
      '#default_value' => (isset($data['sname'])) ? $data['sname'] : '',
    ];
	$form['age'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Age'),
      '#required' => TRUE,
      '#maxlength' => 20,
      '#default_value' => (isset($data['age'])) ? $data['age'] : '',
    ];

	
    $form['actions']['#type'] = 'actions';
    $form['actions']['submit'] = [
      '#type' => 'submit',
      '#button_type' => 'primary',
      '#default_value' => $this->t('Save') ,
    ];

    

	//$form['#validate'][] = 'studentFormValidate';
 
    return $form;
 
  }
  
   /**
   * {@inheritdoc}
   */
  public function validateForm(array & $form, FormStateInterface $form_state) {
       $field = $form_state->getValues();
	   
		$fields["fname"] = $field['fname'];
		if (!$form_state->getValue('fname') || empty($form_state->getValue('fname'))) {
            $form_state->setErrorByName('fname', $this->t('Provide First Name'));
        }
		
		
  }
 
  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
	try{
   // \Drupal::service('add_student.data_handler')->setData($form_state);

		$conn = Database::getConnection();
		
		$field = $form_state->getValues();
	   
		$fields["fname"] = $field['fname'];
		$fields["sname"] = $field['sname'];
		$fields["age"] = $field['age'];
		
		 $conn->insert('student')
			   ->fields($fields)->execute();
		  \Drupal::messenger()->addMessage($this->t('The Student data has been succesfully saved'));
      $form_state->setRedirect('user.login');
		 
	} catch(Exception $ex){
		\Drupal::logger('add_student')->error($ex->getMessage());
	}
    
  }
 
}