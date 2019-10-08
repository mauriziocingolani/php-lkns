<?php

namespace mauriziocingolani\lkns\classes;

/**
 * Description of BookingLeader
 *
 * @property string $firstName Firstname of the booking’s leader.
 * @property string $lastName Lastname of the booking’s leader.
 * @property Address $address
 * @property string $phone Optional. The booking’s leader phone.
 * @property string $mobile Optional. The booking’s leader mobile.
 * @property string $email Optional. The booking’s leader email.
 * 
 * @author Maurizio Cingolani <mauriziocingolani74@gmail.com>
 * @version 1.0
 */
class BookingLeader {

    public $firstName;
    public $lastName;
    public $address;
    public $phone;
    public $mobile;
    public $email;

    /* Metodi */

    public function __construct($params) {
        foreach ($params as $name => $value) {
            if($name == 'address') :
                $this->address = new Address($value);
            else:
                $this->$name = $value;
            endif;
        }
    }

    /* Metodi statici */
}
