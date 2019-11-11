<?php

namespace mauriziocingolani\lkns\classes;

/**
 * Description of FarePerCompany
 *
 * @property string $idOrCode The fare’s id or code.
 * @property string $name The fare’s name.
 * @property string $description The fare’s description.
 * @property boolean $needsMandatoryData The fare must be associated with the code number.
 * @property Company $company
 * 
 * @author Maurizio Cingolani <mauriziocingolani74@gmail.com>
 * @version 1.0
 */
class FarePerCompany {

    public $idOrCode;
    public $name;
    public $description;
    public $needsMandatoryData;
    public $company;

    /* Metodi */

    public function __construct($params) {
        foreach ($params as $name => $value) {
            if ($name == 'company' && isset($value)) :
                $this->company = new Company($value);
            else :
                $this->$name = $value;
            endif;
        }
    }

    /* Metodi statici */
}
