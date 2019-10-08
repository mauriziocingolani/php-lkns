<?php

namespace mauriziocingolani\lkns\classes;

/**
 * Description of Discount
 *
 * @property string $idOrCode The discount’s unique id or code.
 * @property string $name The discount’s name.
 * @property string $type
 * @property boolean $needsMandatoryData Whether the discount must be associated with a document number.
 * @property string $description The discount’s description.
 * @property Company $company
 *
 * @author Maurizio Cingolani <mauriziocingolani74@gmail.com>
 * @version 1.0
 */
class Discount {
    public $idOrCode;
    public $name;
    public $type;
    public $needsMandatoryData;
    public $description;
    public $company;

    /* Metodi */

    public function __construct($params) {
        foreach ($params as $name => $value) {
            if ($name == 'company') :
                $this->company = new Company($value);
            else :
                $this->$name = $value;
            endif;
        }
    }

    /* Metodi statici */
}
