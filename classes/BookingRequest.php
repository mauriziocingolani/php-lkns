<?php

namespace mauriziocingolani\lkns\classes;

/**
 * Description of BookingRequest
 *
 * @property string $fareIdOrCode Optional. The fare code of the quote.
 * @property boolean $checkForAvailability Optional. Check on whether there is actual availability for the quote.
 * @property BookingLeader $leader
 * @property Trip[] $trips The trips of the quote.
 * @property boolean $openReturn Optional. A flag that indicates whether the booking has an open return.
 * @property boolean $member Optional. A flag that indicates whether the booking is made by a member or not.
 * @property BookingPaymentMethodCompany[] $bookingPaymentMethods
 * @property FarePerCompany[] $farePerCompanies
 * @property boolean $goToPayment
 * @property string $approvalCode
 * @property AgencyService $agencyService
 * 
 * @author Maurizio Cingolani <mauriziocingolani74@gmail.com>
 * @version 1.0
 */
class BookingRequest {

    public $fareIdOrCode;
    public $checkForAvailability;
    public $leader;
    public $trips = [];
    public $openReturn;
    public $member;
    public $bookingPaymentMethods = [];
    public $farePerCompanies = [];
    public $goToPayment;
    public $approvalCode;
    public $agencyService;

    /* Metodi */

    public function __construct($params) {
        foreach ($params as $name => $value) {
            if ($name == 'leader'  && isset($value)) :
                $this->leader = new BookingLeader($value);
            elseif ($name == 'trips') :
                foreach ($value as $trip) :
                    $this->trips[] = new Trip($trip);
                endforeach;
            elseif ($name == 'bookingPaymentMethods') :
                foreach ($value as $b) :
                    $this->bookingPaymentMethods[] = new BookingPaymentMethodCompany($b);
                endforeach;
            elseif ($name == 'farePerCompanies') :
                foreach ($value as $fpc) :
                    $this->farePerCompanies[] = new FarePerCompany($fpc);
                endforeach;
            elseif ($name == 'agencyService'  && isset($value)) :
                $this->agencyService = new AgencyService($value);
            else :
                $this->$name = $value;
            endif;
        }
    }

    /* Metodi statici */
}
