<?php

namespace mauriziocingolani\lkns\classes;

/**
 * Description of TripsWithDictionary
 *
 * @property string $code
 * @property string $message
 * @property boolean $severeError If an error is returned, it shows whether is severe or not.
 * @property Trip[] $trips
 * @property Location[] $locations
 * @property CompanyDictionary[] $companies
 * 
 * @author Maurizio Cingolani <mauriziocingolani74@gmail.com>
 * @version 1.0
 */
class TripsWithDictionary {

    public $code;
    public $message;
    public $severeError;
    public $trips;
    public $locations;
    public $companies;

    /* Metodi */

    public function __construct($params) {
        foreach ($params as $name => $value) {
            if ($name == 'trips') :
                foreach ($value as $t) :
                    $this->trips[] = new Trip($t);
                endforeach;
            elseif ($name == 'locations') :
                foreach ($value as $l) :
                    $this->locations[] = new Location($l);
                endforeach;
            elseif ($name == 'companies') :
                foreach ($value as $cd) :
                    $this->companies[] = new CompanyDictionary($cd);
                endforeach;
            else :
                $this->$name = $value;
            endif;
        }
    }

    /* Metodi statici */
}
