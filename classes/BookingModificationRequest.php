<?php

namespace mauriziocingolani\lkns\classes;

/**
 * Description of BookingModificationRequest
 *
 * @property string $fareIdOrCode Optional. The fare code of the quote.
 * @property string $crsReservationCode Company reservation code.
 * @property Trip[] $trips The trips of the quote.
 * @property BookingLeader $leader
 * 
 * @author Maurizio Cingolani <mauriziocingolani74@gmail.com>
 * @version 1.0
 */
class BookingModificationRequest {

    public $fareIdOrCode;
    public $crsReservationCode;
    public $trips;
    public $leader;

    /* Metodi */

    public function __construct($params) {
        foreach ($params as $name => $value) {
            if ($name == 'trips') :
                foreach ($value as $t) :
                    $this->trips[] = new Trip($t);
                endforeach;
            elseif ($name == 'leader') :
                $this->leader = new BookingLeader($value);
            else :
                $this->$name = $value;
            endif;
        }
    }

    /* Metodi statici */
}
