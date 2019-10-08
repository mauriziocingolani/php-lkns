<?php

namespace mauriziocingolani\lkns\classes;

/**
 * Description of QuoteRequest
 *
 * @property integer $passengers
 * @property integer $vehicles
 * @property integer $pets
 * 
 * @author Maurizio Cingolani <mauriziocingolani74@gmail.com>
 * @version 1.0
 */
class QuoteRequest {

    public $passengers;
    public $vehicles;
    public $pets;

    /* Metodi */

    public function __construct($params) {
        foreach ($params as $name => $value) {
            $this->$name = $value;
        }
    }

    /* Metodi statici */
}
