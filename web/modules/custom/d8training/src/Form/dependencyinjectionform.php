<?php

namespace Drupal\d8training\Form;
 
use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Drupal\Core\Logger\LoggerChannelFactory;
class dependencyinjectionform extends FormBase{
 
  /**
 
   * {@inheritdoc}
 
   */
  
  public function getFormId() {
 
    return 'dependency_injection_form';
 
  }
 
  /**
 
   * {@inheritdoc}
 
   */
 
  public function buildForm(array $form, FormStateInterface $form_state) {

    $form['first_name'] = array(
 
      '#type' => 'textfield',
 
      '#title' => $this->t('First Name'),
 
      '#required' => TRUE,
 
    );
    $form['last_name'] = array(
 
        '#type' => 'textfield',
   
        '#title' => $this->t('Last Name'),
   
        '#required' => TRUE,
   
      );
    $form['submit']=array(
        '#type' =>'submit',
        '#value' =>'Save',
        '#required' =>TRUE,
    );
    return $form;
 
  }
  public function submitForm(array &$form, FormStateInterface $form_state) {
    \Drupal::messenger()->addMessage(t('First name :'. $form_state->getValue('first_name')));
    \Drupal::messenger()->addMessage(t('Last name :'. $form_state->getValue('last_name')));
  }
 
  /**
 
   * {@inheritdoc}
 
   */
}
