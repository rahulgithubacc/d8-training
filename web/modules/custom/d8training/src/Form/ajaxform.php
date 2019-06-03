<?php

namespace Drupal\d8training\Form;
 
use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Drupal\Core\Logger\LoggerChannelFactory;

class ajaxform extends FormBase{
 
  /**
 
   * {@inheritdoc}
 
   */
  
  public function getFormId() {
 
    return 'ajax_form';
 
  }
 
  /**
 
   * {@inheritdoc}
 
   */
 
  public function buildForm(array $form, FormStateInterface $form_state) {

    $form['qualification'] = array(
        '#title' => t('Qualification'),
        '#type' => 'select',
        '#options' => array(t('--- SELECT QUALIFICATION ---'), t('U.G'), t('P.G'), t('Other')),
      );
      $form['other_qualification'] = array(
        '#title' => $this->t('If other,please specify'),
        '#type' => 'textfield',
        '#states' => array(
            'visible' => array(
                ':input[name="qualification"]' => array('value' => 3),
            ),
        ),
      );
      $form['country'] = array(
        '#title' => t('Country'),
        '#type' => 'select',
        '#options' => array(t('--- SELECT COUNTRY ---'), t('INDIA'), t('UK')),
        '#ajax' => [
            'callback' => '::show_states',
            'wrapper' => 'state-name',
       ],  
      );
    
    //   $states = [];
     if($form_state->getValue('country') == 0){
    
     }
      elseif($form_state->getValue('country') == 1) 
        $states = [0 => 'Maharashtra', 1 => 'Rajasthan', 2 => 'West Bengal'];
      else 
        $states = [0 => 'London', 1 => 'Washington', 2 => 'Manchester'];    
      $form['state_container'] = [
          '#type' => 'container',
          '#attributes' => ['id' => 'state-name'],
          '#states' => array(
            'invisible' => array(
                ':input[name="country"]' => array('value' => 0),
            ),
        ),
      ];  
      $form['state_container']['state'] = [
        '#title' => t('State'),
        '#type' => 'select',
        '#options' => $states,
     ];

    $form['submit']=array(
        '#type' =>'submit',
        '#value' =>'Save',
        '#required' =>TRUE,
    );
    return $form;
 
  }
  
   public function submitForm(array &$form, FormStateInterface $form_state) {
    // \Drupal::messenger()->addMessage(t('Name :'. $form_state->getValue('name')));
    }
 
  /**
 
   * {@inheritdoc}
 
   */
  
  public function show_states(array &$form, FormStateInterface $form_state) {
    if($form_state->getValue('country') == 0){
        $form['state_container'] =[
            '#acess' => FALSE,
        ];
    }
    return $form['state_container'];
  }
}

