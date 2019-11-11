<?php

namespace mauriziocingolani\lkns\classes;

/**
 * Description of PaymentMethodResponsePerCompany
 *
 * @property Company $company
 * @property string[] $paymentMethods Possible values are CASH, CREDIT_CARD, OTHER. OTHER is not currently used.
 * 
 * @author Maurizio Cingolani <mauriziocingolani74@gmail.com>
 * @version 1.0
 */
class PaymentMethodResponsePerCompany {

    public $company;
    public $paymentMethods = [];

    /* Metodi */

    public function __construct($params) {
        foreach ($params as $name => $value) {
            if ($name == 'company' && isset($value)) :
                $this->company = new Company($value);
            else :
                $this->$name = $value;
            endif;
        }
    }

    /* Metodi statici */

    public static function GetPaymentMethodsValues() {
        return ['CASH', 'CREDIT_CARD', 'OTHER'];
    }

}
