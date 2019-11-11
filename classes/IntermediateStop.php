<?php

namespace mauriziocingolani\lkns\classes;

/**
 * Description of IntermediateStop
 *
 * @property string $originIdOrCode The abbreviation of the origin’s location (Location#idOrCode).
 * @property string $destinationIdOrCode The abbreviation of the destination’s location (Location#idOrCode).
 * @property string $departureDateTime The format is YYYY-MM-DD HH:MM.
 * @property string $departureDateTimeWithTimezone The format is YYYY-MM-DD’T’HH:MM:SS.SSZZ.
 * @property string $arrivalDateTime The format is YYYY-MM-DD HH:MM.
 * @property string $arrivalDateTimeWithTimezone The format is YYYY-MM-DD’T’HH:MM:SS.SSZZ.
 * @property integer $duration The duration of the trip, in minutes
 * @property Vessel $vessel 
 * 
 * @author Maurizio Cingolani <mauriziocingolani74@gmail.com>
 * @version 1.0
 */
class IntermediateStop {

    public $originIdOrCode;
    public $destinationIdOrCode;
    public $departureDateTime;
    public $departureDateTimeWithTimezone;
    public $arrivalDateTime;
    public $arrivalDateTimeWithTimezone;
    public $duration;
    public $vessel;

    /* Metodi */

    public function __construct($params) {
        foreach ($params as $name => $value) {
            if($name == 'vessel' && isset($value)) :
                $this->vessel = new Vessel($value);
            else:
                $this->$name = $value;
            endif;
        }
    }

    /* Metodi statici */
}
