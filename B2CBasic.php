<?php

namespace mauriziocingolani\lkns;

use mauriziocingolani\lkns\classes\{
    BookingResponse,
    BookingIdentifierResponse,
    CancellationResponse,
    Company,
    ConfirmPaymentResponse,
    Country,
    ListOfTripsWithDictionaryResponse,
    Location,
    PricingResponse,
    TransportationType,
    TripsWithDictionary,
    TimetableConjunctionRequest
};

/**
 * @author Maurizio Cingolani <mauriziocingolani74@gmail.com>
 * @author Paolo Calvaresi <paolo.calvaresi.v@gmail.com>
 * @author Michele Domesi <m.domesi@hotmail.it>
 * @version 1.0.1
 */
class B2CBasic {

    private $url;

    /* Metodi */

    public function __construct($url) {
        $this->url = $url;
    }

    /**
     * getQueryString
     * Il metodo è usato per costruire una query string dato un array associativo
     * @param array $args
     * @return string
     */
    protected function getQueryString(array $args) {
        if (array_key_exists('session', $args)) :
            unset($args['session']);
        endif;
        return http_build_query($args);
    }

    // CHIAMATE IN GET

    /**
     * getSession
     * The method is used to get a user's session or create a new one.
     * The $params parameter must contain the following elements:
     * <ul>
     * <li>agencyCode</li>
     * <li>agencyUserName</li>
     * <li>agencyPassword</li>
     * <li>agencySignature</li>
     * <li>languageCode</li>
     * </ul>
     * @param array $params
     * @return string
     */
    public function getSession($params) {
        $curl = new Curl($this->url . '/session');
        $result = $curl->send(null, null, $this->_getCredentialsArray($params));
        $result = \json_decode($result);
        return $result->session;
    }

    /**
     * The $params parameter must contain the following elements:
     * <ul>
     * <li>agencyCode</li>
     * <li>agencyUserName</li>
     * <li>agencyPassword</li>
     * <li>agencySignature</li>
     * <li>languageCode</li>
     * </ul>
     * @param array $params
     * @return array
     */
    private function _getCredentialsArray(array $params) {
        return [
            'agency-code:' . $params['agencyCode'],
            'agency-user-name:' . $params['agencyUserName'],
            'agency-password:' . $params['agencyPassword'],
            'agency-signature:' . $params['agencySignature'],
            'language-code:' . $params['languageCode'],
        ];
    }

    /**
     * getLocations
     * This method provides all the locations that are associated with the operators (ferry operators, bus operators, etc.) where the agency has access.
     * Geolocation data is also provided.
     * A location can be a part of one or more distinctive sections.
     * This entity is called “area”. There is an optional http get parameter, called locationType for fetching specific types of locations (sea ports, bus stations, etc.).
     * @param string|array $sessionOrParams Session string or credentials array
     * @param string $companyAbbreviations A list of comma separated company abbreviations (es: AML,ANSF).
     * @param string $locationType Possible values are HARBOUR, GENERIC_LOCATION, BUS_STOP etc.
     * @return Location[]
     */
    public function getLocations($sessionOrParams, string $companyAbbreviations = null, string $locationType = null) {
        $args = get_defined_vars();
        $queryString = $this->getQueryString($args);
        $url = $this->url . '/locations';
        if (!empty($queryString))
            $url .= '?' . $queryString;
        $curl = new Curl($url);
        if (is_string($sessionOrParams)) :
            $result = $curl->send($sessionOrParams);
        elseif (is_array($sessionOrParams)) :
            $result = $curl->send(null, null, $sessionOrParams);
        endif;
        $result = json_decode($result);
        if (is_array($result)) :
            $data = [];
            foreach ($result as $l) :
                $data[] = new Location($l);
            endforeach;
            return $data;
        endif;
        return false;
    }

    /**
     * getLocationsWithFilters
     * The method is used to search within the locations. Search can be performed on the Location Code, the Location Description and Country Code.
     * A full match is required for any of these fields.
     * The http get parameter “searchText”, is used for filtering the location data and fetching precisely what the user has asked for.
     * The http get parameter “locationType“ (referred previously), may also be used.
     * @param string|array $sessionOrParams Session string or credentials array
     * @param string $company_abbreviations A list of comma separated company abbreviations (es: AML,ANSF).
     * @param string $locationType Possible values are HARBOUR, GENERIC_LOCATION, BUS_STOP etc.
     * @param string $searchText (Required) A String to search for within Location Code, Location Description or Country Code.
     * @return Location[]
     */
    public function getLocationsWithFilters($sessionOrParams, string $company_abbreviations = null, string $locationType = null, string $searchText = null) {
        $args = get_defined_vars();
        $queryString = $this->getQueryString($args);
        $url = $this->url . '/locations-with-filter';
        if (!empty($queryString)) :
            $url .= '?' . $queryString;
        endif;
        $curl = new Curl($url);
        if (is_string($sessionOrParams)) :
            $result = $curl->send($sessionOrParams);
        elseif (is_array($sessionOrParams)) :
            $result = $curl->send(null, null, $sessionOrParams);
        endif;
        $result = json_decode($result);
        $data = [];
        foreach ($result as $l) :
            $data[] = new Location($l);
        endforeach;
        return $data;
    }

