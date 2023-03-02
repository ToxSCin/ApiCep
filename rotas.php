<?php

use ApiCep\Controller\EnderecoController;

$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

switch ($url)
{
    /**
     * [OK] Exemplo de Acesso: https://cep.metoda.com.br/endereco
     */
    case '/endereco/by-cep':
        EnderecoController::getLogradouroByCep();
    break;

    /**
     * [OK] Exemplo de Acesso: https://cep.metoda.com.br/logradouro
     */
    case '/logradouro/by-bairro':
        EnderecoController::getLogradouroByBairroAndCidade();
    break;

    /**
     * [OK] Exemplo de Acesso: https://cep.metoda.com.br/cidade
     */
    case '/cidade/by-uf';
        EnderecoController::getCidadesByUF();
    break;

    /**
     * [OK] Exemplo de Acesso: https://cep.metoda.com.br/bairros
     */
    case '/bairro/by-cidade':
        EnderecoController::getBairrosByIdCidade();
    break;


    /**
     * 
     */
    default:
        http_response_code(403);
    break;
}