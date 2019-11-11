<?php

namespace mauriziocingolani\lkns\classes;

/**
 * Description of CompanyReservationCodeDetail
 *
 * @property Company $company
 * @property string $companyReservationCode The booking’s unique identification number at the operator’s system. Used in doBooking method.
 * @property integer $price price of the quote. Optional
 * 
 * @author Maurizio Cingolani <mauriziocingolani74@gmail.com>
 * @version 1.0
 */
class CompanyReservationCodeDetail {

    public $company;
    public $companyReservationCode;
    public $price;

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
}
