<?php

namespace mauriziocingolani\lkns;

use mauriziocingolani\lkns\classes\{
    AnalyticRoute,
    Location,
    TransportationType
};

/**
 * @author Maurizio Cingolani <mauriziocingolani74@gmail.com>
 * @author Paolo Calvaresi <paolo.calvaresi.v@gmail.com>
 * @author Michele Domesi <m.domesi@hotmail.it>
 * @version 1.0.0
 */
 class B2CFull extends B2CBasic {

     protected $url;

     /* Metodi */

     public function __construct($url) {
         parent::__construct(...func_get_args());
         $this->url = $url;
     }

    /**
     * getLocationsWithFilters 
     * The method is used to search within the locations. Search can be performed on the Location Code, the Location Description and Country Code.
     * A full match is required for any of these fields.
     * The http get parameter “searchText”, is used for filtering the location data and fetching precisely what the user has asked for.
     * The http get parameter “locationType“ (referred previously), may also be used.
     * @param string session
     * @param string $company_abbreviations A list of comma separated company abbreviations (es: AML,ANSF).
     * @param string $locationType Possible values are HARBOUR, GENERIC_LOCATION, BUS_STOP etc.
     * @param string $searchText (Required) A String to search for within Location Code, Location Description or Country Code.
     * @return Location[]
     */
    public function getLocationsWithFilters(string $session, string $company_abbreviations = null, string $locationType = null, string $searchText = null) {
        $args = get_defined_vars();
        $queryString = $this->getQueryString($args);
        $url = $this->url . '/locations-with-filter';
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
     * getRoutesWithFilter
     * This method fetches all the possible routes from a selected Origin.
     * The Origin is given in the Search Text parameter and can be either the Location Code or Description.
     * The response of the method, is a list of “Transportation” entities, in JSON format.
     * The http get parameter “searchText”, is used for filtering the routes data and fetching precisely what the user has asked for. The search is performed within all records of the results
     * @param string session
     * @param string $company_abbreviations A list of comma separated company abbreviations (es: AML,ANSF).
     * @param string $transportationType Possible values are BT (data for bus transportation), ST (data for sea transportation) and AT (data for both sea and bus transportation). Default value, is AT.
     * @param string $searchText (Required) The Origin Location To Search for. Can be either Location Code or Description (es: PIR).
     * @param string $destination The destination Location To Search for. Can be either Location Code or Description. (es: AEG)
     * @return TransportationType[]
     */
    public function getRoutesWithFilter(string $session, string $company_abbreviations = null, string $transportationType = null, string $searchText = null, string $destination = null) {
        $args = get_defined_vars();
        $queryString = $this->getQueryString($args);
        $url = $this->url . '/routes-with-filter';
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
     * getAnalyticRoutes
     * This method fetches all the possible routes for each transportation type.
     * Specifically for the bus transportation part, data fetched include only those bus operators, who support this functionality.
     * The integrators should contact [...] about the companies that support the functionality.
     * The response of the method, is a list of “Transportation” entities, in JSON format.
     * @param string session
     * @param string $company_abbreviations A list of comma separated company abbreviations (es: AML,ANSF).
     * @param string $transportationType Possible values are BT (data for bus transportation), ST (data for sea transportation) and AT (data for both sea and bus transportation). Default value, is AT.
     * @return AnalyticRoute[]
     */
    public function getAnalyticRoutes(string $session, string $company_abbreviations = null, string $transportationType = null) {
        $args = get_defined_vars();
        $queryString = $this->getQueryString($args);
        $url = $this->url . '/analytic-routes';
        if (!empty($queryString)) :
            $url .= '?' . $queryString;
        endif;
        $curl = new Curl($url);
        $result = $curl->send($session);
        $result = json_decode($result);
        $data = [];
        foreach ($result as $a) :
            $data[] = new AnalyticRoute($a);
        endforeach;
        return $data;
    }

     // POST

     /**
     * doRouteFrequency
     * This method is used to fetch the dates of trip execution, starting from the current date.
     * The criteria entity is called “Route frequency request”.
     * @param RouteFrequencyRequest $body (Required) The criteria entity is called “Route frequency request”
     * @return RouteFrequency[]
     */
     public function doRouteFrequency(string $session, $body) {
         $url = $this->url . '/route-frequency';
         $curl = new Curl($url);
         $result = $curl->send($session, $body);
         $result = json_decode($result);
         $data = [];
         foreach ($result as $r) :
             $data[] = new RouteFrequency($r);
         endforeach;
         return $data;
     }

     /**
      * doTripsPerDay
     * This method provides with timetable data grouped by day.
     * Field “daysToSearch” stores the number of days to search prior and after “departure Date”.
     * The entity used, for posting data, is “Time table”, in JSON format.
     * This method does not fetch availability data and route analysis.
     * @param string session
     * @param TimetablePerDayRequest $body The criteria entity is called “Time table” request.
     * @return TripsOfDayWithDictionary
     */
     public function doTripsPerDay(string $session, $body) {
         $url = $this->url . '/trips-per-day';
         $curl = new Curl($url);
         $result = $curl->send($session, $body);
         $result = json_decode($result);
         return new TripsOfDayWithDictionary($result);
     }

     /**
      * doTripWithConjunction
     * This method provides trips on combined itineraries
     * The method returns possible alternative routes that connect two locations.
     * The most significant parameter, is maxConjunctions, which defines the maximum allowed transtitions, in order to get from origin location, to the destination location.
     * @param string session
     * @param TimetableConjunctionRequest $body The criteria entity is called “Time table” request.
     * @return TripsWithDictionary
     */
     public function doTripWithConjunction(string $session, $body) {
         $url = $this->url . '/trips-per-day';
         $curl = new Curl($url);
         $result = $curl->send($session, $body);
         $result = json_decode($result);
         return new TripsOfDayWithDictionary($result);
     }

     
 }
