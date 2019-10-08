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
                foreach ($value as $fc) :
                    $this->fareCodes[] = new Fare($fc);
                endforeach;
            elseif ($name == 'passengerTypes') :
                foreach ($value as $pt) :
                    $this->passengerTypes[] = new PassengerType($pt);
                endforeach;
            elseif ($name == 'vessels') :
                foreach ($value as $v) :
                    $this->vessels[] = new VesselDictionary($v);
                endforeach;
            else :
                $this->$name = $value;
            endif;
        }
    }

    /* Metodi statici */
}
