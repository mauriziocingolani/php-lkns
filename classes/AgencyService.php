<?php

namespace mauriziocingolani\lkns\classes;

/**
 * Description of AgencyService
 *
 * @property Address $deliveryAddress
 * @property integer $serviceFee Service Fee booking’s.
 * @property string $remarks Delivery booking remarks
 * @property string $deliveryType Possible values are: COURIER, KIOSK, AGENCY_OFFICE, OTHER
 * @property integer $deliveryPrice Delivery Price booking’s.
 *
 * @author Maurizio Cingolani <mauriziocingolani74@gmail.com>
 * @version 1.0
 */
class AgencyService {
    public $deliveryAddress;
    public $serviceFee;
    public $remarks;
    public $deliveryType;
    public $deliveryPrice;

    /* Metodi */

    public function __construct($params) {
        foreach ($params as $name => $value) {
            if($name == 'deliveryAddress'  && isset($value)) :
                $this->deliveryAddress = new Address($value);
            else:
                $this->$name = $value;
            endif;
        }
    }

    /* Metodi statici */

    public static function GetValues() {
        return ['COURIER', 'KIOSK', 'AGENCY_OFFICE', 'OTHER'];
    }
}
