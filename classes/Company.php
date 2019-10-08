<?php

namespace mauriziocingolani\lkns\classes;

/**
 * Description of Company
 *
 * @property integer $id
 * @property string $abbreviation
 * @property string $description
 * @property string $imageUrl
 *
 * @author Maurizio Cingolani <mauriziocingolani74@gmail.com>
 * @version 1.0
 */
class Company {
    public $id;
    public $abbreviation;
    public $description;
    public $imageUrl;

    /* Metodi */

    public function __construct($params) {
        foreach ($params as $name => $value) {
            $this->$name = $value;
        }
    }

    /* Metodi statici */
}
