<?php

namespace mauriziocingolani\lkns\classes;

/**
 * Description of VehicleData
 *
 * @property string $priorityNumber
 * @property string $plateNumber
 * @property string $nationality
 * @property integer $length
 * @property integer $height
 * @property string $make
 * @property string $model
 * @property string $registrationNumber
 * @property string $driverName
 * @property string $driverSurname
 * @property Ticket $ticket
 * 
 * @author Maurizio Cingolani <mauriziocingolani74@gmail.com>
 * @version 1.0
 */
class VehicleData {

    public $priorityNumber;
    public $plateNumber;
    public $nationality;
    public $length;
    public $height;
    public $make;
    public $model;
    public $registrationNumber;
    public $driverName;
    public $driverSurname;
    public $ticket;

    /* Metodi */

    public function __construct($params) {
        foreach ($params as $name => $value) {
            if ($name == 'ticket') :
                $this->ticket = new Ticket($value);
            else :
                $this->$name = $value;
            endif;
        }
    }

    /* Metodi statici */
}
