<?php

namespace mauriziocingolani\lkns\classes;

/**
 * Description of OptionalBookingResponse
 *
 * @property string $code
 * @property string $message
 * @property boolean $severeError If an error is returned, it shows whether is severe or not.
 * @property integer $crsReservationId FORTHcrs’ unique identification number.
 * @property string $optionDateTime The format is YYYY-MM-DD HH:MM.
 * 
 * @author Maurizio Cingolani <mauriziocingolani74@gmail.com>
 * @version 1.0
 */
class OptionalBookingResponse {

    public $code;
    public $message;
    public $severeError;
    public $crsReservationId;
    public $optionDateTime;

    /* Metodi */

    public function __construct($params) {
        foreach ($params as $name => $value) {
            $this->$name = $value;
        }
    }

    /* Metodi statici */
}
