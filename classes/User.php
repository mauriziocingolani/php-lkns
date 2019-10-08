<?php

namespace mauriziocingolani\lkns\classes;

/**
 * Description of User
 *
 * @property string $code
 * @property string $message
 * @property boolean $severeError If an error is returned, it shows whether is severe or not.
 * @property integer $agencyCode
 * @property string $userName
 * @property string $password
 * @property string $signature
 * @property string $language
 * @property string $incomingHost
 * @property string $session
 * @property string $memberIdOrCode
 * @property string $channel
 * @property string $bookingIdentifier
 * 
 * @author Maurizio Cingolani <mauriziocingolani74@gmail.com>
 * @version 1.0
 */
class User {

    public $code;
    public $message;
    public $severeError;
    public $agencyCode;
    public $userName;
    public $password;
    public $signature;
    public $language;
    public $incomingHost;
    public $session;
    public $memberIdOrCode;
    public $channel;
    public $bookingIdentifier;

    /* Metodi */

    public function __construct($params) {
        foreach ($params as $name => $value) {
            $this->$name = $value;
        }
    }

    /* Metodi statici */
}
