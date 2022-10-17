<?php

class ValidadorCPF
{
    private function ehCPF($cpf){

        $regex_cpf = "/[0-9]{3}\.[0-9]{3}\.[0-9]{3}\-[0-9]{2}/";
        return preg_match($regex_cpf, $cpf);
    }

    private function removeFormatacao($cpf){
        $somente_numeros = str_replace([".", "-"], "", $cpf);
        return $somente_numeros;
    }

    private function verificarNumerosIguais($cpf){
        for($i=0;$i<=11;$i++){
            if(str_repeat($i, 11) == 11) return false;
        }
    }

    private function validarDigitos($cpf){

    }
}