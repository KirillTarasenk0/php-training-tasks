<?php

$json = '{ "ru": ["пн", "вт", "ср"], "en": ["mn", "tu", "wd"] }';
$json = json_decode($json, true);
print_r($json);