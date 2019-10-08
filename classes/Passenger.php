<?php

namespace mauriziocingolani\lkns\classes;

/**
 * Description of Passenger
 *
 * @property string $sex The passenger’s sex. Possible values are M, F.
 * @property string $type The passenger’s type. Possible values are AD, CH, IN, ST, JU, SE, etc.
 * @property string $surname The passenger’s surname.
 * @property string $name The passenger’s name.
 * @property boolean $ssr Indicator on whether the passenger has special needs.
 * @property Discount $discount
 * @property string $fare Optional. The fare code.
 * @property string $documentNumber Optional. The passenger’s document number.
 * @property string $documentType Optional. The document type.
 * @property string $documentExpirationDate Optional. The passenger’s document’s expiration date. The format is YYYY-MM-DD.
 * @property string $birthDate Optional. The passenger’s birth date.
 * @property string $birthPlace Optional. The passenger’s birth place.
 * @property string $loyaltyNumber Optional. The passenger’s loyalty number.
 * @property string $nationality Optional. The passenger’s nationality.
 * @property string $residentIdOrCode 
 * @property Price $price
 * @property Accommodation $accommodation
 * @property Ticket $ticket
 * @property string $action Used for booking modification. Values: I (Insert), D (Delete), no value indicates item should be as is
 * 
 * @author Maurizio Cingolani <mauriziocingolani74@gmail.com>
 * @version 1.0
 */
class Passenger {

    public $sex;
    public $type;
    public $surname;
    public $name;
    public $ssr;
    public $discount;
    public $fare;
    public $documentNumber;
    public $documentType;
    public $documentExpirationDate;
    public $birthDate;
    public $birthPlace;
    public $loyaltyNumber;
    public $nationality;
    public $residentIdOrCode;
    public $price;
    public $accommodation;
    public $ticket;
    public $action;

    /* Metodi */

    public function __construct($params) {
        foreach ($params as $name => $value) {
            if($name == 'discount') :
                $this->discount = new Discount($value);
            elseif($name == 'price') :
                $this->price = new Price($value);
            elseif($name == 'accommodation') :
                $this->accommodation = new Accommodation($value);
            elseif($name == 'ticket') :
                $this->ticket = new Ticket($value);
            else:
                $this->$name = $value;
            endif;
        }
    }

    /* Metodi statici */

    public static function GetSexValues() {
        return ['MALE', 'FEMALE'];
    }

    public static function GetActionValues() {
        return ['INSERT', 'DELETE'];
    }

}
