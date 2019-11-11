<?php

namespace mauriziocingolani\lkns\classes;

/**
 * Description of Location
 *
 * @property string $idOrCode The location’s id or code.
 * @property string $name The location’s name.
 * @property Country $country
 * @property string $locationType The location’s type. Possible values are HARBOUR, GENERIC_LOCATION, BUS_STOP etc.
 * @property float $latitude The location’s latitude.
 * @property float $longitude The location’s longitude.
 * @property LocationLanguage[] $locationLanguages The location’s languages. For Admin usage
 * @property Area[] $areas
 *
 * @author Maurizio Cingolani <mauriziocingolani74@gmail.com>
 * @version 1.0
 */
class Location {
    public $idOrCode;
    public $name;
    public $country;
    public $locationType;
    public $latitude;
    public $longitude;
    public $locationLanguages = [];
    public $areas = [];

    /* Metodi */

    public function __construct($params) {
        foreach ($params as $name => $value) {
            if ($name == 'country' && isset($value)) :
                $this->country = new Country($value);
            elseif (in_Array($name, ['latitude', 'longitude']) && isset($value)) :
                $this->$name = (float) $value;
            elseif ($name == 'locationLanguages' && isset($value)) :
                foreach ($value as $ll) :
                    $this->locationLanguages[] = new LocationLanguage($ll);
                endforeach;    
            elseif ($name == 'areas' && isset($value)) :
                foreach ($value as $a) :
                    $this->areas[] = new Area($a);
                endforeach;
            else :
                $this->$name = $value;
            endif;
        }
    }

    /* Metodi statici */

    public static function GetLocationTypeValues() {
        return ['AIRPORT', 'HARBOUR', 'RAILWAY', 'COUNTRY', 'AREA', 'HOTEL', 'GENERIC_LOCATION', 'BUS_STOP'];
    }
}
