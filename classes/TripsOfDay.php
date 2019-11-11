<?php

namespace mauriziocingolani\lkns\classes;

/**
 * Description of TripsOfDay
 *
 * @property string $departureDate The format is YYYY-MM-DD.
 * @property Trip[] $trips The trips departing on “departureDate”.
 * 
 * @author Maurizio Cingolani <mauriziocingolani74@gmail.com>
 * @version 1.0
 */
class TripsOfDay {

    public $departureDate;
    public $trips = [];

    /* Metodi */

    public function __construct($params) {
        foreach ($params as $name => $value) {
            if ($name == 'trips' && isset($value)) :
                foreach ($value as $t) :
                    $this->trips[] = new Trip($t);
                endforeach;
            else :
                $this->$name = $value;
            endif;
        }
    }

    /* Metodi statici */
}
