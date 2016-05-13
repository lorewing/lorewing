<?php
// ----------------------------------------------------------------------
// Copyright (C) 2012 by Khaled Al-Shamaa.
// http://www.ar-php.org
// ----------------------------------------------------------------------
// LICENSE

// This program is open source product; you can redistribute it and/or
// modify it under the terms of the GNU General Public License (GPL)
// as published by the Free Software Foundation; either version 2
// of the License, or (at your option) any later version.

// This program is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.

// To read the license please visit http://www.gnu.org/copyleft/gpl.html
// ----------------------------------------------------------------------
// Filename: rpa.php
// Original  Author(s): Khaled Al-Sham'aa <khaled.alshamaa@gmail.com>
// Purpose:  Response TinyMCE plugin AJAX requests
// ----------------------------------------------------------------------
require_once('Arabic.php');

$action = $_GET['action'];
if(isset($_GET['param'])) $param = $_GET['param'];

switch($action){
  case 'standard':
    $ar = new I18N_Arabic('Standard');

    echo $ar->standard($param);

    break;

  case 'number':
    $ar = new I18N_Arabic('Numbers');

    $ar->setFeminine(2);
    $ar->setFormat(2);
    
    echo $param . ' ' .$ar->int2str($param);

    break;

  case 'date':
    $ar = new I18N_Arabic('Date');
    date_default_timezone_set('UTC');
    $time = time();

    $ar->setMode(4);
    echo $ar->date('l jS F Y', $time);

    break;

  case 'hijri':
    $ar = new I18N_Arabic('Date');
    date_default_timezone_set('UTC');
    $time = time();

    $ar->setMode(1);
    $fix = $ar->dateCorrection ($time);
    echo $ar->date('l jS F Y', $time, $fix);

    break;

  case 'keyboard':
    $ar = new I18N_Arabic('KeySwap');

    $temp_ae = $ar->swapAe($param);
    $temp_ea = $ar->swapEa($param);
    
    $sim_ae = similar_text($param, $temp_ae);
    $sim_ea = similar_text($param, $temp_ea);
    
    if ($sim_ea >= $sim_ae) {
        echo $temp_ae;
    } else {
        echo $temp_ea;
    }

    break;

  case 'en_terms':
    if (preg_match("/^[\w\d\s]+$/i", $param)) {
        $ar = new I18N_Arabic('Transliteration');
        echo $ar->en2ar($param) . " ($param)";
    } else {
        $ar = new I18N_Arabic('Transliteration');
        echo $ar->ar2en($param) . " ($param)";
    }

    break;
}
?>
