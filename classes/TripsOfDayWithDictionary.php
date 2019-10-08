<?php

namespace mauriziocingolani\lkns\classes;

/**
 * Description of TripsOfDayWithDictionary
 *
 * @property string $code
 * @property string $message
 * @property boolean $severeError If an error is returned, it shows whether is severe or not.
 * @property TripsOfDay[] $trips
 * @property mixed $names
 * 
 * @author Maurizio Cingolani <mauriziocingolani74@gmail.com>
 * @version 1.0
 */
class TripsOfDayWithDictionary {

    public $code;
    public $message;
    public $severeError;
    public $trips;
    public $names;

    /* Metodi */

    public function __construct($params) {
        foreach ($params as $name => $value) {
            if ($name == 'trips') :
                foreach ($value as $t) :
                    $this->trips[] = new TripsOfDay($t);
                endforeach;
            else :
                $this->$name = $value;
            endif;
        }
    }

    /* Metodi statici */
}
