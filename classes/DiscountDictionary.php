<?php

namespace mauriziocingolani\lkns\classes;

/**
 * Description of DiscountDictionary.
 *
 * @property Discount[] $vehicles
 * 
 * @author Maurizio Cingolani <mauriziocingolani74@gmail.com>
 * @version 1.0
 */
class DiscountDictionary {

    public $vehicles;

    /* Metodi */

    public function __construct($params) {
        foreach ($params as $name => $value) {
            if ($name == 'vehicles' && isset($value)) :
                $vehicles = [];
                foreach ($value as $v => $t) :
                    $vehicles[$v] = new Discount($t);
                endforeach;
                if(count($vehicles)):
                    $vehicles = (object)$vehicles;
                    $this->vehicles = $vehicles;
                endif;
            endif;
        }
    }

    /* Metodi statici */
}
