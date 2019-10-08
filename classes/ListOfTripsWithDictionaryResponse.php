<?php

namespace mauriziocingolani\lkns\classes;

/**
 * Description of ListOfTripsWithDictionaryResponse
 *
 * @property string $code
 * @property string $message
 * @property boolean $severeError If an error is returned, it shows whether is severe or not.
 * @property TripsWithDictionary[] $tripsWithDictionary
 * 
 * @author Maurizio Cingolani <mauriziocingolani74@gmail.com>
 * @version 1.0
 */
class ListOfTripsWithDictionaryResponse {

    public $code;
    public $message;
    public $severeError;
    public $tripsWithDictionary;

    /* Metodi */

    public function __construct($params) {
        foreach ($params as $name => $value) {
            if ($name == 'tripsWithDictionary') :
                foreach ($value as $twd) :
                    $this->tripsWithDictionary[] = new TripsWithDictionary($twd);
                endforeach;
            else :
                $this->$name = $value;
            endif;
        }
    }

    /* Metodi statici */
}
