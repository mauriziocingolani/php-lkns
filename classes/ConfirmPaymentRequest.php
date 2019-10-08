<?php

namespace mauriziocingolani\lkns\classes;

/**
 * Description of ConfirmPaymentRequest
 *
 * @property integer $crsReservationId FORTHcrs’ unique identification number.
 * @property BookingLeader $leader
 * @property string $approvalCode
 * @property string $transactionCode
 * @property string CompanyReservationCodeDetail[] $companyReservationCodeDetails
 * @property string $deliveryType Possible values are: COURIER, KIOSK, AGENCY_OFFICE, OTHER
 * 
 * @author Maurizio Cingolani <mauriziocingolani74@gmail.com>
 * @version 1.0
 */
class ConfirmPaymentRequest {

    public $crsReservationId;
    public $leader;
    public $approvalCode;
    public $transactionCode;
    public $companyReservationCodeDetails;

    /* Metodi */

    public function __construct($params) {
        foreach ($params as $name => $value) {
            if ($name == 'leader') :
                $this->leader = new BookingLeader($value);
            else :
                $this->$name = $value;
            endif;
        }
    }

    /* Metodi statici */

    public static function getDeliveryTypeValues() {
        return ['COURIER', 'KIOSK', 'AGENCY_OFFICE', 'OTHER'];
    }

}
