<?php

namespace mauriziocingolani\lkns\classes;

/**
 * Description of AnalyticRoute
 *
 * @property string $description
 * @property Location $origin
 * @property Location $destination
 * 
 * @author Maurizio Cingolani <mauriziocingolani74@gmail.com>
 * @version 1.0
 */
class AnalyticRoute {

    public $description;
    public $origin;
    public $destination;

    /* Metodi */

    public function __construct($params) {
        foreach ($params as $name => $value) {
            if (in_Array($name, ['origin', 'destination'])) :
                $this->$name = new Location($value);
            else :
                $this->$name = $value;
            endif;
        }
    }

    /* Metodi statici */
}
