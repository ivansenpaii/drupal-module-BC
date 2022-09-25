<?php

/**
 * @file
 * Contains \Drupal\Bootcamp\Plugin\Block\BlockBox.
 */

// Пространство имён для нашего блока.
namespace Drupal\Bootcamp\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * @Block(
 *   id = "block_box",
 *   admin_label = @Translation("BlockBox"),
 * )
 */
class PrintMyMessages extends BlockBase {

  /**
   * Добавляем наши конфиги по умолчанию.
   *
   * {@inheritdoc}
   */
  public function defaultConfiguration() {
    return array(
      'message' => 'Hello World!',
    );
  }

  /**
   * Добавляем в стандартную форму блока свои поля.
   *
   * {@inheritdoc}
   */
  public function blockForm($form, FormStateInterface $form_state) {
    // Получаем оригинальную форму для блока.
    $form = parent::blockForm($form, $form_state);
    // Получаем конфиги для данного блока.
    $config = $this->getConfiguration();

    // Добавляем поле для ввода сообщения.
    $form['message'] = array(
      '#type' => 'text_format',
      '#allowed_formats' => ['full_html' => 'full_html'],
      '#title' => t('Message to printing'),
      '#default_value' => isset($config['message']['value']) ? $config['message']['value'] : '',
    );

    return $form;
  }

  /**
   * 
   * 
   * 
   *
   * {@inheritdoc}
   */
  public function blockValidate($form, FormStateInterface $form_state) {
    $message = $form_state->getValue('message');


  }

  /**
   * В субмите мы лишь сохраняем наши данные.
   *
   * {@inheritdoc}
   */
  public function blockSubmit($form, FormStateInterface $form_state) {
    $this->configuration['message']['value'] = $form_state->getValue('message');
  }

  /**
   * Генерируем и выводим содержимое блока.
   * 
   * {@inheritdoc}
   */
  public function build() {
    $config = $this->getConfiguration();

      $message .= $config['message']['value'] . '<br />';


    $block = [
      '#type' => 'markup',
      '#markup' => $message,
    ];
    return $block;
  }

}