<?php

namespace mauriziocingolani\lkns\classes;

/**
 * Description of PendingBookingDetail
 *
 * @property Company $company
 * @property integer $crsReservationId FORTHcrs’ unique identification number.
 * @property string $bookingDate The format is YYYY-MM-DD.
 * @property string $optionDate The format is YYYY-MM-DD.
 * 
 * @author Maurizio Cingolani <mauriziocingolani74@gmail.com>
 * @version 1.0
 */
class PendingBookingDetail {

    public $company;
    public $crsReservationId;
    public $bookingDate;
    public $optionDate;

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
}
