<?php

/*
 * Arrayderizer Handler
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

require_once 'arrayderizer-composer.php';

/**
 * Rendering handler
 *
 * @author Ricard P. Barnes
 */
class Renderizer {

    private $data;
    private $renderized;

    function getData() {
        return $this->data;
    }

    function getRenderized() {
        return $this->renderized;
    }

    function setData($data) {
        $this->data = $data;
    }

    function setRenderized($renderized) {
        $this->renderized = $renderized;
    }

    public function renderize() {
        $aux = [];
        $aux[0] = $this->data; // Fits the array to the Composer object recursivity needings
        
        if ($aux[0]['element'] === 'html') {
            $doctype = new Composer('!DOCTYPE');
            $doctype->addAttribute('html', null);
            $root = new Composer('root');
            $root->setElements($aux);
            $this->renderized = $doctype . $root->getElements()[0];
        } else {
            $this->renderized = new Composer($aux[0]['element']);
            $this->renderized->setElements($aux);
        }
    }

}
