<?php

namespace mauriziocingolani\lkns\classes;

/**
 * Description of ResidentValidationRequest
 *
 * @property Company $company
 * @property PassengerData[] $passengerData
 * 
 * @author Maurizio Cingolani <mauriziocingolani74@gmail.com>
 * @version 1.0
 */
class ResidentValidationRequest {

    public $company;
    public $passengerData;

    /* Metodi */

    public function __construct($params) {
        foreach ($params as $name => $value) {
            if ($name == 'company') :
                $this->company = new Company($value);
            elseif ($name == 'passengerData') :
                foreach ($value as $pd) :
                    $this->passengerData[] = new PassengerData($pd);
                endforeach;
            endif;
        }
    }

    /* Metodi statici */
}
