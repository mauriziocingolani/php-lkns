<?php

namespace mauriziocingolani\lkns\classes;

/**
 * Description of BookingResponse
 *
 * @property string $code
 * @property string $message
 * @property boolean $severeError If an error is returned, it shows whether is severe or not.
 * @property integer $crsReservationId FORTHcrs’ unique identification number.
 * @property string $errorCode
 * @property string $fareIdOrCode Optional. The booking’s fare code.
 * @property string $paymentType
 * @property BookingLeader $leader
 * @property Trip[] $trips
 * @property User $user
 * @property AgencyService $agencyService
 * @property boolean $ticketed Used in booking retrieval. Holds value of true in case of ticketed booking
 * @property boolean $supportsVoucherGeneration Used only if the Company supports the generate-voucher method
 * 
 * @author Maurizio Cingolani <mauriziocingolani74@gmail.com>
 * @version 1.0
 */
class BookingResponse {

    public $code;
    public $message;
    public $severeError;
    public $crsReservationId;
    public $errorCode;
    public $fareIdOrCode;
    public $paymentType;
    public $leader;
    public $trips;
    public $user;
    public $agencyService;
    public $ticketed;
    public $supportsVoucherGeneration;

    /* Metodi */

    public function __construct($params) {
        foreach ($params as $name => $value) {
            if($name == 'trips') :
                foreach($value as $trip):
                    $this->trips[] = new Trip($trip);
                endforeach;
            elseif($name == 'leader'):
                $this->leader = new BookingLeader($value);
            elseif($name == 'user'):
                $this->user = new User($value);
            elseif($name == 'agencyService'):
                $this->agencyService = new AgencyService($value);
            else:
                $this->$name = $value;
            endif;
        }
    }

    /* Metodi statici */
}
