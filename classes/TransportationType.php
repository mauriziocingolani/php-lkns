<?php

namespace mauriziocingolani\lkns\classes;

/**
 * Description of TransportationType
 *
 * @property string $type Transportation type. Possible values are SEA_TRANSPORT, BUS_TRANSPORT.
 * @property Route[] $routes The list of routes per transportation type.
 * 
 * @author Maurizio Cingolani <mauriziocingolani74@gmail.com>
 * @version 1.0
 */
class TransportationType {

    public $type;
    public $routes = [];

    /* Metodi */

    public function __construct($params) {
        foreach ($params as $name => $value) {
            if ($name == 'routes' && isset($value)) :
                foreach ($value as $r) :
                    $this->routes[] = new Route($r);
                endforeach;
            else :
                $this->$name = $value;
            endif;
        }
    }

    /* Metodi statici */

    public static function GetTypeValues() {
        return ['SEA_TRANSPORT', 'BUS_TRANSPORT'];
    }

}
