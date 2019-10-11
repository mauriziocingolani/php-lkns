<?php

namespace mauriziocingolani\lkns;

/**
 * Description of Curl
 *
 * @property boolean $debug
 * @property string $url
 * @property string $contentType
 * @property integer $connectTimeout
 * @property integer $timeout
 * @property boolean $returnTransfer
 * @property boolean $header
 * @property array $httpHeaders
 *
 * @author Maurizio Cingolani <mauriziocingolani74@gmail.com>
 * @author Paolo Calvaresi <paolo.calvaresi.v@gmail.com>
 * @author Michele Domesi <m.domesi@hotmail.it>
 * @version 1.0
 */
class Curl {

    private $debug = true;
    private $url;
    private $contentType = 'application/json';
    private $connectTimeout = 10;
    private $timeout = 10;
    private $returnTransfer = true;
    private $header = false;
    private $httpHeaders = [];


    /**
     * Curl constructor.
     * @param string $url
     */
    public function __construct(string $url) {
        $this->url = $url;
    }


    /**
     * @param string|null $session
     * @param Object|null $post
     * @param array|null $credentials
     * @return bool|string
     */
    public function send(string $session = null, Object $post = null, array $credentials = null) {
        # setto gli headers
        array_push($this->httpHeaders, 'Content-Type: ' . $this->contentType);
        if (isset($session)) :
            array_push($this->httpHeaders, 'Session: ' . $session);
        elseif (isset($credentials)) :
            $this->httpHeaders = array_merge($this->httpHeaders, $credentials);
        endif;
        # chiamata
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $this->url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, $this->returnTransfer);
        curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, $this->connectTimeout);
        curl_setopt($curl, CURLOPT_TIMEOUT, $this->timeout);
        curl_setopt($curl, CURLOPT_HEADER, $this->header);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $this->httpHeaders);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        if (isset($post)) :
            curl_setopt($curl, CURLOPT_POST, 1);
            curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($post));
        endif;
        $result = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);
        if ($err && $this->debug) :
            echo 'ERROR: ' . $err;
        endif;
        return $result;
    }

}
