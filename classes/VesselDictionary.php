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
            if ($name == 'details' && isset($value)) :
                $details = [];
                foreach ($value as $key => $t) :
                    $details[$key] = $t;
                endforeach;
                $details = (object)$details;
                $this->details = $details;
            elseif ($name == 'accommodationFacilities' && isset($value)) :
                $accommodationFacilities = [];
                foreach ($value as $key => $t) :
                    $accommodationFacilities[$key] = $t;
                endforeach;
                $accommodationFacilities = (object)$accommodationFacilities;
                $this->accommodationFacilities = $accommodationFacilities;
            else:
                $this->$name = $value;
            endif;
        }
    }

    /* Metodi statici */
}
