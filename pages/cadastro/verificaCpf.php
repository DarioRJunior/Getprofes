<?php

function ValidarCPF($cpf){
    $cpf = preg_replace('/[^0-9]/', '', $cpf);
    // Verifica se o numero digitado contém todos os números
    if (strlen($cpf) != 11) {
        return false;
    }
    // Verifica se o numero digitado é sequencial
    elseif ($cpf == '00000000000' || $cpf == '11111111111' || $cpf == '22222222222' || $cpf == '33333333333' || $cpf == '44444444444' || $cpf == '55555555555' || $cpf == '66666666666' || $cpf == '77777777777' || $cpf == '88888888888' || $cpf == '99999999999') {
        return false;
    }
    // Calcula os números para verificar se o CPF é verdadeiro
    else {
        for ($t = 9; $t < 11; $t++) {
            for ($d = 0, $c = 0; $c < $t; $c++) {
                $d += $cpf{$c} * (($t + 1) - $c);
            }
            $d = ((10 * $d) % 11) % 10;
            if ($cpf{$c} != $d) {
                return false;
            }
        }
        return true;
    }
}