    /**
     * getRoutes
     * This method fetches all the possible routes for each transportation type. Specifically, for the bus transportation part, data fetched include only those bus operators, who support this functionality. The integrators should contact [...] about the companies that support the functionality.
     * The response of the method, is a list of “Transportation” entities, in JSON format.
     * @param string|array $sessionOrParams Session string or credentials array
     * @param string $companyAbbreviations A list of comma separated company abbreviations (es: AML,ANSF).
     * @param string $transportationType Possible values are BT (data for bus transportation), ST (data for sea transportation) and AT (data for both sea and bus transportation). Default value, is AT.
     * @return TransportationType[]
     */
    public function getRoutes($sessionOrParams, string $companyAbbreviations = null, string $transportationType = null) {
        $args = get_defined_vars();
        $queryString = $this->getQueryString($args);
        $url = $this->url . '/routes';
        if (!empty($queryString)) :
            $url .= '?' . $queryString;
        endif;
        $curl = new Curl($url);
        if (is_string($sessionOrParams)) :
            $result = $curl->send($sessionOrParams);
        elseif (is_array($sessionOrParams)) :
            $result = $curl->send(null, null, $sessionOrParams);
        endif;
        $result = json_decode($result);
        $data = [];
        foreach ($result as $t) :
            $data[] = new TransportationType($t);
        endforeach;
        return $data;
    }

    /**
     * getRoutesWithFilter
     * This method fetches all the possible routes from a selected Origin.
     * The Origin is given in the Search Text parameter and can be either the Location Code or Description.
     * The response of the method, is a list of “Transportation” entities, in JSON format.
     * The http get parameter “searchText”, is used for filtering the routes data and fetching precisely what the user has asked for. The search is performed within all records of the results
     * @param string|array $sessionOrParams Session string or credentials array
     * @param string $company_abbreviations A list of comma separated company abbreviations (es: AML,ANSF).
     * @param string $transportationType Possible values are BT (data for bus transportation), ST (data for sea transportation) and AT (data for both sea and bus transportation). Default value, is AT.
     * @param string $searchText (Required) The Origin Location To Search for. Can be either Location Code or Description (es: PIR).
     * @param string $destination The destination Location To Search for. Can be either Location Code or Description. (es: AEG)
     * @return TransportationType[]
     */
    public function getRoutesWithFilter($sessionOrParams, string $company_abbreviations = null, string $transportationType = null, string $searchText = null, string $destination = null) {
        $args = get_defined_vars();
        $queryString = $this->getQueryString($args);
        $url = $this->url . '/routes-with-filter';
        if (!empty($queryString)) :
            $url .= '?' . $queryString;
        endif;
        $curl = new Curl($url);
        if (is_string($sessionOrParams)) :
            $result = $curl->send($sessionOrParams);
        elseif (is_array($sessionOrParams)) :
            $result = $curl->send(null, null, $sessionOrParams);
        endif;
        $result = json_decode($result);
        $data = [];
        foreach ($result as $t) :
            $data[] = new TransportationType($t);
        endforeach;
        return $data;
    }

    /**
     * getCancellation
     * This method is used for cancelling a previously ticketed booking.
     * The cancellation is done in one step by applying [...] unique identification number.
     * The method responds with “Cancellation response” entity.
     * @param string|array $sessionOrParams Session string or credentials array
     * @param integer $crs_reservation_id (Required) [...]’ unique identification number.
     * @return CancellationResponse
     */
    public function getCancellation($sessionOrParams, int $crs_reservation_id) {
        $url = $this->url . '/cancellation' . '/' . $crs_reservation_id;
        $curl = new Curl($url);
        if (is_string($sessionOrParams)) :
            $result = $curl->send($sessionOrParams);
        elseif (is_array($sessionOrParams)) :
            $result = $curl->send(null, null, $sessionOrParams);
        endif;
        $result = json_decode($result);
        return new CancellationResponse($result);
    }

