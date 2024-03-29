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
        try
        {
            $bairro = parent::getStringFromUrl(isset($_GET['bairro'])? $_GET['bairro'] : null, 'bairro');

            $id_cidade = parent::getIntFromUrl(
                isset($_GET['id_cidade']) ? $_GET['id_cidade'] : null, 'cep');
            $model = new EnderecoModel();
            $model->getLogradouroByBairroAndCidade($bairro, $id_cidade);
            parent::getResponseAsJSON($model->rows);

        } catch (Exception $e) {
            parent::getExeceptionAsJSON($e);
        }
    }

    public static function getLogradouroByCep() : void
    {
        try
        {
            $cep = parent::getIntFromUrl(isset($_GET['cep'])? $_GET['cep'] : null, 'cep');
            $model = new EnderecoModel();
            parent::getResponseAsJSON($model->getLogradouroByCep($cep));
        } 
        catch (Exception $e)
        {
            parent::getExeceptionAsJSON($e);
        }    
   
    }
    

    public static function getBairrosByIdCidade() : void
    {
        try
        {
            $id_cidade = parent::getIntFromUrl(
                isset($_GET['id_cidade'])? $_GET['id_cidade'] : null);
            $model = new EnderecoModel();    
            $model->getBairroByIdCidade($id_cidade);

            parent::getResponseAsJSON($model->rows);

            
            

        } catch (Exception $e) {
            parent::getExeceptionAsJSON($e);
        }
    }

    public static function getCidadesByUF() : void
    {
        try
        {
            $uf = $_GET['uf'];

            $model = new CidadeModel();
            $model->getCidadeByUf($uf);

            parent::getResponseAsJSON($model->rows);

        } catch (Exception $e) {

        }
    }
}