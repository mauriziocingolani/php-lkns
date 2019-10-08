<?php

namespace mauriziocingolani\lkns\classes;

/**
 * Description of Area
 *
 * @property string $idOrCode The area’s id or code.
 * @property string $name The area’s name.
 *
 * @author Maurizio Cingolani <mauriziocingolani74@gmail.com>
 * @version 1.0
 */
class Area {
    public $idOrCode;
    public $name;

    /* Metodi */

    public function __construct($params) {
        foreach ($params as $name => $value) {
            $this->$name = $value;
        }
    }

    /* Metodi statici */
}
