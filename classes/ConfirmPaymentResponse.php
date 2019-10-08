<?php

namespace mauriziocingolani\lkns\classes;

/**
 * Description of ConfirmPaymentResponse
 *
 * @property string $code
 * @property string $message
 * @property boolean $severeError If an error is returned, it shows whether is severe or not.
 * @property integer $crsReservationId FOTHcrs’ unique identification number.
 * 
 * @author Maurizio Cingolani <mauriziocingolani74@gmail.com>
 * @version 1.0
 */
class ConfirmPaymentResponse {

    public $code;
    public $message;
    public $severeError;
    public $crsReservationId;

    /* Metodi */

    public function __construct($params) {
        foreach ($params as $name => $value) {
            $this->$name = $value;
        }
    }

    /* Metodi statici */
}
