<?php

namespace mauriziocingolani\lkns\classes;

/**
 * Description of BillingReconciliationResponseDto
 *
 * @property string $code
 * @property string $message
 * @property boolean $severeError If an error is returned, it shows whether is severe or not.
 * @property boolean $success Billing reconciliation success status.
 * @property BookingResponse $bookingResponse Populated when it is GET requested.
 * 
 * @author Maurizio Cingolani <mauriziocingolani74@gmail.com>
 * @version 1.0
 */
class BillingReconciliationResponseDto {

    public $code;
    public $message;
    public $severeError;
    public $success;
    public $bookingResponse;

    /* Metodi */

    public function __construct($params) {
        foreach ($params as $name => $value) {
            if ($name == 'bookingResponse'  && isset($value)) :
                $this->bookingResponse = new BookingResponse($value);
            else :
                $this->$name = $value;
            endif;
        }
    }

    /* Metodi statici */
}
