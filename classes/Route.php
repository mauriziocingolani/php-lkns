<?php

namespace mauriziocingolani\lkns\classes;

/**
 * Description of Route
 *
 * @property Location $origin
 * @property Location[] $destinations
 * 
 * @author Maurizio Cingolani <mauriziocingolani74@gmail.com>
 * @version 1.0
 */
class Route {

    public $origin;
    public $destinations = [];

    /* Metodi */

    public function __construct($params) {
        foreach ($params as $name => $value) {
            if ($name == 'origin' && isset($value)) :
                $this->origin = new Location($value);
            elseif ($name == 'destinations' && isset($value)) :
                foreach ($value as $d) :
                    $this->destinations[] = new Location($d);
                endforeach;
            else :
                $this->$name = $value;
            endif;
        }
    }

    /* Metodi statici */
}
