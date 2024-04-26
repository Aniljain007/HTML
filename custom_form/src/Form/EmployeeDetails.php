<?php

namespace drupal\custom_form\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

class EmployeeDetails extends FormBase {
    public function getFormId(){
        return "custom_employee_details_form";
    }

    public function buildForm(array $form, FormStateInterface $form_state){
        $form['employeename'] = [
            '#type' => 'textfield',
            '#title' => 'employee FirstName',
            '#required' => true,
        ];
        $form['employeelastname'] = [
            '#type' => 'textfield',
            '#title' => 'Employee LastName',
            '#required' => true,
        ];
        $form['employeemail'] = [
            '#type' => 'email',
            '#title' => 'Empolyee Email',
            '#required' => true,
        ];
        $form['employeegender'] = [
            '#type' => 'select',
            '#title' => 'employee Gender',
            '#options' => [
                '#male' => 'Male',
                '#female' => 'Female',
                '#other' => 'Others',
            ],
        ];
        $form['submit'] = [
            '#type' => 'submit',
            '#value' => 'Submit',
        ];
        return $form;

    }
    public function validateForm(array &$form, FormStateInterface $form_state) {
        if(strlen($form_state -> getValue('employeename')) <3) {
            $form_state ->setErrorByName('employeename',"please make sure employeename length more than 3 charecters");
        }
    }
    public function submitForm(array &$form, FormStateInterface $form_state) {
        \Drupal::messenger()->addMessage("Employee Details submitted successfully");
        
        $values = $form_state->getValues();
        \Drupal::database()->insert('employee_details')->fields([
            'fname' => $values['employeename'],
            'lname' => $values['employeelastname'],
            'mail' => $values['employeemail'],
            'gender' => $values['employeegender'],
        ])->execute();

        foreach ($form_state->getValues() as $key => $values) {
            \Drupal::messenger()->addMessage($key . ': ' . $values);
          }
    }
}

