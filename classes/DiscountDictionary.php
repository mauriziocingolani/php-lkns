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
            if ($name == 'vehicles') :
                foreach ($value as $v) :
                    $this->vehicles[] = new Discount($v);
                endforeach;
            endif;
        }
    }

    /* Metodi statici */
}
