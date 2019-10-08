<?php

namespace mauriziocingolani\lkns;

use mauriziocingolani\lkns\classes\BookingResponse;
use mauriziocingolani\lkns\classes\OptionalBookingResponse;
use mauriziocingolani\lnks\classes\VoucherOfBooking;

/**
 * @author Maurizio Cingolani <mauriziocingolani74@gmail.com>
 * @author Paolo Calvaresi <paolo.calvaresi.v@gmail.com>
 * @author Michele Domesi <m.domesi@hotmail.it>
 * @version 1.0.0
 */
class B2B extends B2CFull {

    protected $url;

    /* Metodi */

    public function __construct($url) {
        parent::__construct(...func_get_args());
        $this->url = $url;
    }

    /**
     * getRetrieveBooking
     * This method fetches a previously booked (optional or finalized).
     * @param string $session
     * @param string $company_abbreviation (Required) A list of comma separated company abbreviations (es: AML,ANSF)
     * @param string $root_res_code (Required) ?
     * @return BookingResponse[]
     */
    public function getRetrieveBooking(string $session, string $company_abbreviation, string $root_res_code) {
        $url = $this->url . '/retrieve-bookings' . '/' . $company_abbreviation . '/' . $root_res_code;
        $curl = new Curl($url);
        $result = $curl->send($session);
        $result = json_decode($result);
        $data = [];
        foreach ($result as $br) :
            $data[] = new BookingResponse($br);
        endforeach;
        return $data;
    }

    /**
     * getRetrieveBooking_1
     * This method fetches a previously booked (optional or finalized).
     * @param string $session
     * @param integer $crsReservationIds
     * @return BookingResponse[]
     */
    public function getRetrieveBooking_1(string $session, int $crsReservationIds) {
        $args = get_defined_vars();
        $queryString = $this->getQueryString($args);
        $url = $this->url . '/retrieve-bookings';
        if (!empty($queryString)) :
            $url .= '?' . $queryString;
        endif;
        $curl = new Curl($url);
        $result = $curl->send($session);
        $result = json_decode($result);
        $data = [];
        foreach ($result as $br) :
            $data[] = new BookingResponse($br);
        endforeach;
        return $data;
    }

    /**
     * getIssueOptionalBooking
     * This method tickets an optional booking.
     * @param string $session
     * @param integer $crs_reservation_id (Required) [...]’ unique identification number.
     * @return BookingResponse
     */
    public function getIssueBooking(string $session, int $crs_reservation_id) {
        $url = $this->url . '/issue-booking' . '/' . $crs_reservation_id;
        $curl = new Curl($url);
        $result = $curl->send($session);
        $result = json_decode($result);
        return new BookingResponse($result);
    }

    /**
     * getIssueOptionalBookingWithApproval
     * This method tickets an optional booking.
     * @param string $session
     * @param integer $crs_reservation_id (Required) [...]’ unique identification number.
     * @param string $approval_code (Required)
     * @return BookingResponse
     */
    public function getIssueBookingWithApproval(string $session, int $crs_reservation_id, string $approval_code) {
        $url = $this->url . '/issue-booking' . '/' . $crs_reservation_id . '/' . $approval_code;
        $curl = new Curl($url);
        $result = $curl->send($session);
        $result = json_decode($result);
        return new BookingResponse($result);
    }

    /**
     * getConvertTicketedBookingToOptional
     * This method creates an optional booking of a specific quote.
     * The criteria entity is called “Booking request”.
     * The structure of the entity can be found on the table, below.
     * @param string $session
     * @param integer $crs_reservation_id (Required) [...]’ unique identification number.
     * @return OptionalBookingResponse
     */
    public function getConvertTicketedBookingToOptional(string $session, int $crs_reservation_id) {
        $url = $this->url . '/convert-to-optional-booking' . '/' . $crs_reservation_id;
        $curl = new Curl($url);
        $result = $curl->send($session);
        $result = json_decode($result);
        return new OptionalBookingResponse($result);
    }

    /**
     * getSplitBooking
     * The method splits a booking into two.
     * @param string $session
     * @param integer $crs_reservation_id (Required) [...]’ unique identification number.
     * @return BookingResponse
     */
    public function getSplitBooking(string $session, int $crs_reservation_id) {
        $url = $this->url . '/split-booking' . '/' . $crs_reservation_id;
        $curl = new Curl($url);
        $result = $curl->send($session);
        $result = json_decode($result);
        return new BookingResponse($result);
    }

