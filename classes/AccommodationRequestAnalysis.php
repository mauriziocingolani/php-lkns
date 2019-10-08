<?php

namespace mauriziocingolani\lkns\classes;

/**
 * Description of AccommodationRequestAnalysis
 *
 * @property integer $index
 * @property string $discountIdOrCode
 * @property string $discountDocument
 * @property string $specialType
 * @property string $loyaltyCard
 * @property string $promotionalCode
 * @property string $fareIdOrCode
 * @property PassengerData $passengerData
 * @property VehicleData $vehicleData
 * 
 * @author Maurizio Cingolani <mauriziocingolani74@gmail.com>
 * @version 1.0
 */
class AccommodationRequestAnalysis {

    public $index;
    public $discountIdOrCode;
    public $discountDocument;
    public $specialType;
    public $loyaltyCard;
    public $promotionalCode;
    public $fareIdOrCode;
    public $passengerData;
    public $vehicleData;

    /* Metodi */

    public function __construct($params) {
        foreach ($params as $name => $value) {
            if ($name == 'passengerData') :
                $this->passengerData = new PassengerData($value);
            elseif ($name == 'vehicleData') :
                $this->vehicleData = new VehicleData($value);
            else :
                $this->$name = $value;
            endif;
        }
    }

    /* Metodi statici */
}
