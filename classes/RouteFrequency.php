<?php

namespace mauriziocingolani\lkns\classes;

/**
 * Description of RouteFrequency
 *
 * @property string $departureDate The format is YYYY-MM-DD
 * @property Company[] $companies Optional. The companies operating the trip.
 * 
 * @author Maurizio Cingolani <mauriziocingolani74@gmail.com>
 * @version 1.0
 */
class RouteFrequency {

    public $departureDate;
    public $companies;

    /* Metodi */

    public function __construct($params) {
        foreach ($params as $name => $value) {
            if ($name == 'companies') :
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
