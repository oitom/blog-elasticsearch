<?php 

use Elasticsearch\ClientBuilder;


class Configuracao {
	private $client;

    public function __construct() {
		$hosts = ['http://localhost:9200'];
		$this->client = ClientBuilder::create()->setHosts($hosts)->build(); 
    }

    public function getClient() { 
    	return $this->client;
    }

}
