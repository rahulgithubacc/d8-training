<?php
namespace Drupal\mailmodule\Form;
use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;
class configform extends ConfigFormBase {
  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'mailmodule_config_form';
  }
  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $form = parent::buildForm($form, $form_state);
    $config = $this->config('mailmodule.settings');
    $form['appid'] = array(
      '#type' => 'email',
      '#title' => $this->t('Specify email address'),
    //   '#default_value' => $config->get('appid'),
      '#required' => TRUE,
    );
    return $form;
  }
  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $values = $form_state->getValues();
    $this->config('mailmodule.settings')
    ->set('email', $form_state->getValue('email'))
    ->save();
  parent::submitForm($form, $form_state);
  }
  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return [
      'mailmodule.settings',
    ];
  }
}