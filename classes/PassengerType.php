<?php

namespace mauriziocingolani\lkns\classes;

/**
 * Description of PassengerType
 *
 * @property string $type Passenger’s type.
 * @property string $name Passenger’s type name.
 * @property string $description Passenger’s type description.
 * @property integer $minAge Passenger’s type minimum age.
 * @property integer $maxAge Passenger’s type maximum age.
 * @property Accommodation[] $accomodations Passenger’s accomodations.
 * @property Discount[] $discounts Passenger’s associated discounts.
 * 
 * @author Maurizio Cingolani <mauriziocingolani74@gmail.com>
 * @version 1.0
 */
class PassengerType {

    public $type;
    public $name;
    public $description;
    public $minAge;
    public $maxAge;
    public $accomodations;
    public $discounts;

    /* Metodi */

    public function __construct($params) {
        foreach ($params as $name => $value) {
            if ($name == 'accomodations') :
                foreach ($value as $acc) :
                    $this->accomodations[] = new Accommodation($acc);
                endforeach;
            elseif ($name == 'discounts') :
                foreach ($value as $dis) :
                    $this->discounts[] = new Discount($dis);
                endforeach;
            else :
                $this->$name = $value;
            endif;
        }
    }

    /* Metodi statici */
}
