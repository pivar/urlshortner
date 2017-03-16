<?php

/*
 * This file is part of pivar/urlshortner package
 * (c) ravi@isensical.com
 *
 * Distributed under Creative Commons License
 */

 namespace Pivar\Urlshortner;

 class UrlShortner
 {

   protected $provider;

   public function __construct(Provider $provider)
   {
     $this->provider = $provider;
   }


   /**
   * @param string $url
   *
   * @return string
   **/
   public function shorten($url)
   {
     return $this->provider->shortUrl($url);
   }

   /**
   * @param string $url
   *
   * @return string
   **/
   public function expand($url)
   {
     return $this->provider->expandUrl($url);
   }

 }
