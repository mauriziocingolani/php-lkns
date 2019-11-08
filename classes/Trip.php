<?php

namespace mauriziocingolani\lkns\classes;

/**
 * Description of Trip
 *
 * @property string $code
 * @property string $message
 * @property boolean $severeError If an error is returned, it shows whether is severe or not.
 * @property string $departureDateTime The format is YYYY-MM-DD HH:MM.
 * @property string $departureDateTimeWithTimezone The format is YYYY-MM-DD’T’HH:MM:SS.SSZZ.
 * @property string $arrivalDateTime The format is YYYY-MM-DD HH:MM.
 * @property string $arrivalDateTimeWithTimezone The format is YYYY-MM-DD’T’HH:MM:SS.SSZZ.
 * @property integer $duration The duration of the trip, in minutes
 * @property Location $origin
 * @property Location $destination
 * @property Vessel $vessel
 * @property string $seasonName Optional. The trip’s seasonality data.
 * @property AccommodationAvailability[] $accommodationAvailabilities
 * @property IntermediateStop[] $intermediateStops Optional. The trip analysis.
 * @property AdditionalService[] $additionalServices
 * @property AccommodationRequest[] $accommodationRequests Optional. The list of passengers. Used in doBooking method.
 * @property Price[] $prices Optional. Used in doPricing method.
 * @property Price[] $discountPrices Optional. Used in doPricing method.
 * @property Ticket[] $tickets Optional. The booking’s ticket details. Used in doBooking method.
 * @property string $companyReservationCode Optional. The booking’s unique identification number at the operator’s system. Used in doBooking method.
 * @property string $remarks
 * @property string $optionDateTime
 * @property Passenger[] $passengers
 * @property Vehicle[] $vehicles
 * @property integer $basicPrice basic price of the quote
 * @property integer $discountPrice price of the quote with possible discount
 * @property BookingValidation $bookingValidation
 * 
 * @author Maurizio Cingolani <mauriziocingolani74@gmail.com>
 * @version 1.0
 */
class Trip {

    public $code;
    public $message;
    public $severeError;
    public $departureDateTime;
    public $departureDateTimeWithTimezone;
    public $arrivalDateTime;
    public $arrivalDateTimeWithTimezone;
    public $duration;
    public $origin;
    public $destination;
    public $vessel;
    public $seasonName;
    public $accommodationAvailabilities = [];
    public $intermediateStops = [];
    public $additionalServices = [];
    public $accommodationRequests = [];
    public $prices = [];
    public $discountPrices = [];
    public $tickets = [];
    public $companyReservationCode;
    public $remarks;
    public $optionDateTime;
    public $passengers = [];
    public $vehicles = [];
    public $basicPrice;
    public $discountPrice;
    public $bookingValidation;

    /* Metodi */

    public function __construct($params) {
        foreach ($params as $name => $value) {
            if ($name == 'vessel') :
                $this->vessel = new Vessel($value);
            elseif (in_Array($name, ['origin', 'destination'])) :
                $this->$name = new Location($value);;
            elseif ($name == 'accommodationAvailabilities') :
                foreach ($value as $accA) :
                    $this->accommodationAvailabilities[] = new AccommodationAvailability($accA);
                endforeach;
            elseif ($name == 'intermediateStops') :
                foreach ($value as $int) :
                    $this->intermediateStops[] = new IntermediateStop($int);
                endforeach;
            elseif ($name == 'additionalServices') :
                foreach ($value as $add) :
                    $this->additionalServices[] = new AdditionalService($add);
                endforeach;
            elseif ($name == 'accommodationRequests') :
                foreach ($value as $accR) :
                    $this->accommodationRequests[] = new AccommodationRequest($accR);
                endforeach;
            elseif ($name == 'prices') :
                foreach ($value as $p) :
                    $this->prices[] = new Price($p);
                endforeach;
            elseif ($name == 'discountPrices') :
                foreach ($value as $dp) :
                    $this->discountPrices[] = new Price($dp);
                endforeach;
            elseif ($name == 'tickets') :
                foreach ($value as $t) :
                    $this->tickets[] = new Ticket($t);
                endforeach;
            elseif ($name == 'passengers') :
                foreach ($value as $pass) :
                    $this->passengers[] = new Passenger($pass);
                endforeach;
            elseif ($name == 'vehicles') :
                foreach ($value as $v) :
                    $this->vehicles[] = new Vehicle($v);
                endforeach;
            elseif ($name == 'bookingValidation') :
                    $this->bookingValidation = new BookingValidation($value);
            else :
                $this->$name = $value;
            endif;
        }
    }

    /* Metodi statici */
}
