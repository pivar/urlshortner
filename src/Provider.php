<?php

/*
 * This file is part of pivar/urlshortner package
 * (c) ravi@isensical.com
 *
 * Distributed under Creative Commons License
 */

 namespace Pivar\Urlshortner;

 interface Provider
 {
   public function shortUrl($url);

   public function expandUrl($url);

 }
