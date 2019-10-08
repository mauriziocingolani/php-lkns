<?php

namespace mauriziocingolani\lkns\classes;

/**
 * Description of CashierTicket
 *
 * @property string $createdDateTime The format is YYYY-MM-DD HH:MM.
 * @property string $transactionCode
 * @property Vessel $vessel
 * @property Ticket $ticket
 * 
 * @author Maurizio Cingolani <mauriziocingolani74@gmail.com>
 * @version 1.0
 */
class CashierTicket {

    public $createdDateTime;
    public $transactionCode;
    public $vessel;
    public $ticket;

    /* Metodi */

    public function __construct($params) {
        foreach ($params as $name => $value) {
            if ($name == 'vessel') :
                $this->vessel = new Vessel($value);
            elseif ($name == 'ticket') :
                $this->ticket = new Ticket($value);
            else :
                $this->$name = $value;
            endif;
        }
    }

    /* Metodi statici */
}
