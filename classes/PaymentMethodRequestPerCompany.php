<?php

namespace mauriziocingolani\lkns\classes;

/**
 * Description of PaymentMethodRequestPerCompany
 *
 * @property Company $company
 * @property string $methodCall Possible values are DO_FINALIZE_BOOKING, DO_OPTIONAL_BOOKING, DO_ISSUE_OPTIONAL_BOOKING. Used in request.
 * @property integer $total The price of the booking, in cents. If the company is not null, then the price refers to the specific company of the booking. Used in request.
 * 
 * @author Maurizio Cingolani <mauriziocingolani74@gmail.com>
 * @version 1.0
 */
class PaymentMethodRequestPerCompany {

    public $company;
    public $methodCall;
    public $total;

    /* Metodi */

    public function __construct($params) {
        foreach ($params as $name => $value) {
            if ($name == 'company') :
                $this->company = new Company($value);
            else :
                $this->$name = $value;
            endif;
        }
    }

    /* Metodi statici */

    public static function GetMethodCallValues() {
        return ['DO_FINALIZE_BOOKING', 'DO_OPTIONAL_BOOKING', 'DO_ISSUE_OPTIONAL_BOOKING'];
    }

}
