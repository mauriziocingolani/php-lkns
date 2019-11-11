<?php

namespace mauriziocingolani\lkns\classes;

/**
 * Description of Agency
 *
 * @property integer $id Agency Id
 * @property string $representative Representative Agency
 * @property string $address Agency Address
 * @property string $city City of Agency
 * @property string $countryCode Country Code
 * @property string $zipcode Zipcode of Agency
 * @property string $afm Vat Number
 * @property string $commerceName Commercial Name
 * @property string $phone Phone
 * @property AgencyUser[] $agencyUsers List of Agency Users
 * 
 * @author Maurizio Cingolani <mauriziocingolani74@gmail.com>
 * @version 1.0
 */
class Agency {

    public $id;
    public $representative;
    public $address;
    public $city;
    public $countryCode;
    public $zipcode;
    public $afm;
    public $commerceName;
    public $phone;
    public $agencyUsers = [];

    /* Metodi */

    public function __construct($params) {
        foreach ($params as $name => $value) {
            if($name == 'agencyUsers') :
                foreach($value as $agency):
                    $this->agencyUsers[] = new Agency($agency);
                endforeach;
            else:
                $this->$name = $value;
            endif;
        }
    }

    /* Metodi statici */
}
