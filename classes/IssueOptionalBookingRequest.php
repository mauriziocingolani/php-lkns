<?php

namespace mauriziocingolani\lkns\classes;

/**
 * Description of IssueOptionalBookingRequest
 *
 * @property integer $crsReservationId FORTHcrs’ unique identification number.
 * @property string $approvalCode
 * @property BookingPaymentMethodCompany[] $bookingPaymentMethods Booking payment methods per company.
 * 
 * @author Maurizio Cingolani <mauriziocingolani74@gmail.com>
 * @version 1.0
 */
class IssueOptionalBookingRequest {

    public $crsReservationId;
    public $approvalCode;
    public $bookingPaymentMethods;

    /* Metodi */

    public function __construct($params) {
        foreach ($params as $name => $value) {
            if ($name == 'bookingPaymentMethods') :
                foreach ($value as $bpm) :
                    $this->bookingPaymentMethods[] = new BookingPaymentMethodCompany($bpm);
                endforeach;
            else :
                $this->$name = $value;
            endif;
        }
    }

    /* Metodi statici */
}
