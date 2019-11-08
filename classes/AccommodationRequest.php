<?php

namespace mauriziocingolani\lkns\classes;

/**
 * Description of AccommodationRequest
 *
 * @property string $idOrCode
 * @property string $accommodationRequestType
 * @property integer $quantity
 * @property string $bedType
 * @property AccommodationRequestAnalysis[] $accommodationRequestAnalysises
 * 
 * @author Maurizio Cingolani <mauriziocingolani74@gmail.com>
 * @version 1.0
 */
class AccommodationRequest {

    public $idOrCode;
    public $accommodationRequestType;
    public $quantity;
    public $bedType;
    public $accommodationRequestAnalysises = [];

    /* Metodi */

    public function __construct($params) {
        foreach ($params as $name => $value) {
            if ($name == 'accommodationRequestAnalysises') :
                foreach ($value as $aR) :
                    $this->accommodationRequestAnalysises[] = new AccommodationRequestAnalysis($aR);
                endforeach;
            else :
                $this->$name = $value;
            endif;
        }
    }

    /* Metodi statici */

    public static function GetAccommodationRequestTypeValues() {
        return ['MALE_BERTH', 'FEMALE_BERTH', 'COMPLETE', 'VEHICLE'];
    }

    public static function GetBeTypeValues() {
        return ['NO_PREFERENCE', 'UPPER_BED', 'LOWER_BED'];
    }

}
