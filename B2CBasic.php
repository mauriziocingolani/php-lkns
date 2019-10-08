<?php

namespace mauriziocingolani\lkns;

use mauriziocingolani\lkns\classes\CancellationResponse;
use mauriziocingolani\lkns\classes\Company;
use mauriziocingolani\lkns\classes\Country;
use mauriziocingolani\lkns\classes\Location;
use mauriziocingolani\lkns\classes\TransportationType;

/**
 * @author Maurizio Cingolani <mauriziocingolani74@gmail.com>
 * @author Paolo Calvaresi <paolo.calvaresi.v@gmail.com>
 * @author Michele Domesi <m.domesi@hotmail.it>
 * @version 1.0.0
 */
class B2CBasic {

    protected $url;
    private $agencyCode;
    private $agencyUserName;
    private $agencyPassword;
    private $agencySignature;
    private $languageCode;

    /* Metodi */

    public function __construct($url, $agencyCode, $agencyUserName, $agencyPassword, $agencySignature, $languageCode) {
        $this->url = $url;
        $this->agencyCode = $agencyCode;
        $this->agencyUserName = $agencyUserName;
        $this->agencyPassword = $agencyPassword;
        $this->agencySignature = $agencySignature;
        $this->languageCode = $languageCode;
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
     * The method is used to get a user's session or create a new one
     * @return string
     */
    public function getSession() {
        $curl = new Curl($this->url . '/session');
        $result = $curl->send(null, null, [
            'agency-code:' . $this->agencyCode,
            'agency-user-name:' . $this->agencyUserName,
            'agency-password:' . $this->agencyPassword,
            'agency-signature:' . $this->agencySignature,
            'language-code:' . $this->languageCode,
        ]);
        $result = \json_decode($result);
        return $result->session;
    }

    /**
     * getLocations
     * This method provides all the locations that are associated with the operators (ferry operators, bus operators, etc.) where the agency has access.
     * Geolocation data is also provided.
     * A location can be a part of one or more distinctive sections.
     * This entity is called “area”. There is an optional http get parameter, called locationType for fetching specific types of locations (sea ports, bus stations, etc.).
     * @param string session
     * @param string $company_abbreviations A list of comma separated company abbreviations (es: AML,ANSF).
     * @param string $locationType Possible values are HARBOUR, GENERIC_LOCATION, BUS_STOP etc.
     * @return Location[]
     */
    public function getLocations(string $session, string $company_abbreviations = null, string $locationType = null) {
        $args = get_defined_vars();
        $queryString = $this->getQueryString($args);
        $url = $this->url . '/locations';
        if (!empty($queryString)) :
            $url .= '?' . $queryString;
        endif;
        $curl = new Curl($url);
        $result = $curl->send($session);
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
     * @param string session
     * @param string $company_abbreviations A list of comma separated company abbreviations (es: AML,ANSF).
     * @param string $transportationType Possible values are BT (data for bus transportation), ST (data for sea transportation) and AT (data for both sea and bus transportation). Default value, is AT.
     * @return TransportationType[]
     */
    public function getRoutes(string $session, string $company_abbreviations = null, string $transportationType = null) {
        $args = get_defined_vars();
        $queryString = $this->getQueryString($args);
        $url = $this->url . '/routes';
        if (!empty($queryString)) :
            $url .= '?' . $queryString;
        endif;
        $curl = new Curl($url);
        $result = $curl->send($session);
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
     * @param string session
     * @param integer $crs_reservation_id (Required) [...]’ unique identification number.
     * @return CancellationResponse
     */
    public function getCancellation(string $session, int $crs_reservation_id) {
        $url = $this->url . '/cancellation' . '/' . $crs_reservation_id;
        $curl = new Curl($url);
        $result = $curl->send($session);
        $result = json_decode($result);
        return new CancellationResponse($result);
    }

    /**
     * getFinancialData
     * The method responds with agency's financial data at a specific company
     * The response contains all the agency’s necessary financial details, for the specified
     * operator. The company parameter is provided by doCompanies method.
     * @param string session
     * @param string $company_abbreviation (Required) Company abbreviation (es: TS2)
     * @return String[]
     */
    public function getFinancialData(string $session, string $company_abbreviation) {
        $url = $this->url . '/financial-data' . '/' . $company_abbreviation;
        $curl = new Curl($url);
        $result = $curl->send($session);
        $result = json_decode($result);
        return $result;
    }

    /**
     * getCompanies
     * The method responds with a list of the agency's affiliate companies.
     * @param string session
     * @return Company[]
     */
    public function getCompanies(string $session) {
        $url = $this->url . '/companies';
        $curl = new Curl($url);
        $result = $curl->send($session);
        $result = json_decode($result);
        $data = [];
        foreach ($result as $r) :
            $data[] = new Company($r);
        endforeach;
        return $data;
    }

    /**
     * getCountries
     * This method provides available nationalities and telephone code prefixes
     * @param string session
     * @return Country[]
     */
    public function getCountries(string $session) {
        $url = $this->url . '/countries';
        $curl = new Curl($url);
        $result = $curl->send($session);
        $result = json_decode($result);
        $data = [];
        foreach ($result as $r) :
            $data[] = new Country($r);
        endforeach;
        return $data;
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
     * @param string session
     * @param TimetableRequest $body The criteria entity is called “Time table” request.
     * @return TripsWithDictionary
     */
    public function doTrips(string $session, $body) {
        $url = $this->url . '/trips';
        $curl = new Curl($url);
        $result = $curl->send($session, $body);
        $result = json_decode($result);
        return new TripsWithDictionary($result);
    }

    /**
     * doSimpleTrips
     * This method provides with trips for specific criteria. The criteria entity is called “Time table” request.
     * The specific method is a subset of doTrips and is available on B2C Basic flavor, only. The entity “quoteRequest” is not available in this flavor.
     * The response differs from doTrip’s, since it does not include fare codes, content and on-board services, among others.
     * @param string session
     * @param TimetableRequest $body The criteria entity is called “Time table” request.
     * @return TripsWithDictionary
     */
    public function dotSimpleTrips(string $session, $body) {
        $url = $this->url . '/trips';
        $curl = new Curl($url);
        $result = $curl->send($session, $body);
        $result = json_decode($result);
        return new TripsWithDictionary($result);
    }

    /**
     * doListOfTrips
     * This method provides with list of trips for specific criteria. The criteria entity is called “Time table” request
     * This method allows a list of trip requests, as input where doTrips method, allows only one.
     * Everything mentioned in doTrips, applies in this method, as well.
     * This method allows any type of combinations of origin & destinations and returns all available trips.
     * @param string session
     * @param TimetableRequest $body The criteria entity is called “Time table” request.
     * @return TripsWithDictionary
     */
    public function doListOfTrips(string $session, $body) {
        $url = $this->url . '/list-of-trips';
        $curl = new Curl($url);
        $result = $curl->send($session, $body);
        $result = json_decode($result);
        return new TripsWithDictionary($result);
    }

    /**
     * doPricing
     * This method provides pricing for a specific quote. The criteria entity is called “Pricing request”.
     * @param string session
     * @param BookingRequest $body The criteria entity is called “Pricing request”.
     * @return PricingResponse
     */
    public function doPricing(string $session, $body) {
        $url = $this->url . '/pricing';
        $curl = new Curl($url);
        $result = $curl->send($session, $body);
        $result = json_decode($result);
        return new PricingResponse($result);
    }

    /**
     * doBooking
     * This method books a specific quote. The criteria entity is called “Booking request”.
     * The structure of the entity can be found on the table, below.
     * @param string session
     * @param BookingRequest $body  The criteria entity is called “Booking request”.
     * @return BookingResponse
     */
    public function doBooking(string $session, $body) {
        $url = $this->url . '/bookig';
        $curl = new Curl($url);
        $result = $curl->send($session, $body);
        $result = json_decode($result);
        return new BookingResponse($result);
    }

    /**
     * doConfirmPayment
     * This method is used for confirming a payment of a booking, by entering into the system the approvalCode of the payment returned by the payment system in use.
     * Used for finalizing the payment process of a ticketed booking.
     * The bank payment data (approval code and transaction code) are inserted, in order for the operator to take the booking, as valid.
     * This method is used in relation with the field goToPayment of BookingRequest entity.
     * @param string session
     * @param ConfirmPaymentRequest $body
     * @return ConfirmPaymentResponse
     */
    public function doConfirmPayment(string $session, $body) {
        $url = $this->url . '/confirm-payment';
        $curl = new Curl($url);
        $result = $curl->send($session, $body);
        $result = json_decode($result);
        return new ConfirmPaymentResponse($result);
    }

}
