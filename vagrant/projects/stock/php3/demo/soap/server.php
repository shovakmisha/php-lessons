<?php
    // Описание функции Web-сервиса
	function getStock($id) {	
		$stock = array(
			"a" => 100,
			"b" => 200,
			"c" => 300,
			"d" => 400,
			"e" => 500
		);
		if (isset($stock[$id])) {
			$quantity = $stock[$id];		
			return $quantity;
		} else {
			 throw new SoapFault("Server", "Несуществующий id товара");

            //return 0;
		}	
	}

    // $homepage = file_get_contents('stock.wsdl');
    // echo $homepage;

	// phpinfo();

	//exit;

    //if (extension_loaded('soap')) {
    //    echo 7777;
    //}

	// echo getStock('b');
    // echo getStock('z');
	// exit;

    // Отключение кэширования WSDL-документа


	ini_set("soap.wsdl_cache_enabled", "0");

    libxml_disable_entity_loader(false);

	// Создание SOAP-сервер
	$server = new SoapServer('stock.wsdl');

	// var_dump( $server->__getFunctions() );

	// Добавить класс к серверу
	 $server->addFunction("getStock");
	// Запуск сервера

    // var_dump( $server->getFunctions() );

	$server->handle();

