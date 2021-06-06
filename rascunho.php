<?php

//Endereço do arquivo do certificado
//Obs.: Tentei usar o certificado no formato PFX e não funcionou
//Para converter use o comando no Prompt do Windows ou Terminal do Linux:
//openssl pkcs12 -in certificado.pfx -out tcpdf.crt -nodes
$cert = 'C:\\tcpdf.crt';

//Informações da assinatura - Preencha com os seus dados
$info = array(
   'Name' => 'Nome',
   'Location' => 'Localidade',
   'Reason' => 'Descreva o motivo da assinatura',
   'ContactInfo' => 'Dados de contato',
);

$pdf = new Fpdi();
//Configura a assinatura. Para saber mais sobre os parâmetros
//consulte a documentação do TCPDF, exemplo 52.
//Não esqueça de mudar 'senha' para a senha do seu certificado
$pdf->setSignature('file://'.$cert, 'file://'.realpath($cert), 'senha','', 2, $info);

//Importa uma página
$pdf->AddPage();
$pdf->setSourceFile("C:\\documento.pdf");
$tplId = $pdf->importPage(1);
$pdf->useTemplate($tplId, 0, 0); //Importa nas medidas originais

//Manda o PDF pra download
$pdf->Output('teste.pdf', 'D');