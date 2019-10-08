<?php

namespace mauriziocingolani\lkns\classes;

/**
 * Description of ConvertBookingToOpenRequest
 *
 * @property integer $crsReservationId FORTHcrs’ unique identification number.
 * @property Ticket[] $tickets Optional. The booking’s ticket details. If not set, then the whole booking will be converted to open.
 * 
 * @author Maurizio Cingolani <mauriziocingolani74@gmail.com>
 * @version 1.0
 */
class ConvertBookingToOpenRequest {

    public $crsReservationId;
    public $tickets;

    /* Metodi */

    public function __construct($params) {
        foreach ($params as $name => $value) {
            if ($name == 'tickets') :
                foreach ($value as $t) :
                    $this->tickets[] = new Ticket($t);
                endforeach;
            else :
                $this->$name = $value;
            endif;
        }
    }

    /* Metodi statici */
}
