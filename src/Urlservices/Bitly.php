<?php

/*
 * This file is part of pivar/urlshortner package
 * (c) ravi@isensical.com
 *
 * Distributed under Creative Commons License
 */

 namespace Pivar\Urlshortner\Urlservices;
 use Pivar\Urlshortner\Provider;
 use Http\Client\HttpClient;

 Class Bitly implements Provider
 {

   const ENDPOINT = 'https://api-ssl.bitly.com/v3';
   private $accessToken;
   private $httpClient;
   private $reqFactory;

   public function __construct($accessToken, HttpClient $httpClient, RequestFactory $reqFactory){

      $this->accessToken = $accessToken;
      $this->httpClient = $httpClient;
      $this->requestFactory = $reqFactory;
   }


   public function shortUrl($url){
       $url = sprintf('%s/shorten?%s', self::ENDPOINT, http_build_query([
           'access_token' => $this->accessToken,
           'longUrl'      => trim($url),
           ]));
       $request = $this->requestFactory->createRequest('GET', $url);
       $response = $this->httpClient->sendRequest($request);
       $response = json_decode((string) $response->getBody());
       return $response->data->url;
   }
   

   public function expandUrl($url){
       $url = sprintf('%s/expand?%s', self::ENDPOINT, http_build_query([
           'access_token' => $this->accessToken,
           'shortUrl'     => trim($url),
       ]));
       $request = $this->requestFactory->createRequest('GET', $url);
       $response = $this->httpClient->sendRequest($request);
       $response = json_decode((string) $response->getBody());
       return $response->data->expand[0]->long_url;
   }

 }
