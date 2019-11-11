<?php

namespace mauriziocingolani\lkns\classes;

/**
 * Description of Vessel
 *
 * @property string $idOrCode
 * @property string $name
 * @property Company $company
 * @property boolean $hasGarage
 * @property boolean $hasCabins
 * @property string $type
 * @property string $infantAccommodationIdOrCode
 * 
 * @author Maurizio Cingolani <mauriziocingolani74@gmail.com>
 * @version 1.0
 */
class Vessel {

    public $idOrCode;
    public $name;
    public $company;
    public $hasGarage;
    public $hasCabins;
    public $type;
    public $infantAccommodationIdOrCode;

    /* Metodi */

    public function __construct($params) {
        foreach ($params as $name => $value) {
            if ($name == 'company' && isset($value)) :
                $this->company = new Company($value);
            else :
                $this->$name = $value;
            endif;
        }
    }

    /* Metodi statici */
}
