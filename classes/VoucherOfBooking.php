<?php

namespace mauriziocingolani\lkns\classes;

/**
 * Description of VoucherOfBooking
 *
 * @property string $code
 * @property string $message
 * @property boolean $severeError If an error is returned, it shows whether is severe or not.
 * @property string[] $voucher
 * 
 * @author Maurizio Cingolani <mauriziocingolani74@gmail.com>
 * @version 1.0
 */
class VoucherOfBooking {

    public $code;
    public $message;
    public $severeError;
    public $voucher;

    /* Metodi */

    public function __construct($params) {
        foreach ($params as $name => $value) {
            $this->$name = $value;
        }
    }

    /* Metodi statici */
}
