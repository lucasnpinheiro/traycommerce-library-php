<?php
namespace Traycommerce;

use Traycommerce\Exceptions\TrayCommerceException;
use Traycommerce\Library\BaseEndpoints;
use function success;

class AdditionalInformation extends BaseEndpoints {
    const uri = "additional_info/";

    public function __construct() {
        parent::__construct();
    }
    
    /**
     * 
     * @param array $filtros
     * @return object
     * @throws TrayCommerceException
     */
    public function listar(array $filtros = array()) {
        $this->trayCommerceController->checkValidToken();

        $query = array(
            "access_token" => $this->trayCommerceController->getToken()->getAccess_token()
        );
        
        $query = array_merge($query, $filtros);

        $resposta = $this->get(self::uri, array(), $query);

        if (success($resposta["code"])) {
            return $resposta["data"];
        }

        throw new TrayCommerceException("[AdditionalInformation][listar]", $resposta["data"], $resposta["code"]);
    }
    
    /**
     * 
     * @param type $variantId
     * @param array $filtros
     * @return object
     * @throws TrayCommerceException
     */
    public function detalhes($variantId, array $filtros = array()) {
        $this->trayCommerceController->checkValidToken();

        $query = array(
            "access_token" => $this->trayCommerceController->getToken()->getAccess_token()
        );
        
        $query = array_merge($query, $filtros);

        $resposta = $this->get(self::uri . $variantId, array(), $query);

        if (success($resposta["code"])) {
            return $resposta["data"];
        }

        throw new TrayCommerceException("[AdditionalInformation][detalhes]", $resposta["data"], $resposta["code"]);
    }
    
    /**
     * 
     * @param type $variantId
     * @return object
     * @throws TrayCommerceException
     */
    public function remover($variantId) {
        $this->trayCommerceController->checkValidToken();

        $query = array(
            "access_token" => $this->trayCommerceController->getToken()->getAccess_token()
        );
        
        $query = array_merge($query, $filtros);

        $resposta = $this->delete(self::uri . $variantId, array(), $query);

        if (success($resposta["code"])) {
            return $resposta["data"];
        }

        throw new TrayCommerceException("[AdditionalInformation][remover]", $resposta["data"], $resposta["code"]);
    }
    
    /**
     * 
     * @param type $variantId
     * @param array $data
     * @return object
     * @throws TrayCommerceException
     */
    public function editar($variantId, array $data) {
        $this->trayCommerceController->checkValidToken();

        $query = array(
            "access_token" => $this->trayCommerceController->getToken()->getAccess_token()
        );
        
        $resposta = $this->put(self::uri . $variantId, $data, $query);

        if (success($resposta["code"])) {
            return $resposta["data"];
        }

        throw new TrayCommerceException("[AdditionalInformation][editar]", $resposta["data"], $resposta["code"]);
    }
    
    /**
     * 
     * @param array $data
     * @return object
     * @throws TrayCommerceException
     */
    public function criar(array $data) {
        $this->trayCommerceController->checkValidToken();

        $query = array(
            "access_token" => $this->trayCommerceController->getToken()->getAccess_token()
        );
        
        $resposta = $this->post(self::uri, $data, $query);

        if (success($resposta["code"])) {
            return $resposta["data"];
        }

        throw new TrayCommerceException("[AdditionalInformation][criar]", $resposta["data"], $resposta["code"]);
    }
}