<?php

namespace mauriziocingolani\lkns\classes;

/**
 * Description of RouteFrequencyRequest
 *
 * @property boolean $fetchCompanies If the value is set to true, the corresponding company data will be displayed in the result data.
 * @property Location $origin
 * @property Location $destination
 * @property Company[] $companies Optional. The companies to search data for.
 * 
 * @author Maurizio Cingolani <mauriziocingolani74@gmail.com>
 * @version 1.0
 */
class RouteFrequencyRequest {

    public $fetchCompanies;
    public $origin;
    public $destination;
    public $companies;

    /* Metodi */

    public function __construct($params) {
        foreach ($params as $name => $value) {
            if (in_Array($name, ['origin', 'destination'])) :
                $this->$name = new Location($value);
            elseif ($name == 'companies') :
                foreach ($value as $c) :
                    $this->companies[] = new Company($c);
                endforeach;
            else :
                $this->$name = $value;
            endif;
        }
    }

    /* Metodi statici */
}
