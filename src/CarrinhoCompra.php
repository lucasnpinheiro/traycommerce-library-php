<?php
namespace Traycommerce;

use Traycommerce\Exceptions\TrayCommerceException;
use Traycommerce\Library\BaseEndpoints;
use Traycommerce\Helpers\GlobalHelper;

class CarrinhoCompra extends BaseEndpoints {
    const uri = "carts/";

    public function __construct() {
        parent::__construct();
    }
    
    /**
     * 
     * @param type $sessionId
     * @return type object
     * @throws Exception
     */
    public function consultarDados($sessionId, array $filtros = array()) {
        $this->trayCommerceController->checkValidToken();

        $query = array(
            "access_token" => $this->trayCommerceController->getToken()->getAccess_token()
        );
        
        $query = array_merge($query, $filtros);

        $resposta = $this->get(self::uri . $sessionId, array(), $query);

        if (GlobalHelper::success($resposta["code"])) {
            return $resposta["data"];
        }

        throw new TrayCommerceException("[CarrinhoCompra][consultarDados]", "(".$resposta["err"].") - ".$resposta["responseText"], $resposta["code"]);
    }
    
    /**
     * 
     * @param type $sessionId
     * @return type object
     * @throws Exception
     */
    public function consultarCompleto($sessionId) {
        $this->trayCommerceController->checkValidToken();

        $query = array(
            "access_token" => $this->trayCommerceController->getToken()->getAccess_token()
        );

        $resposta = $this->get(self::uri . $sessionId . "/complete", array(), $query);

        if (GlobalHelper::success($resposta["code"])) {
            return $resposta["data"];
        }

        throw new TrayCommerceException("[CarrinhoCompra][consultarCompleto]", "(".$resposta["err"].") - ".$resposta["responseText"], $resposta["code"]);
    }
    
    /*
        $data["Cart"]["session_id"] = "123ABC456DEF789GHI";
        $data["Cart"]["product_id"] = "123";
        $data["Cart"]["variant_id"] = "";
        $data["Cart"]["quantity"] = "1";
        $data["Cart"]["price"] = "50.00";
        $data["Cart"]["additional_information"] = "Informações adicionais";
        $data["Cart"]["Shipping"]["id_shipping"] = "123";
        $data["Cart"]["Shipping"]["name"] = "Sedex";
        $data["Cart"]["Shipping"]["min_period"] = "1";
        $data["Cart"]["Shipping"]["max_period"] = "3";
        $data["Cart"]["Shipping"]["zip_code"] = "04001001";
        $data["Cart"]["Shipping"]["price"] = "16.85";
        $data["Cart"]["Shipping"]["tax_name"] = "Acréscimo";
        $data["Cart"]["Shipping"]["tax_value"] = "2.00";
        $data["Cart"]["Shipping"]["city"] = "São Paulo";
        $data["Cart"]["Shipping"]["state"] = "SP";     
     */
    
    /**
     * 
     * @param type $data
     * @return type object
     * @throws Exception
     */
    public function criarNovo($data = array()) {
        $this->trayCommerceController->checkValidToken();

        $query = array(
            "access_token" => $this->trayCommerceController->getToken()->getAccess_token()
        );

        $resposta = $this->post(self::uri, $data, $query);

        if (GlobalHelper::success($resposta["code"])) {
            return $resposta["data"];
        }

        throw new TrayCommerceException("[CarrinhoCompra][criarNovo]", "(".$resposta["err"].") - ".$resposta["responseText"], $resposta["code"]);
    }
    
    /*
        $data = array(
            "Cart" => array(
                "session_id" => "",
                "product_id" => "",
                "variants_kit" => "[\"13-23397-11\"]",
                "price" => "11.11",
            )
        )
     */
    
    /**
     * 
     * @param array $data
     * @return object
     * @throws Exception
     */
    public function criarNovoComKit($data = array()) {
        $this->trayCommerceController->checkValidToken();

        $query = array(
            "access_token" => $this->trayCommerceController->getToken()->getAccess_token()
        );

        $resposta = $this->postJson(self::uri, $data, $query);

        if (GlobalHelper::success($resposta["code"])) {
            return $resposta["data"];
        }

        throw new TrayCommerceException("[CarrinhoCompra][criarNovoComKit]", "(".$resposta["err"].") - ".$resposta["responseText"], $resposta["code"]);
    }
    
