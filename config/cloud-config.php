<?php
require_once('../vendor/autoload.php');
use Cloudinary\Cloudinary;

$cloudinary = new Cloudinary([
  'cloud' => [
    'cloud_name' => 'dxutgbpka',
    'api_key'    => '878855571264675',
    'api_secret' => 'jRURmhFZdWH-5hE5Jy6PMcshaHk',
  ],
  'url' => [
    'secure' => true
  ]
]);
?>