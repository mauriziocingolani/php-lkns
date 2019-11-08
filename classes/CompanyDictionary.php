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
            if ($name == 'accommodations') :
                $this->accommodations = new AccomodationDictionary($value);
            elseif ($name == 'discounts') :
                $this->discounts = new DiscountDictionary($value);
            elseif ($name == 'fareCodes') :
                $fareCodes = [];
                foreach ($value as $key => $t) :
                    $fareCodes[$key] = new Fare($t);
                endforeach;
                $fareCodes = (object)$fareCodes;
                $this->fareCodes = $fareCodes;
            elseif ($name == 'passengerTypes') :
                $passengerTypes = [];
                foreach ($value as $key => $t) :
                    $passengerTypes[$key] = new PassengerType($t);
                endforeach;
                $passengerTypes = (object)$passengerTypes;
                $this->passengerTypes = $passengerTypes;
            elseif ($name == 'vessels') :
                $vessels = [];
                foreach ($value as $key => $t) :
                    $vessels[$key] = new VesselDictionary($t);
                endforeach;
                $vessels = (object)$vessels;
                $this->vessels = $vessels;
            else :
                $this->$name = $value;
            endif;
        }
    }

    /* Metodi statici */
}
