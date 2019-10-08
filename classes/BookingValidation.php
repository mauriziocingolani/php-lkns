<?php

namespace mauriziocingolani\lkns\classes;

/**
 * Description of BookingValidation
 *
 * @property boolean $nationalityCheck
 * @property boolean $birthDateCheck
 * @property boolean $birthPlaceCheck
 * @property boolean $idOrPassportCheck
 * @property boolean $expirationOfDocumentCheck
 * @property boolean $askForDetails
 * @property boolean $mandatorySex
 * @property boolean $mandatoryPassengerType
 * @property boolean $mandatorySurname
 * @property boolean $mandatoryName
 * @property boolean $mandatoryDocument
 * @property boolean $mandatoryPlateNumber
 * @property boolean $mandatoryVehicleLength
 * @property boolean $mandatoryVehicleHeight
 * @property boolean $mandatoryDriverName
 * @property boolean $mandatoryBrandName
 * @property boolean $mandatoryModelName
 * @property boolean $mandatoryVehicleExistence
 * @property boolean $allowsMoreThanTwoTrips
 * @property boolean $hidePassengerDetails
 * @property boolean $supportsDifferentBookingPerTrip
 * @property integer $passengerLimitPerTrip
 * @property integer $vehicleLimitPerTrip
 * @property boolean $supportsLoyaltyCard
 * @property boolean $supportsResidentLoyalty
 * @property boolean $supportsDoGenerateVoucherMethod
 * 
 * @author Maurizio Cingolani <mauriziocingolani74@gmail.com>
 * @version 1.0
 */
class BookingValidation {

    public $nationalityCheck;
    public $birthDateCheck;
    public $birthPlaceCheck;
    public $idOrPassportCheck;
    public $expirationOfDocumentCheck;
    public $askForDetails;
    public $mandatorySex;
    public $mandatoryPassengerType;
    public $mandatorySurname;
    public $mandatoryName;
    public $mandatoryDocument;
    public $mandatoryPlateNumber;
    public $mandatoryVehicleLength;
    public $mandatoryVehicleHeight;
    public $mandatoryDriverName;
    public $mandatoryBrandName;
    public $mandatoryModelName;
    public $mandatoryVehicleExistence;
    public $allowsMoreThanTwoTrips;
    public $hidePassengerDetails;
    public $supportsDifferentBookingPerTrip;
    public $passengerLimitPerTrip;
    public $vehicleLimitPerTrip;
    public $supportsLoyaltyCard;
    public $supportsResidentLoyalty;
    public $supportsDoGenerateVoucherMethod;

    /* Metodi */

    public function __construct($params) {
        foreach ($params as $name => $value) {
            $this->$name = $value;
        }
    }

    /* Metodi statici */
}
