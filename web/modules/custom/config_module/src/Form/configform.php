<?php
namespace Drupal\config_module\Form;
use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;
class configform extends ConfigFormBase {
  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'config_module_config_form';
  }
  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $form = parent::buildForm($form, $form_state);
    $config = $this->config('config_module.settings');
    $form['appid'] = array(
      '#type' => 'textfield',
      '#title' => $this->t('Config Form'),
      '#default_value' => $config->get('appid'),
      '#required' => TRUE,
    );
    $form['submit']=array(
        '#type' =>'submit',
        '#value' =>'Submit',
        '#required' =>TRUE,
    );
    return $form;
  }
  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $values = $form_state->getValues();
    $this->config('config_module.settings')
    ->set('appid', $form_state->getValue('appid'))
    ->save();
  parent::submitForm($form, $form_state);
  }
  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return [
      'config_module.settings',
    ];
  }
}