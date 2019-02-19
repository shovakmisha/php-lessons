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
			// throw new SoapFault("Server", "Несуществующий id товара");

            return 0;
		}	
	}

    // Отключение кэширования WSDL-документа
	ini_set("soap.wsdl_cache_enabled", "0");
	// Создание SOAP-сервер
	$server = new SoapServer("http://mysite.local/demo/soap/stock.wsdl");
	// Добавить класс к серверу
	$server->addFunction("getStock");
	// Запуск сервера
	$server->handle();
?>