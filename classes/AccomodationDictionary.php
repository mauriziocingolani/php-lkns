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
            if ($name == 'passengers') :
                foreach ($value as $p) :
                    $this->passengers[] = new Accommodation($p);
                endforeach;
            elseif ($name == 'vehicles') :
                foreach ($value as $v) :
                    $this->vehicles[] = new Accommodation($v);
                endforeach;
            endif;
        }
    }

    /* Metodi statici */
}
