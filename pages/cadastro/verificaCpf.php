<?php

function CalculaCPF($CampoNumero)
{

  $RecebeCPF=$CampoNumero;
  $retorno = $CampoNumero;
//Retirar todos os caracteres que nao sejam 0-9

  $s="";
  for ($x=1; $x<=strlen($RecebeCPF); $x=$x+1)
  {

    $ch=substr($RecebeCPF,$x-1,1);
    if (ord($ch)>=48 && ord($ch)<=57)
    {

      $s=$s.$ch;
    } 


  } 

  $RecebeCPF=$s;

  if (strlen($RecebeCPF)!=11)
  {
    $retorno = 0; 
    echo "<h1>&Eacute; obrigat&oacute;rio o CPF com 11 d&iacute;gitos</h1>";
}
    else
  if ($RecebeCPF=="00000000000")
  {
	$retorno = 0; 
    echo "<h1>CPF Inv�lido</h1>";
  }
    else
  {


    $Numero[1]=intval(substr($RecebeCPF,1-1,1));
    $Numero[2]=intval(substr($RecebeCPF,2-1,1));
    $Numero[3]=intval(substr($RecebeCPF,3-1,1));
    $Numero[4]=intval(substr($RecebeCPF,4-1,1));
    $Numero[5]=intval(substr($RecebeCPF,5-1,1));
    $Numero[6]=intval(substr($RecebeCPF,6-1,1));
    $Numero[7]=intval(substr($RecebeCPF,7-1,1));
    $Numero[8]=intval(substr($RecebeCPF,8-1,1));
    $Numero[9]=intval(substr($RecebeCPF,9-1,1));
    $Numero[10]=intval(substr($RecebeCPF,10-1,1));
    $Numero[11]=intval(substr($RecebeCPF,11-1,1));


    $soma=10*$Numero[1]+9*$Numero[2]+8*$Numero[3]+7*$Numero[4]+6*$Numero[5]+5*$Numero[6]+4*$Numero[7]+3*$Numero[8]+2*$Numero[9];

    $soma=$soma-(11*(intval($soma/11)));

    if ($soma==0 || $soma==1)
    {

      $resultado1=0;
    }
      else
    {

      $resultado1=11-$soma;
    } 


    if ($resultado1==$Numero[10])
    {


      $soma=$Numero[1]*11+$Numero[2]*10+$Numero[3]*9+$Numero[4]*8+$Numero[5]*7+$Numero[6]*6+$Numero[7]*5+$Numero[8]*4+$Numero[9]*3+$Numero[10]*2;

      $soma=$soma-(11*(intval($soma/11)));

      if ($soma==0 || $soma==1)
      {

        $resultado2=0;
      }
        else
      {

        $resultado2=11-$soma;
      } 


      if ($resultado2==$Numero[11])
      {
        //echo "<h1>CPF V�lido</h1>";
      }
        else
      {
        $retorno = 0; 
        echo "<h1>CPF inválido</h1>";
      } 

    }
      else
    {
      $retorno = 0;  
      echo "<h1>CPF Inválido</h1>";
    } 

  } 

return "CPF Válido, Seu CPF é: ". $retorno;

}