    /**
     * getMergeBookings
     * The method merges two different bookings into a new one.
     * @param string $session
     * @param integer $a_crs_reservation_id (Required) [...]’ unique identification number.
     * @param integer $b_crs_reservation_id (Required) [...]’ unique identification number.
     * @return BookingResponse
     */
    public function getMergeBookings(string $session, int $a_crs_reservation_id, int $b_crs_reservation_id) {
        $url = $this->url . '/merge-bookings' . '/' . $a_crs_reservation_id . '/' . $b_crs_reservation_id;
        $curl = new Curl($url);
        $result = $curl->send($session);
        $result = json_decode($result);
        return new BookingResponse($result);
    }

    /**
     * getGenerateVoucher
     * The method responds with the voucher of the booking.
     * @param string session
     * @param integer $crs_reservation_id (Required) [...]’ unique identification number.
     * @return VoucherOfBooking
     */
    public function getGenerateVoucher(string $session, int $crs_reservation_id) {
        $url = $this->url . '/generate-voucher' . '/' . $crs_reservation_id;
        $curl = new Curl($url);
        $result = $curl->send($session);
        $result = json_decode($result);
        return new VoucherOfBooking($result);
    }

    /**
     * getPendingBookingDetails
     * The method responds with agency's pending optional bookings, for a specific date
     * @param string $session
     * @param string $start_date (Required)
     * @return PendingBookingDetail[]
     */
    public function getPendingBookingDetails(string $session, string $start_date) {
        $url = $this->url . '/pending-booking' . '/' . $start_date;
        $curl = new Curl($url);
        $result = $curl->send($session);
        $result = json_decode($result);
        $data = [];
        foreach ($result as $r) :
            $data[] = new PendingBookingDetail($r);
        endforeach;
        return $data;
    }

    /**
     * getPendingBookingDetailsWithEnd
     * The method responds with agency's pending optional bookings, for a specific date
     * @param string $session
     * @param string $start_date (Required)
     * @param string $finish_date (Required)
     * @return PendingBookingDetail[]
     */
    public function getPendingBookingDetailsWithEnd(string $session, string $start_date, string $finish_date) {
        $url = $this->url . '/pending-booking' . '/' . $start_date . '/' . $finish_date;
        $curl = new Curl($url);
        $result = $curl->send($session);
        $result = json_decode($result);
        $data = [];
        foreach ($result as $r) :
            $data[] = new PendingBookingDetail($r);
        endforeach;
        return $data;
    }

    /**
     * getCashierData
     * The method responds with agency's cashier, for a specific date range
     * @param string $session
     * @param string $start_date (Required)
     * @return CashierTicketResponse
     */
    public function getCashierData(string $session, string $start_date) {
        $url = $this->url . '/cashier-data' . '/' . $start_date;
        $curl = new Curl($url);
        $result = $curl->send($session);
        $result = json_decode($result);
        return new CashierTicketResponse($result);
    }

    /**
     * getCashierDataWithEnd
     * The method responds with agency's cashier, for a specific date range
     * @param string $session
     * @param string $start_date (Required)
     * @param string $finish_date (Required)
     * @return CashierTicketResponse
     */
    public function getCashierDataWithEnd(string $session, string $start_date, string $finish_date) {
        $url = $this->url . '/cashier-data' . '/' . $start_date . '/' . $finish_date;
        $curl = new Curl($url);
        $result = $curl->send($session);
        $result = json_decode($result);
        return new CashierTicketResponse($result);
    }

    /**
     * getVehicleAccommodations
     * The response of the method, returns a list of the vehicle accommodations.
     * @param string $session
     * @param string $company_abbreviation A list of comma separated company abbreviations
     * @return Accomodation[]
     */
    public function getVehicleAccommodations(string $session, string $company_abbreviation = null) {
        $args = get_defined_vars();
        $queryString = $this->getQueryString($args);
        $url = $this->url . '/vehicle-accommodations';
        if (!empty($queryString)) :
            $url .= '?' . $queryString;
        endif;
        $curl = new Curl($url);
        $result = $curl->send($session);
        $result = json_decode($result);
        $data = [];
        foreach ($result as $r) :
            $data[] = new Accomodation($r);
        endforeach;
        return $data;
    }

    /**
     * getPassengerTypes
     * The response of the method, contains the valid passenger types.
     * @param string $session
     * @return PassengerType[]
     */
    public function getPassengerTypes(string $session) {
        $url = $this->url . '/passenger-types';
        $curl = new Curl($url);
        $result = $curl->send($session);
        $result = json_decode($result);
        $data = [];
        foreach ($result as $r) :
            $data[] = new PassengerType($r);
        endforeach;
        return $data;
    }

