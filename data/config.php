<?php
/**
 * Created by PhpStorm.
 * User: felix
 * Date: 9/25/15
 * Time: 10:56 AM
 */

global $config;
$config = json_decode(file_get_contents('data/config.json'), true);