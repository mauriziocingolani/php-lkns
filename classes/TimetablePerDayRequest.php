<?php

namespace mauriziocingolani\lkns\classes;

/**
 * Description of TimetablePerDayRequest
 *
 * @property string $departureDate The format is YYYY-MM-DD.
 * @property string $departureTime Optional. The hour of date, to search. Possible values are 0 to 23.
 * @property string $originIdOrCode The abbreviation of the origin’s location (Location#idOrCode).
 * @property string $destinationIdOrCode Optional. The abbreviation of the origin’s location (Location#idOrCode).
 * @property Company $company
 * @property string $sorting Sets the sorting type of results. Possible values are: BY_DEPARTURE_TIME, BY_ARRIVAL_TIME, BY_FASTEST_ROUTE.
 * @property integer $daysToSearch Optional. Used, only, in doTripsPerDay method. Sets the number of days to search for trips, prior and after “departureDate”.
 * 
 * @author Maurizio Cingolani <mauriziocingolani74@gmail.com>
 * @version 1.0
 */
class TimetablePerDayRequest {

    public $departureDate;
    public $departureTime;
    public $originIdOrCode;
    public $destinationIdOrCode;
    public $company;
    public $sorting;
    public $daysToSearch;

    /* Metodi */

    public function __construct($params) {
        foreach ($params as $name => $value) {
            if ($name == 'company') :
                $this->company = new Company($value);
            else :
                $this->$name = $value;
            endif;
        }
    }

    /* Metodi statici */

    public static function GetSortingValues() {
        return ['BY_DEPARTURE_TIME', 'BY_ARRIVAL_TIME', 'BY_FASTEST_ROUTE'];
    }

}
