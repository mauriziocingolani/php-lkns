<?php

namespace mauriziocingolani\lkns\classes;

/**
 * Description of Language
 *
 * @property integer $id
 * @property string $code
 * @property string $name
 *
 * @author Maurizio Cingolani <mauriziocingolani74@gmail.com>
 * @version 1.0
 */
class Language {
    public $id;
    public $code;
    public $name;

    /* Metodi */

    public function __construct($params) {
        foreach ($params as $name => $value) {
            $this->$name = $value;
        }
    }

    /* Metodi statici */
}
