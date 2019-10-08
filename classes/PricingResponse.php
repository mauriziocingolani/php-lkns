<?php

namespace mauriziocingolani\lkns\classes;

/**
 * Description of PricingResponse
 *
 * @property string $code
 * @property string $message
 * @property boolean $severeError If an error is returned, it shows whether is severe or not.
 * @property string $fareIdOrCode Optional. The fare code of the quote.
 * @property Trip[] $trips
 * @property string $bookingIdentifier
 * 
 * @author Maurizio Cingolani <mauriziocingolani74@gmail.com>
 * @version 1.0
 */
class PricingResponse {

    public $code;
    public $message;
    public $severeError;
    public $fareIdOrCode;
    public $trips;
    public $bookingIdentifier;

    /* Metodi */

    public function __construct($params) {
        foreach ($params as $name => $value) {
            if ($name == 'trips') :
                foreach ($value as $t) :
                    $this->trips[] = new Trip($t);
                endforeach;
            else :
                $this->$name = $value;
            endif;
        }
    }

    /* Metodi statici */
}
