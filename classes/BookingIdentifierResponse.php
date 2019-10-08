<?php

namespace mauriziocingolani\lkns\classes;

/**
 * Description of BookingIdentifierResponse
 *
 * @property string $code
 * @property string $message
 * @property boolean $severeError If an error is returned, it shows whether is severe or not.
 * @property string $bookingIdentifier Unique booking identifier.
 * 
 * @author Maurizio Cingolani <mauriziocingolani74@gmail.com>
 * @version 1.0
 */
class BookingIdentifierResponse {

    public $code;
    public $message;
    public $severeError;
    public $bookingIdentifier;

    /* Metodi */

    public function __construct($params) {
        foreach ($params as $name => $value) {
            $this->$name = $value;
        }
    }

    /* Metodi statici */
}
