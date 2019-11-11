<?php

namespace mauriziocingolani\lkns\classes;

/**
 * Description of PassengerData
 *
 * @property string $surname
 * @property string $name
 * @property boolean $specialNeeds
 * @property string $nationality
 * @property string $birthDate
 * @property string $birthPlace
 * @property string $documentNumber
 * @property string $documentType
 * @property string $documentExpirationDate
 * @property string $sexType
 * @property string $type
 * @property string $accommodationNumber
 * @property string $accommodationBed
 * @property string $residentIdOrCode
 * @property Ticket $ticket
 * 
 * @author Maurizio Cingolani <mauriziocingolani74@gmail.com>
 * @version 1.0
 */
class PassengerData {

    public $surname;
    public $name;
    public $specialNeeds;
    public $nationality;
    public $birthDate;
    public $birthPlace;
    public $documentNumber;
    public $documentType;
    public $documentExpirationDate;
    public $sexType;
    public $type;
    public $accommodationNumber;
    public $accommodationBed;
    public $residentIdOrCode;
    public $ticket;

    /* Metodi */

    public function __construct($params) {
        foreach ($params as $name => $value) {
            if($name == 'ticket' && isset($value)) :
                $this->ticket = new Ticket($value);
            else:
                $this->$name = $value;
            endif;
        }
    }

    /* Metodi statici */

    public static function GetSexTypeValues() {
        return ['MALE', 'FEMALE'];
    }

}
