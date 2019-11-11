<?php

namespace mauriziocingolani\lkns\classes;

/**
 * Description of AccomodationDictionary
 *
 * @property Accommodation[] $passengers
 * @property Accommodation[] $vehicles
 * 
 * @author Maurizio Cingolani <mauriziocingolani74@gmail.com>
 * @version 1.0
 */
class AccomodationDictionary {

    public $passengers;
    public $vehicles;

    /* Metodi */

    public function __construct($params) {
        foreach ($params as $name => $value) {
            if ($name == 'passengers' && isset($value)) :
                $passengers = [];
                foreach ($value as $key => $t) :
                    $passengers[$key] = new Accommodation($t);
                endforeach;
                $passengers = (object)$passengers;
                $this->passengers = $passengers;
            elseif ($name == 'vehicles' && isset($value)) :
                $vehicles = [];
                foreach ($value as $key => $t) :
                    $vehicles[$key] = new Accommodation($t);
                endforeach;
                $vehicles = (object)$vehicles;
                $this->vehicles = $vehicles;
            endif;
        }
    }

    /* Metodi statici */
}
