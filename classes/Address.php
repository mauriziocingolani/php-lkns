<?php

namespace mauriziocingolani\lkns\classes;

/**
 * Description of Address
 *
 * @property string $line
 * @property string $zipCode
 * @property string $city
 * @property string $country
 * 
 * @author Maurizio Cingolani <mauriziocingolani74@gmail.com>
 * @version 1.0
 */
class Address {

    public $line;
    public $zipCode;
    public $city;
    public $country;

    /* Metodi */

    public function __construct($params) {
        foreach ($params as $name => $value) {
            $this->$name = $value;
        }
    }

    /* Metodi statici */
}
