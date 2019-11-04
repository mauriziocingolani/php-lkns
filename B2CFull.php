<?php

namespace mauriziocingolani\lkns;

use mauriziocingolani\lkns\classes\{
    AnalyticRoute,
    Location,
    TransportationType,
    TripsOfDayWithDictionary
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
     
 }
