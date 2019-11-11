<?php

namespace mauriziocingolani\lkns\classes;

/**
 * Description of PaymentMethodRequest
 *
 * @property PaymentMethodRequestPerCompany[] $paymentMethodRequestPerCompanies
 * 
 * @author Maurizio Cingolani <mauriziocingolani74@gmail.com>
 * @version 1.0
 */
class PaymentMethodRequest {

    public $paymentMethodRequestPerCompanies = [];

    /* Metodi */

    public function __construct($params) {
        foreach ($params as $name => $value) {
            if($name == 'paymentMethodRequestPerCompanies' && isset($value)) :
                foreach($value as $pmrpc):
                    $this->paymentMethodRequestPerCompanies[] = new PaymentMethodRequestPerCompany($pmrpc);
                endforeach;
            else :
                $this->$name = $value;
            endif;
        }
    }

    /* Metodi statici */
}
