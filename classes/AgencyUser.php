<?php

namespace mauriziocingolani\lkns\classes;

/**
 * Description of AgencyUser
 *
 * @property string $userName UserName
 * @property string $password User Password
 * @property string $remarks Insert Remarks
 * 
 * @author Maurizio Cingolani <mauriziocingolani74@gmail.com>
 * @version 1.0
 */
class AgencyUser {

    public $userName;
    public $password;
    public $remarks;

    /* Metodi */

    public function __construct($params) {
        foreach ($params as $name => $value) {
            $this->$name = $value;
        }
    }

    /* Metodi statici */
}