    /**
     * getFinancialData
     * The method responds with agency's financial data at a specific company
     * The response contains all the agency’s necessary financial details, for the specified
     * operator. The company parameter is provided by doCompanies method.
     * @param string|array $sessionOrParams Session string or credentials array
     * @param string $company_abbreviation (Required) Company abbreviation (es: TS2)
     * @return String[]
     */
    public function getFinancialData($sessionOrParams, string $company_abbreviation) {
        $url = $this->url . '/financial-data' . '/' . $company_abbreviation;
        $curl = new Curl($url);
        if (is_string($sessionOrParams)) :
            $result = $curl->send($sessionOrParams);
        elseif (is_array($sessionOrParams)) :
            $result = $curl->send(null, null, $sessionOrParams);
        endif;
        $result = json_decode($result);
        return is_array($result) ? $result : false;
    }

    /**
     * getCompanies
     * The method responds with a list of the agency's affiliate companies.
     * @param string|array $sessionOrParams Session string or credentials array
     * @return Company[]
     */
    public function getCompanies($sessionOrParams) {
        $url = $this->url . '/companies';
        $curl = new Curl($url);
        if (is_string($sessionOrParams)) :
            $result = $curl->send($sessionOrParams);
        elseif (is_array($sessionOrParams)) :
            $result = $curl->send(null, null, $sessionOrParams);
        endif;
        $result = json_decode($result);
        if (is_array($result)) :
            $data = [];
            foreach ($result as $r) :
                $data[] = new Company($r);
            endforeach;
            return $data;
        endif;
        return false;
    }

    /**
     * getCountries
     * This method provides available nationalities and telephone code prefixes
     * @param string|array $sessionOrParams Session string or credentials array
     * @return Country[]
     */
    public function getCountries($sessionOrParams) {
        $url = $this->url . '/countries';
        $curl = new Curl($url);
        if (is_string($sessionOrParams)) :
            $result = $curl->send($sessionOrParams);
        elseif (is_array($sessionOrParams)) :
            $result = $curl->send(null, null, $sessionOrParams);
        endif;
        $result = json_decode($result);
        if (is_array($result)) :
            $data = [];
            foreach ($result as $r) :
                $data[] = new Country($r);
            endforeach;
            return $data;
        endif;
        return false;
    }

    // CHIAMATE IN POST

    /**
     * doTrips
     * Before starting the analysis of each call, a short paragraph regarding the basic flow of trips.
     * Methods doLocations and doTrips provide all the available destinations of the agency’s affiliate operators.
     * A list of all the affiliate operators can be retrieved via doCompany method.
     * The available dates of each route can be retrieved via doRouteFrequency All the above data can be used as input of method doTrips.
     * By following these steps, you will be able of getting trip data very easily.
     * This method provides with trips for specific criteria. The criteria entity is called “Time table” request.
     * @param string|array $sessionOrParams Session string or credentials array
     * @param TimetableRequest $body The criteria entity is called “Time table” request.
     * @return TripsWithDictionary
     */
    public function doTrips($sessionOrParams) {
        $url = $this->url . '/trips';
        $curl = new Curl($url);
        if (is_string($sessionOrParams)) :
            $result = $curl->send($sessionOrParams, $body);
        elseif (is_array($sessionOrParams)) :
            $result = $curl->send(null, $body, $sessionOrParams);
        endif;
        $result = json_decode($result);
        return new TripsWithDictionary($result);
    }

    /**
     * doSimpleTrips
     * This method provides with trips for specific criteria. The criteria entity is called “Time table” request.
     * The specific method is a subset of doTrips and is available on B2C Basic flavor, only. The entity “quoteRequest” is not available in this flavor.
     * The response differs from doTrip’s, since it does not include fare codes, content and on-board services, among others.
     * @param string|array $sessionOrParams Session string or credentials array
     * @param TimetableRequest $body The criteria entity is called “Time table” request.
     * @return TripsWithDictionary
     */
    public function doSimpleTrips($sessionOrParams, $body) {
        $url = $this->url . '/simple-trips';
        $curl = new Curl($url);
        if (is_string($sessionOrParams)) :
            $result = $curl->send($sessionOrParams, $body);
        elseif (is_array($sessionOrParams)) :
            $result = $curl->send(null, $body, $sessionOrParams);
        endif;
        $result = json_decode($result);
        return new TripsWithDictionary($result);
    }

