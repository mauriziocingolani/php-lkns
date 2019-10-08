<?php

namespace mauriziocingolani\lkns\classes;

/**
 * Description of Image
 *
 * @property integer $id
 * @property string $url
 *
 * @author Maurizio Cingolani <mauriziocingolani74@gmail.com>
 * @version 1.0
 */
class Image {

    public $id;
    public $url;

    /* Metodi */

    public function __construct($params) {
        foreach ($params as $name => $value) {
            $this->$name = $value;
        }
    }

    /* Metodi statici */
}
