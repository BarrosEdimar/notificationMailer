<?php
require __DIR__ . '/lib_ext/autoload.php';

use Notification\Email;

$novoEmail = new Email;
$novoEmail->sendMail(
    "Asusto test",
    "<p><strong>Email</strong> test</p>",
    "edimarbarros@hode.com.br",
    "Edimar Barros - Hode",
    "edimarbarros90@gmail.com",
    "Edimar Barros"
);

var_dump($novoEmail);