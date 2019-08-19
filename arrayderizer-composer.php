<?php

/*
 * Arrayderizer Composer
 * 
 * Copyright Ricard P. Barnes 2019.
 * https://github.com/ricardbarnes
 * 
 * Distributed under the MIT License.
 * https://opensource.org/licenses/MIT
 * 
 * For further information, please refer to the accompanying README.md file
 * 
 */

require_once 'phtml/phtml-builder.php';

/**
 * Element composer class
 *
 * @author Ricard P. Barnes
 */
class Composer extends Phtml {

    function setElements($element_array) {
        if (!empty($element_array)) {
            foreach ($element_array as $element_info) {
                $new_element = new Composer();
                $new_element->setName($element_info['element']);
                if (array_key_exists('elements', $element_info)) {
                    $new_element->setElements($element_info['elements']);
                }
                if (array_key_exists('attributes', $element_info)) {
                    $new_element->setAttributes($element_info['attributes']);
                }
                if (array_key_exists('text', $element_info)) {
                    $new_element->setText($element_info['text']);
                }
                $this->addElement($new_element);
            }
        }
        return $this;
    }

    function setAttributes($attr_info) {
        if (!empty($attr_info)) {
            foreach ($attr_info as $key => $value) {
                $this->addAttribute($key, $value);
            }
        }
        return $this;
    }

}
