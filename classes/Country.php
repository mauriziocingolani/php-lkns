<?php

namespace mauriziocingolani\lkns\classes;

/**
 * Description of Country
 *
 * @property string $idOrCode The country’s id or code.
 * @property string $name The location’s name.
 * @property string[] $telephonePrefix The phone code.
 * 
 * @author Maurizio Cingolani <mauriziocingolani74@gmail.com>
 * @version 1.0
 */
class Country {

    public $idOrCode;
    public $name;
    public $telephonePrefix;

    /* Metodi */

    public function __construct($params) {
        foreach ($params as $name => $value) {
            $this->$name = $value;
        }
    }

    /* Metodi statici */
}
