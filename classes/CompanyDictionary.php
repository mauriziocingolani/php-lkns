<?php

namespace mauriziocingolani\lkns\classes;

/**
 * Description of CompanyDictionary
 *
 * @property string $name
 * @property string $imageUrl
 * @property AccomodationDictionary $accommodations
 * @property DiscountDictionary $discounts
 * @property Fare[] $fareCodes
 * @property PassengerType[] $passengerTypes
 * @property VesselDictionary[] $vessels
 * 
 * @author Maurizio Cingolani <mauriziocingolani74@gmail.com>
 * @version 1.0
 */
class CompanyDictionary {

    public $name;
    public $imageUrl;
    public $accommodations;
    public $discounts;
    public $fareCodes;
    public $passengerTypes;
    public $vessels;

    /* Metodi */

    public function __construct($params) {
        foreach ($params as $name => $value) {
            if ($name == 'accommodations' && isset($value)) :
                $this->accommodations = new AccomodationDictionary($value);
            elseif ($name == 'discounts' && isset($value)) :
                $this->discounts = new DiscountDictionary($value);
            elseif ($name == 'fareCodes' && isset($value)) :
                $fareCodes = [];
                foreach ($value as $key => $t) :
                    $fareCodes[$key] = new Fare($t);
                endforeach;
                if(count($fareCodes)):
                    $fareCodes = (object)$fareCodes;
                    $this->fareCodes = $fareCodes;
                endif;
            elseif ($name == 'passengerTypes' && isset($value)) :
                $passengerTypes = [];
                foreach ($value as $key => $t) :
                    $passengerTypes[$key] = new PassengerType($t);
                endforeach;
                if(count($passengerTypes)):
                    $passengerTypes = (object)$passengerTypes;
                    $this->passengerTypes = $passengerTypes;
                endif;
            elseif ($name == 'vessels' && isset($value)) :
                $vessels = [];
                foreach ($value as $key => $t) :
                    $vessels[$key] = new VesselDictionary($t);
                endforeach;
                if(count($vessels)):
                    $vessels = (object)$vessels;
                    $this->vessels = $vessels;
                endif;
            else :
                $this->$name = $value;
            endif;
        }
    }

    /* Metodi statici */
}
