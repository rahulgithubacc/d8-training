<?php
/**
 * @file
 * Contains Drupal\ajax_example\AjaxExampleForm
 */
namespace Drupal\d8training\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Ajax\AjaxResponse;
use Drupal\Core\Ajax\HtmlCommand;

class Ajax extends FormBase {

  public function getFormId() {
    return 'ajax_example_form';
  }
    public function buildForm(array $form, FormStateInterface $form_state) {
        $form['user_email'] = array(
            '#type' => 'textfield',
            '#title' => t('User or Email'),
            '#description' => 'Please enter in a user or email',
            '#ajax' => [
                'callback' => '::checkUserEmailValidation',
            ],    
        );
    }   
    public function checkUserEmailValidation(array $form, FormStateInterface $form_state) {
        $ajax_response = new AjaxResponse();
       $text="";
       // Check if User or email exists or not
        if (user_load_by_name($form_state->getValue(user_email)) || user_load_by_mail($form_state->getValue(user_email))) {
        //   $text = t(‘User or Email exists');
        } 
        else {
        //   $text = ’User or Email does not exists';
        }
        $ajax_response->addCommand(new HtmlCommand('#user-email-result', $text));
        return $ajax_response;
    }
    public function submitForm(array &$form, FormStateInterface $form_state) {
        // \Drupal::messenger()->addMessage(t('Name :'. $form_state->getValue('name')));
        }
     
    
}