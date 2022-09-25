<?php

/**
 * @return
 * Contains \Drupal\drupalbook\Controller\ThankYou.
 */
 
namespace Drupal\bootcamp\Controller;
 
/**
 * Provides route responses for the bootcamp module.
 */




class ThankYou {
 
    public function defaultConfiguration() {
        
        $element = array(        
            '#markup' => '<h2 class="text-center">Спасибо за вашу заявку!</h2>',    
        );

        return $element;
    }



  /**
   * Returns a simple page.
   *
   * @return array
   *   A simple renderable array.
   */
    public function content() {
        $config = \Drupal::config('bootcamp.settings');

        $thanks = $config->get('bootcamp_api_key');
        if ( $thanks == NULL):
            
            $element = array(        
                '#markup' => '<h2 class="text-center">Спасибо за вашу заявку!</h2>',    
            );  

        elseif ($thanks !== NULL):

            $element = array(        
            '#markup' => $thanks,    
            );
            
        endif;

        return $element;
    }
 
}