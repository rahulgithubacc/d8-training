<?php
namespace Drupal\d8training\Form;
use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;
class configform extends ConfigFormBase {
  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'd8training_config_form';
  }
  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $form = parent::buildForm($form, $form_state);
    $config = $this->config('d8training.settings');
    $form['appid'] = array(
      '#type' => 'textfield',
      '#title' => $this->t('APP ID'),
      '#default_value' => $config->get('appid'),
      '#required' => TRUE,
    );
    return $form;
  }
  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $values = $form_state->getValues();
    $this->config('d8training.settings')
    ->set('appid', $form_state->getValue('appid'))
    ->save();
  parent::submitForm($form, $form_state);
  }
  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return [
      'd8training.settings',
    ];
  }
}