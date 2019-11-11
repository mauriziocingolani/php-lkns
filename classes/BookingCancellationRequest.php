<?php

namespace mauriziocingolani\lkns\classes;

/**
 * Description of BookingCancellationRequest
 *
 * @property string $code
 * @property string $message
 * @property boolean $severeError If an error is returned, it shows whether is severe or not.
 * @property integer $crsReservationId FORTHcrs’ unique identification number.
 * @property boolean $askForFees if set to true, then the response will contain the cancellation fees. The items of the booking will be cancelled only if the value is set to false
 * @property Trip[] $trips The booking’s trips.
 * 
 * @author Maurizio Cingolani <mauriziocingolani74@gmail.com>
 * @version 1.0
 */
class BookingCancellationRequest {

    public $code;
    public $message;
    public $severeError;
    public $crsReservationId;
    public $askForFees;
    public $trips = [];

    /* Metodi */

    public function __construct($params) {
        foreach ($params as $name => $value) {
            if ($name == 'trips') :
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
