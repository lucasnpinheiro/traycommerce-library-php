<?php
namespace Traycommerce;

use Exception;
use Traycommerce\Exceptions\TrayCommerceException;
use Traycommerce\Library\BaseEndpoints;
use function success;

class Produto extends BaseEndpoints{
    const uri = "external_scripts/";
    
    public function __construct() {
        parent::__construct();
    }
    
    /**
     * 
     * @param array $filtros
     * @return object
     * @throws Exception/
     */
    public function listagem($filtros = array()){
        $this->trayCommerceController->checkValidToken();

        $query = array(
            "access_token" => $this->trayCommerceController->getToken()
        );
        
        $query = array_merge($query, $filtros);

        $resposta = $this->get(self::uri, array(), $query);

        if (success($resposta["code"])) {
            return $resposta["data"];
        }

        throw new TrayCommerceException("[ScriptsExternos][listagem]", $resposta["data"], $resposta["code"]);
    }
    
    /*
        $data["ExternalScript"]["source"] = "http://localhost/assets/store/css/script.css";
     */
    
    /**
     * 
     * @param array $data
     * @return object
     * @throws Exception
     */
    public function cadastrar($data = array()) {
        $this->trayCommerceController->checkValidToken();

        $query = array(
            "access_token" => $this->trayCommerceController->getToken()
        );
        
        $resposta = $this->put(self::uri, $data, $query);

        if (success($resposta["code"])) {
            return $resposta["data"];
        }

        throw new TrayCommerceException("[ScriptsExternos][cadastrar]", $resposta["data"], $resposta["code"]);
    }
    
    /*
        $data["ExternalScript"]["source"] = "http://localhost/assets/store/css/script.css";
     */
    
    /**
     * 
     * @param int $scriptId
     * @return object
     * @throws Exception
     */
    public function atualizarDados($scriptId, $data = array()) {
        $this->trayCommerceController->checkValidToken();

        $query = array(
            "access_token" => $this->trayCommerceController->getToken()
        );
        
        $resposta = $this->put(self::uri . $scriptId, $data, $query);

        if (success($resposta["code"])) {
            return $resposta["data"];
        }

        throw new TrayCommerceException("[ScriptsExternos][atualizarDados]", $resposta["data"], $resposta["code"]);
    }
}
