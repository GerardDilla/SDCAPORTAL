<?php
require_once '../../vendor/autoload.php';
require_once('base.php');
session_start();

$paymentMethod = $_GET['method'];
$payload = modifyPayload($_SESSION['Payment_Registration']);//createPayload($paymentMethod);
$payload['options']['frame-ancestor'] = getBaseUrl();
if (retrievePaymentRedirectUrl($payload, $paymentMethod)) {
    redirect('../payment/embedded.php');
}
