<?php

namespace mauriziocingolani\lkns\classes;

/**
 * Description of CancellationResponse
 *
 * @property string $code
 * @property string $message
 * @property boolean $severeError If an error is returned, it shows whether is severe or not.
 * @property integer $crsReservationId FOTHcrs’ unique identification number.
 * @property integer $refundValue Booking’s refund value. Value multiplied by 100.
 * @property boolean $cancelledWhileAskingForFees Usage on specific companies where asking for fees might actually cancel the booking.
 *
 * @author Maurizio Cingolani <mauriziocingolani74@gmail.com>
 * @version 1.0
 */
class CancellationResponse {
    public $code;
    public $message;
    public $severeError;
    public $crsReservationId;
    public $refundValue;
    public $cancelledWhileAskingForFees;

    /* Metodi */

    public function __construct($params) {
        foreach ($params as $name => $value) {
            $this->$name = $value;
        }
    }

    /* Metodi statici */
}
