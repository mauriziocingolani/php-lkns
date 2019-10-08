<?php

namespace mauriziocingolani\lkns\classes;
use mauriziocingolani\lkns\classes\Location;
use mauriziocingolani\lkns\classes\Language;

/**
 * Description of LocationLanguage
 *
 * @property integer $id
 * @property Location $location
 * @property Language $language
 * @property string $name
 * @property string $channel
 * @property integer $displayOrder
 *
 * @author Maurizio Cingolani <mauriziocingolani74@gmail.com>
 * @version 1.0
 */
class LocationLanguage {
    public $id;
    public $location;
    public $language;
    public $name;
    public $channel;
    public $displayOrder;

    /* Metodi */

    public function __construct($params) {
        foreach ($params as $name => $value) {
            if ($name == 'location') :
                $this->location = new Location($value); 
            elseif ($name == 'language') :
                $this->location = new Language($value); 
            else :
                $this->$name = $value;
            endif;
        }
    }

    /* Metodi statici */
}