    /*
        $data["Cart"]["product_id"] = "123";
        $data["Cart"]["variant_id"] = "";
        $data["Cart"]["quantity"] = "1";
        $data["Cart"]["price"] = "50.00";
        $data["Cart"]["Shipping"]["id_shipping"] = "123";
        $data["Cart"]["Shipping"]["name"] = "Sedex";
        $data["Cart"]["Shipping"]["min_period"] = "1";
        $data["Cart"]["Shipping"]["max_period"] = "3";
        $data["Cart"]["Shipping"]["zip_code"] = "04001001";
        $data["Cart"]["Shipping"]["price"] = "16.85";
        $data["Cart"]["Shipping"]["tax_name"] = "Acréscimo";
        $data["Cart"]["Shipping"]["tax_value"] = "2.00";
        $data["Cart"]["Shipping"]["city"] = "São Paulo";
        $data["Cart"]["Shipping"]["state"] = "SP";
     */
    
    /**
     * 
     * @param type $sessionId
     * @param type $post
     * @return type object
     * @throws Exception
     */
    public function atualizarDados($sessionId, $data = array()) {
        $this->trayCommerceController->checkValidToken();

        $query = array(
            "access_token" => $this->trayCommerceController->getToken()->getAccess_token()
        );

        $resposta = $this->put(self::uri . $sessionId, $data, $query);

        if (GlobalHelper::success($resposta["code"])) {
            return $resposta["data"];
        }

        throw new TrayCommerceException("[CarrinhoCompra][atualizarDados]", "(".$resposta["err"].") - ".$resposta["responseText"], $resposta["code"]);
    }
    
    /**
     * 
     * @param type $sessionId
     * @return type object
     * @throws Exception
     */
    public function excluir($sessionId) {
        $this->trayCommerceController->checkValidToken();

        $query = array(
            "access_token" => $this->trayCommerceController->getToken()->getAccess_token()
        );

        $resposta = $this->delete(self::uri . $sessionId, array(), $query);

        if (GlobalHelper::success($resposta["code"])) {
            return $resposta["data"];
        }

        throw new TrayCommerceException("[CarrinhoCompra][excluir]", "(".$resposta["err"].") - ".$resposta["responseText"], $resposta["code"]);
    }
    
    /**
     * 
     * @param type $sessionId
     * @param type $productId
     * @param type $variantId
     * @return type object
     * @throws Exception
     */
    public function consultarProduto($sessionId, $productId, $variantId = null){
        $this->trayCommerceController->checkValidToken();

        $query = array(
            "access_token" => $this->trayCommerceController->getToken()->getAccess_token()
        );
        
        $url = self::uri . $sessionId . "/" . $productId;
        
        if(!empty($variantId))
            $url += "/" . $variantId;

        $resposta = $this->get($url, array(), $query);

        if (GlobalHelper::success($resposta["code"])) {
            return $resposta["data"];
        }

        throw new TrayCommerceException("[CarrinhoCompra][consultarProduto]", "(".$resposta["err"].") - ".$resposta["responseText"], $resposta["code"]);
    }
    
    /*
        $data["Cart"]["quantity"] = "5";
        $data["Cart"]["price"] = "54.00";
     */
    
    /**
     * 
     * @param type $sessionId
     * @param type $productId
     * @param type $data
     * @param type $variantId
     * @return type object
     * @throws Exception
     */
    public function atualizarProduto($sessionId, $productId, $data = array(), $variantId = null, $additionalInformation = ""){
        $this->trayCommerceController->checkValidToken();

        $query = array(
            "access_token" => $this->trayCommerceController->getToken()->getAccess_token()
        );
        
        if(!empty($additionalInformation))
            $query["additional_information"] = $additionalInformation;
        
        $url = self::uri . $sessionId . "/" . $productId;
        
        if(!empty($variantId))
            $url .= "/" . $variantId;

        $resposta = $this->put($url, $data, $query);

        if (GlobalHelper::success($resposta["code"])) {
            return $resposta["data"];
        }

        throw new TrayCommerceException("[CarrinhoCompra][atualizarProduto]", "(".$resposta["err"].") - ".$resposta["responseText"], $resposta["code"]);
    }
    
    /**
     * 
     * @param string $sessionId
     * @param int $productId
     * @param int $variantId
     * @param string $additionalInformation
     * @return type object
     * @throws Exception
     */
    public function excluirProduto($sessionId, $productId, $variantId = null, $additionalInformation = ""){
        $this->trayCommerceController->checkValidToken();

        $query = array(
            "access_token" => $this->trayCommerceController->getToken()->getAccess_token()
        );
        
        if(!empty($additionalInformation))
            $query["additional_information"] = $additionalInformation;
        
        $url = self::uri . $sessionId . "/" . $productId;
        
        if(!empty($variantId))
            $url .= "/" . $variantId;

        $resposta = $this->delete($url, array(), $query);

        if (GlobalHelper::success($resposta["code"])) {
            return $resposta["data"];
        }

        throw new TrayCommerceException("[CarrinhoCompra][excluirProduto]", "(".$resposta["err"].") - ".$resposta["responseText"], $resposta["code"]);
    }
}