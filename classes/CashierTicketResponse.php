<?php

namespace mauriziocingolani\lkns\classes;

/**
 * Description of CashierTicketResponse
 *
 * @property string $code
 * @property string $message
 * @property boolean $severeError If an error is returned, it shows whether is severe or not.
 * @property CashierTicket[] $cashierTickets
 * 
 * @author Maurizio Cingolani <mauriziocingolani74@gmail.com>
 * @version 1.0
 */
class CashierTicketResponse {

    public $code;
    public $message;
    public $severeError;
    public $cashierTickets = [];

    /* Metodi */

    public function __construct($params) {
        foreach ($params as $name => $value) {
            if ($name == 'cashierTickets') :
                foreach ($value as $ct) :
                    $this->cashierTickets[] = new CashierTicket($ct);
                endforeach;
            else :
                $this->$name = $value;
            endif;
        }
    }

    /* Metodi statici */
}
