<?php

namespace mauriziocingolani\lkns\classes;

/**
 * Description of Fare
 *
 * @property string $idOrCode The fare’s id or code.
 * @property string $name The fare’s name.
 * @property string $description The fare’s description.
 * @property boolean $needsMandatoryData The fare must be associated with the code number
 * 
 * @author Maurizio Cingolani <mauriziocingolani74@gmail.com>
 * @version 1.0
 */
class Fare {

    public $idOrCode;
    public $name;
    public $description;
    public $needsMandatoryData;

    /* Metodi */

    public function __construct($params) {
        foreach ($params as $name => $value) {
            $this->$name = $value;
        }
    }

    /* Metodi statici */
}