    /**
     * getReconcileByCmpId
     * The response of the method, returns a list of the vehicle accommodations.
     * @param string $session
     * @param string $company_abbreviation A list of comma separated company abbreviations
     * @param string $root_res_code
     * @return BillingReconciliationResponseDto
     */
    public function getReconcileByCmpId(string $session, string $company_abbreviation = null, string $root_res_code = null) {
        $args = get_defined_vars();
        $queryString = $this->getQueryString($args);
        $url = $this->url . '/reconcile/by-cmp-id';
        if (!empty($queryString)) :
            $url .= '?' . $queryString;
        endif;
        $curl = new Curl($url);
        $result = $curl->send($session);
        $result = json_decode($result);
        return new BillingReconciliationResponseDto($result);
    }

    /**
     * getReconcileByCrsId
     * This method is used for billing reconciliation
     * @param string $session
     * @param integer $crsReservationId A list of comma separated company abbreviations
     * @return BillingReconciliationResponseDto
     */
    public function getReconcileByCrsId(string $session, int $crsReservationId = null) {
        $args = get_defined_vars();
        $queryString = $this->getQueryString($args);
        $url = $this->url . '/reconcile/by-csr-id';
        if (!empty($queryString)) :
            $url .= '?' . $queryString;
        endif;
        $curl = new Curl($url);
        $result = $curl->send($session);
        $result = json_decode($result);
        return new BillingReconciliationResponseDto($result);
    }

    // POST

    /**
     * doReconcile
     * his method is used for billing reconciliation
     * @param string session
     * @param BillingReconciliationRequestDto $body
     * @return BillingReconciliationRsponseDto
     */
    public function doReconcile(string $session, $body) {
        $url = $this->url . '/reconcile';
        $curl = new Curl($url);
        $result = $curl->send($session, $body);
        $result = json_decode($result);
        return new BillingReconciliationResponseDto($result);
    }

    /**
     * doOptionalBooking
     * This method creates an optional booking of a specific quote. The criteria entity is called “Booking request”.
     * The structure of the entity can be found on the table, below.
     * This method can be used only if it is supported by the operator.
     * The expiration date of the booking is stored in “optionDateTime” field and depends on the operator.
     * The method should use header variable “booking-identifier-id” with the value produced from the latest doPricingMethod (which will be used for the bank payment).
     * @param string session
     * @param BookingRequest $body  The criteria entity is called “Booking request”.
     * @return BookingResponse
     */
    public function doOptionalBooking(string $session, $body) {
        $url = $this->url . '/optional-booking';
        $curl = new Curl($url);
        $result = $curl->send($session, $body);
        $result = json_decode($result);
        return new BookingResponse($result);
    }

    /**
     * doBookingModification
     * This method is used for modifying an optional booking.
     * @param string session
     * @param BookingModificationRequest $body  The entity contains the updated items of the booking.
     * @return BookingModificationResponse
     */
    public function doBookingModification(string $session, $body) {
        $url = $this->url . '/modify';
        $curl = new Curl($url);
        $result = $curl->send($session, $body);
        $result = json_decode($result);
        return new BookingModificationResponse($result);
    }

    /**
     * doConvertBookingToOpen
     * The method converts all or some tickets of a ticketed booking to open tickets.
     * @param string session
     * @param ConvertBookingToOpenRequest $body if the request’s tickets entity is empty, then the whole booking will be convetred to open.
     * @return BookingResponse
     */
    public function doConvertBookingToOpen(string $session, $body) {
        $url = $this->url . '/convert-booking-to-open';
        $curl = new Curl($url);
        $result = $curl->send($session, $body);
        $result = json_decode($result);
        return new BookingResponse($result);
    }

    /**
     * doReplaceOpenTickets
     * This method books a specific quote that contains open tickets.
     * The criteria entity is called “Booking request”. The structure of the entity can be found on the table, below
     * @param string session
     * @param BookingRequest $body The criteria entity is called “Booking request”.
     * @return BookingResponse
     */
    public function doReplaceOpenTickets(string $session, $body) {
        $url = $this->url . '/replace-open-tickets';
        $curl = new Curl($url);
        $result = $curl->send($session, $body);
        $result = json_decode($result);
        return new BookingResponse($result);
    }

    /**
     * doBookingCancellation
     * This method is used for cancelling a previously ticketed booking.
     * The method can either be called for fetching the cancellation fees or do the actual cancellation.
     * The method responds with “Cancellation response” entity.
     * @param string session
     * @param BookingCancellationRequest $body if the request’s trips entity is empty, then the whole booking will be cancelled.
     * @return CancellationResponse
     */
    public function doBookingCancellation(string $session, $body) {
        $url = $this->url . '/cancellation';
        $curl = new Curl($url);
        $result = $curl->send($session, $body);
        $result = json_decode($result);
        return new CancellationResponse($result);
    }

}
