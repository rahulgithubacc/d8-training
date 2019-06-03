<?php

namespace Drupal\d8training\Form;
 
use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Drupal\Core\Logger\LoggerChannelFactory;
class SimpleForm extends FormBase{
 
  /**
 
   * {@inheritdoc}
 
   */
  
  public function getFormId() {
 
    return 'simple_form';
 
  }
 
  /**
 
   * {@inheritdoc}
 
   */
 
  public function buildForm(array $form, FormStateInterface $form_state) {

    $form['name'] = array(
 
      '#type' => 'textfield',
 
      '#title' => $this->t('Name'),
 
      '#required' => TRUE,
 
    );
    $form['submit']=array(
        '#type' =>'submit',
        '#value' =>'Save',
        '#required' =>TRUE,
    );
    return $form;
 
  }
  
  public function validateForm(array &$form,FormStateInterface $form_state){
    $name = $form_state->getValue('name');
    if(!preg_match("/^([a-zA-Z]+).{5,}$/",$name)){
      $form_state->setErrorByName('name',$this->t('Enter a valid name.Name contains only letters and please check the length of the name'));
    }
  }
   public function submitForm(array &$form, FormStateInterface $form_state) {
    \Drupal::messenger()->addMessage(t('Name :'. $form_state->getValue('name')));
    }
 
  /**
 
   * {@inheritdoc}
 
   */
}
