<?php

namespace mauriziocingolani\lkns\classes;

/**
 * Description of VesselDictionary
 *
 * @property string $name
 * @property string[] $details
 * @property string[] $accommodationFacilities
 * 
 * @author Maurizio Cingolani <mauriziocingolani74@gmail.com>
 * @version 1.0
 */
class VesselDictionary {

    public $name;
    public $details;
    public $accommodationFacilities;

    /* Metodi */

    public function __construct($params) {
        foreach ($params as $name => $value) {
            $this->$name = $value;
        }
    }

    /* Metodi statici */
}
