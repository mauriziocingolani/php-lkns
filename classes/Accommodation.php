<?php

namespace mauriziocingolani\lkns\classes;

/**
 * Description of Accommodation
 *
 * @property string $idOrCode
 * @property string $abbreviation
 * @property string $name
 * @property string $description
 * @property string $type
 * @property string $specificType
 * @property integer $capacity
 * @property integer $length
 * @property integer $maxLength
 * @property integer $height
 * @property string $tripKindAllowed
 * @property boolean $pricingPerMeter
 * @property Company $company
 * @property string $number
 * @property string $bed
 * @property boolean $exclusiveUse
 * @property string $group
 * @property Image[] $images
 * 
 * @author Maurizio Cingolani <mauriziocingolani74@gmail.com>
 * @version 1.0
 */
class Accommodation {

    public $idOrCode;
    public $abbreviation;
    public $name;
    public $description;
    public $type;
    public $specificType;
    public $capacity;
    public $length;
    public $maxLength;
    public $height;
    public $tripKindAllowed;
    public $pricingPerMeter;
    public $company;
    public $number;
    public $bed;
    public $exclusiveUse;
    public $group;
    public $images;

    /* Metodi */

    public function __construct($params) {
        foreach ($params as $name => $value) {
            if ($name == 'company') :
                $this->company = new Company($value);
            elseif ($name == 'images') :
                foreach ($value as $i) :
                    $this->images[] = new Image($i);
                endforeach;
            else :
                $this->$name = $value;
            endif;
        }
    }

    /* Metodi statici */
}
