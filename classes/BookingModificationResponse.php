<?php

namespace mauriziocingolani\lkns\classes;

/**
 * Description of BookingModificationResponse
 *
 * @property string $code
 * @property string $message
 * @property boolean $severeError If an error is returned, it shows whether is severe or not.
 * @property boolean $success Booking modification success status.
 * 
 * @author Maurizio Cingolani <mauriziocingolani74@gmail.com>
 * @version 1.0
 */
class BookingModificationResponse {

    public $code;
    public $message;
    public $severeError;
    public $success;

    /* Metodi */

    public function __construct($params) {
        foreach ($params as $name => $value) {
            $this->$name = $value;
        }
    }

    /* Metodi statici */
}