    /**
     * doListOfTrips
     * This method provides with list of trips for specific criteria. The criteria entity is called “Time table” request
     * This method allows a list of trip requests, as input where doTrips method, allows only one.
     * Everything mentioned in doTrips, applies in this method, as well.
     * This method allows any type of combinations of origin & destinations and returns all available trips.
     * @param string|array $sessionOrParams Session string or credentials array
     * @param TimetableRequest[] $body The criteria entity is called “Time table” request.
     * @return ListOfTripsWithDictionaryResponse
     */
    public function doListOfTrips($sessionOrParams, $body) {
        $url = $this->url . '/list-of-trips';
        $curl = new Curl($url);
        if (is_string($sessionOrParams)) :
            $result = $curl->send($sessionOrParams, $body);
        elseif (is_array($sessionOrParams)) :
            $result = $curl->send(null, $body, $sessionOrParams);
        endif;
        $result = json_decode($result);
        return new ListOfTripsWithDictionaryResponse($result);
    }

    /**
     * doTripWithConjunction
     * This method provides trips on combined itineraries
     * The method returns possible alternative routes that connect two locations.
     * The most significant parameter, is maxConjunctions, which defines the maximum allowed transtitions, in order to get from origin location, to the destination location.
     * @param string|array $sessionOrParams Session string or credentials array
     * @param TimetableConjunctionRequest $body The criteria entity is called “Time table” request.
     * @return TripsWithDictionary
     */
    public function doTripWithConjunction($sessionOrParams, $body) {
        $url = $this->url . '/trips-with-conjunction';
        $curl = new Curl($url);
        if (is_string($sessionOrParams)) :
            $result = $curl->send($sessionOrParams, $body);
        elseif (is_array($sessionOrParams)) :
            $result = $curl->send(null, $body, $sessionOrParams);
        endif;
        $result = json_decode($result);
        return new TripsWithDictionary($result);
    }

    /**
     * doPricing
     * This method provides pricing for a specific quote. The criteria entity is called “Pricing request”.
     * @param string|array $sessionOrParams Session string or credentials array
     * @param BookingRequest $body The criteria entity is called “Pricing request”.
     * @return PricingResponse
     */
    public function doPricing($sessionOrParams, $body) {
        $url = $this->url . '/pricing';
        $curl = new Curl($url);
        if (is_string($sessionOrParams)) :
            $result = $curl->send($sessionOrParams, $body);
        elseif (is_array($sessionOrParams)) :
            $result = $curl->send(null, $body, $sessionOrParams);
        endif;
        $result = json_decode($result);
        return new PricingResponse($result);
    }

    /**
     * doBooking
     * This method books a specific quote. The criteria entity is called “Booking request”.
     * The structure of the entity can be found on the table, below.
     * @param string|array $sessionOrParams Session string or credentials array
     * @param BookingRequest $body  The criteria entity is called “Booking request”.
     * @return BookingResponse
     */
    public function doBooking($sessionOrParams, $body) {
        $url = $this->url . '/booking';
        $curl = new Curl($url);
        if (is_string($sessionOrParams)) :
            $result = $curl->send($sessionOrParams, $body);
        elseif (is_array($sessionOrParams)) :
            $result = $curl->send(null, $body, $sessionOrParams);
        endif;
        $result = json_decode($result);
        return new BookingResponse($result);
    }

    /**
     * doBookingIdentifier
     * This method books a specific quote. The criteria entity is called “Booking request”.
     * The structure of the entity can be found on the table, below.
     * @param string|array $sessionOrParams Session string or credentials array
     * @param BookingRequest $body  The criteria entity is called “Booking request”.
     * @return BookingIdentifierResponse
     */
    public function doBookingIdentifier($sessionOrParams, $body) {
        $url = $this->url . '/booking-identifier';
        $curl = new Curl($url);
        if (is_string($sessionOrParams)) :
            $result = $curl->send($sessionOrParams, $body);
        elseif (is_array($sessionOrParams)) :
            $result = $curl->send(null, $body, $sessionOrParams);
        endif;
        $result = json_decode($result);
        return new BookingIdentifierResponse($result);
    }

    /**
     * doConfirmPayment
     * This method is used for confirming a payment of a booking, by entering into the system the approvalCode of the payment returned by the payment system in use.
     * Used for finalizing the payment process of a ticketed booking.
     * The bank payment data (approval code and transaction code) are inserted, in order for the operator to take the booking, as valid.
     * This method is used in relation with the field goToPayment of BookingRequest entity.
     * @param string|array $sessionOrParams Session string or credentials array
     * @param ConfirmPaymentRequest $body
     * @return ConfirmPaymentResponse
     */
    public function doConfirmPayment($sessionOrParams, $body) {
        $url = $this->url . '/confirm-payment';
        $curl = new Curl($url);
        if (is_string($sessionOrParams)) :
            $result = $curl->send($sessionOrParams, $body);
        elseif (is_array($sessionOrParams)) :
            $result = $curl->send(null, $body, $sessionOrParams);
        endif;
        $result = json_decode($result);
        return new ConfirmPaymentResponse($result);
    }

}
