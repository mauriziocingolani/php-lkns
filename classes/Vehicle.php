<?php

namespace mauriziocingolani\lkns\classes;

/**
 * Description of Vehicle
 *
 * @property string $priorityNumber The vehicle’s priority number, in garage.
 * @property string $length The vehicle’s length.
 * @property string $plateNumber The vehicle’s plate number.
 * @property string $driverCabin Optional. The vehicle’s driver cabin.
 * @property string $driverBed Optional. The vehicle’s driver bed.
 * @property string $fare Optional. The fare code.
 * @property string $brand Optional. The vehicle’s brand.
 * @property string $nationality Optional. The nationality vehicle’s owner.
 * @property string $loyaltyNumber Optional. The vehicle’s loyalty number.
 * @property string $model Optional. The vehicle’s model.
 * @property string $identificationNumber Optional. The vehicle’s identification number.
 * @property string $height Optional. The vehicle’s height.
 * @property Price $price
 * @property Ticket $ticket
 * @property Accommodation $accommodation
 * @property Discount $discount
 * @property string $action Used for booking modification. Values: I (Insert), D (Delete), no value indicates item should be as is
 * 
 * @author Maurizio Cingolani <mauriziocingolani74@gmail.com>
 * @version 1.0
 */
class Vehicle {

    public $priorityNumber;
    public $length;
    public $plateNumber;
    public $driverCabin;
    public $driverBed;
    public $fare;
    public $brand;
    public $nationality;
    public $loyaltyNumber;
    public $model;
    public $identificationNumber;
    public $height;
    public $price;
    public $ticket;
    public $accommodation;
    public $discount;
    public $action;

    /* Metodi */

    public function __construct($params) {
        foreach ($params as $name => $value) {
            if ($name == 'price' && isset($value)) :
                $this->price = new Price($value);
            elseif ($name == 'ticket' && isset($value)) :
                $this->ticket = new Ticket($value);
            elseif ($name == 'accommodation' && isset($value)) :
                $this->accommodation = new Accommodation($value);
            elseif ($name == 'discount' && isset($value)) :
                $this->discount = new Discount($value);
            else :
                $this->$name = $value;
            endif;
        }
    }

    /* Metodi statici */

    public static function GetActionValues() {
        return ['INSERT', 'DELETE'];
    }

}
