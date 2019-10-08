<?php

namespace mauriziocingolani\lkns\classes;

/**
 * Description of AccommodationAvailability
 *
 * @property Accommodation $accommodation
 * @property string $availabilityType
 * @property integer $adultBasePrice
 * @property integer $wholeBerthAvailability
 * @property integer $maleBerthAvailability
 * @property integer $femaleBerthAvailability
 * @property string $priceList1
 * @property string $priceList2
 * @property PassengerType $passengerType
 * 
 * @author Maurizio Cingolani <mauriziocingolani74@gmail.com>
 * @version 1.0
 */
class AccommodationAvailability {

    public $accommodation;
    public $availabilityType;
    public $adultBasePrice;
    public $wholeBerthAvailability;
    public $maleBerthAvailability;
    public $femaleBerthAvailability;
    public $priceList1;
    public $priceList2;
    public $passengerType;

    /* Metodi */

    public function __construct($params) {
        foreach ($params as $name => $value) {
            if ($name == 'accommodation') :
                $this->accommodation = new Accommodation($value);
            elseif ($name == 'passengerType') :
                $this->passengerType = new PassengerType($value);
            else :
                $this->$name = $value;
            endif;
        }
    }

    /* Metodi statici */

    public static function getAvailabilityTypeValues() {
        return ['CABIN', 'SEAT', 'GARAGE'];
    }

}
