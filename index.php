<?php

use setasign\Fpdi\Fpdi;

$cert = 'C:\\tcpdf.crt';

$info = [
    'Name' => 'Nome',
    'Location' => 'Localidade',     
    'Reason' => 'Descreva o motivo da assinatura',
    'ContactInfo' => 'Dados de contato'
];

$fpdi = new Fpdi();

$fpdi->setSignature('file://'.$cert, 'file://'.realpath($cert), 'senha','', 2, $info);