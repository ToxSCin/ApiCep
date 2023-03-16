<?php

namespace ApiCep\Controller;

use ApiCep\DAO\EnderecoDAO;
use ApiCep\Model\EnderecoModel as ModelEnderecoModel;
use Apicep\Model\{EnderecoModel, CidadeModel};
use Exception;

class EnderecoController extends Controller
{
    public static function getCepByLogradouro() : void
    { 
        try
        {
            $logradouro = $_GET['logradouro'];

            $model = new EnderecoModel();
            $model->getCepByLogradouro($logradouro);

            parent::getResponseAsJSON($model->rows);
        }
        catch (Exception $e)
        {
            parent::getResponseAsJSON($e);
        }
        
        
    }

    public static function getLogradouroByBairroAndCidade() : void
    {
    }

    public static function getLogradouroByCep() : void
    {
    }

    public static function getBairrosByIdCidade() : void
    {
    }

    public static function getCidadesByUF() : void
    {
    }
}