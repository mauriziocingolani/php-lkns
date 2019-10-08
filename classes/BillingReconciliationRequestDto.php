<?php

namespace mauriziocingolani\lkns\classes;

/**
 * Description of BillingReconciliationRequestDto
 *
 * @property integer $crsReservationId FORTHcrs’ unique identification number.
 * @property Trip[] $trips The trips of the quote.
 * @property string $transactionCode TransactionCodeEnum value id.
 * 
 * @author Maurizio Cingolani <mauriziocingolani74@gmail.com>
 * @version 1.0
 */
class BillingReconciliationRequestDto {

    public $crsReservationId;
    public $trips;
    public $transactionCode;

    /* Metodi */

    public function __construct($params) {
        foreach ($params as $name => $value) {
            if($name == 'trips') :
                foreach($value as $t):
                    $this->trips[] = new Trip($t);
                endforeach;
            else:
                $this->$name = $value;
            endif;
        }
    }

    /* Metodi statici */
}
