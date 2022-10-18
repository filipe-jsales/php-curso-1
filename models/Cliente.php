<?php

class Cliente
{

  var $nome;
  var $cpf_cnpj;
  var $telefone;
  var $email;
  var $cep;
  var $endereco;
  var $bairro;
  var $numero;
  var $cidade;
  var $uf;

  function __construct($nome, $cpf_cnpj, $telefone, $email, $cep,
                      $endereco, $bairro, $numero, $cidade, $uf)
  {
    if (!$this->validarCep($cep)) throw new Exception("CEP no formato inválido");
    if (!$this->validarTelefone($telefone)) throw new Exception("Telefone no formato inválido");
    
    $this->nome = $nome;
    $this->cpf_cnpj = $this->removeFormatacao($cpf_cnpj);
    $this->telefone = $this->removeFormatacao($telefone);
    $this->email = $email;
    $this->cep = $this->removeFormatacao($cep);
    $this->endereco = $endereco;
    $this->bairro = $bairro;
    $this->numero = $numero;
    $this->cidade = $cidade;
    $this->uf = $uf;
    
  }
  function validarCep($cep)
  {
    if (strlen($cep) == 10){
      $regex_cep = "/[0-9]{2}\.[0-9]{3}\-[0-9]{3}/";
      return preg_match($regex_cep, $cep);
    }else{
      return false;
    }
  }

  function validarTelefone($telefone)
  {
    if (strlen($telefone) == 15){
      $regex_telefone = "/\([0-9]{2}\)[0-9]{5}\-[0-9]{4}/";
      return preg_match($regex_telefone, str_replace(" ", "", $telefone));
    }else{
      return false;
    }
  }

  function removeFormatacao($info){
    $dado = str_replace([".", "-", "/", "(", ")", " "], "", $info);
    return $dado;
  }
}
