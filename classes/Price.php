<?php

namespace mauriziocingolani\lkns\classes;

/**
 * Description of Price
 *
 * @property integer $total Used in doPricing and Method. The price of the item.
 * @property integer $net
 * @property integer $tax
 * @property integer $vat
 * @property string $description
 * @property string $fareIdOrCode
 * @property integer[] $additionFees
 * @property string $accommodationNumber Optional. The accommodation number. Used in pricing method, for ForthCRS’ native ferry companies when the request has keepSeats value set to true.
 * @property string $priceAccommodationType Refers to the type of the item. Possible values are PASSENGER, VEHICLE, EXTRA_SERVICE.
 * @property string $itemIdOrCode Optional. The item’s id or code for matching the request’s data. Used when displaying analytical pricing.
 * 
 * @author Maurizio Cingolani <mauriziocingolani74@gmail.com>
 * @version 1.0
 */
class Price {

    public $total;
    public $net;
    public $tax;
    public $vat;
    public $description;
    public $fareIdOrCode;
    public $additionFees;
    public $accommodationNumber;
    public $priceAccommodationType;
    public $itemIdOrCode;

    /* Metodi */

    public function __construct($params) {
        foreach ($params as $name => $value) {
            $this->$name = $value;
        }
    }

    /* Metodi statici */

    public static function GetAccommodationTypeValues() {
        return ['PASSENGER', 'VEHICLE', 'EXTRA_SERVICE'];
    }

}
