<?php

namespace mauriziocingolani\lkns\classes;

/**
 * Description of ResidentValidationResponse
 *
 * @property string $code
 * @property string $message
 * @property boolean $severeError If an error is returned, it shows whether is severe or not.
 * @property Company $company
 * @property PassengerData[] $passengerData The Passenger List Data.
 * 
 * @author Maurizio Cingolani <mauriziocingolani74@gmail.com>
 * @version 1.0
 */
class ResidentValidationResponse {

    public $code;
    public $message;
    public $severeError;
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
            else :
                $this->$name = $value;
            endif;
        }
    }

    /* Metodi statici */
}
