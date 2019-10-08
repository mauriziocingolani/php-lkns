<?php

namespace mauriziocingolani\lkns\classes;

/**
 * Description of AdditionalServiceItem
 *
 * @property string $idOrCode The id or code of the service item.
 * @property string $name The service item’s name.
 * @property string $chargeType Defines the charge type of the item. Possible values are PER_UNIT, PER_BOOKING, etc.
 * @property integer $availableUnits The number of available units.
 * @property integer $price The item’s price. Value multiplied by 100.
 * @property string $ticketLetter Ticket Letter used for billing reconciliation.
 * @property string $ticketNumberOrVoucher Ticket number or voucher used for billing reconciliation.
 * 
 * @author Maurizio Cingolani <mauriziocingolani74@gmail.com>
 * @version 1.0
 */
class AdditionalServiceItem {

    public $idOrCode;
    public $name;
    public $chargeType;
    public $availableUnits;
    public $price;
    public $ticketLetter;
    public $ticketNumberOrVoucher;

    /* Metodi */

    public function __construct($params) {
        foreach ($params as $name => $value) {
            $this->$name = $value;
        }
    }

    /* Metodi statici */
}
