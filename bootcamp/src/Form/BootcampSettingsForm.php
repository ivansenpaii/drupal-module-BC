<?php

namespace Drupal\bootcamp\Form;
 
use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;
 
/**
 * Configure example settings for this site.
 */
class BootcampSettingsForm extends ConfigFormBase {
  
  /** 
   * Config settings.
   *
   * @var string
   */
  const SETTINGS = 'bootcamp.settings';

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'bootcamp_admin_settings';
  }
 
  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return [
      'bootcamp.settings',
    ];
  }
 
  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $config = $this->config('bootcamp.settings');
 
    $form['bootcamp_api_key'] = array(
      '#type' => 'textfield',
      '#title' => $this->t('Что вывести на странице thank you'),
      '#default_value' => $config->get('bootcamp_api_key'),
    );
 
    return parent::buildForm($form, $form_state);
  }
 
  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    // Retrieve the configuration
    $this->configFactory->getEditable('bootcamp.settings')
      // Set the submitted configuration setting
      ->set('bootcamp_api_key', $form_state->getValue('bootcamp_api_key'))
      ->save();
 
    parent::submitForm($form, $form_state);
  }
}