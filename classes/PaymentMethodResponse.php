<?php

namespace mauriziocingolani\lkns\classes;

/**
 * Description of PaymentMethodResponse
 *
 * @property string $code
 * @property string $message
 * @property boolean $severeError If an error is returned, it shows whether is severe or not.
 * @property PaymentMethodResponsePerCompany[] $paymentMethodResponsePerCompanies
 * 
 * @author Maurizio Cingolani <mauriziocingolani74@gmail.com>
 * @version 1.0
 */
class PaymentMethodResponse {

    public $code;
    public $message;
    public $severeError;
    public $paymentMethodResponsePerCompanies;

    /* Metodi */

    public function __construct($params) {
        foreach ($params as $name => $value) {
            if($name == 'paymentMethodResponsePerCompanies') :
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
