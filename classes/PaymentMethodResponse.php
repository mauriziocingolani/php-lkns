<?php

namespace mauriziocingolani\lkns\classes;

/**
 * Description of PaymentMethodResponse
 *
 * @property PaymentMethodResponsePerCompany[] $paymentMethodResponsePerCompanies
 * 
 * @author Maurizio Cingolani <mauriziocingolani74@gmail.com>
 * @version 1.0
 */
class PaymentMethodResponse {

    public $paymentMethodResponsePerCompanies = [];

    /* Metodi */

    public function __construct($params) {
        foreach ($params as $name => $value) {
            if($name == 'paymentMethodResponsePerCompanies' && isset($value)) :
                foreach($value as $pmrpc):
                    $this->paymentMethodResponsePerCompanies[] = new PaymentMethodResponsePerCompany($pmrpc);
                endforeach;
            else:
                $this->$name = $value;
            endif;
        }
    }

    /* Metodi statici */
}
