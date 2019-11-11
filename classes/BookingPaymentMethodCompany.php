<?php

namespace mauriziocingolani\lkns\classes;

/**
 * Description of BookingPaymentMethodCompany
 *
 * @property Company $company
 * @property string $paymentMethod Possible values are CASH, CREDIT_CARD, OTHER. OTHER is not currently used.
 * @property integer $total The price of the booking, in cents. If the company is not null, then the price refers to the specific company of the booking. Used in request.
 * 
 * @author Maurizio Cingolani <mauriziocingolani74@gmail.com>
 * @version 1.0
 */
class BookingPaymentMethodCompany {

    public $company;
    public $paymentMethod;
    public $total;

    /* Metodi */

    public function __construct($params) {
        foreach ($params as $name => $value) {
            if ($name == 'company'  && isset($value)) :
                $this->company = new Company($value);
            else :
                $this->$name = $value;
            endif;
        }
    }

    /* Metodi statici */

    public static function GetPaymentMethodValues() {
        return ['CASH', 'CREDIT_CARD', 'OTHER'];
    }

}
