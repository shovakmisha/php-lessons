<?php
	// try {
	// 	// Создание SOAP-клиента
	// 	$client = new SoapClient("http://stock.on/php3/demo/soap/stock.wsdl");
	// 	// Посылка SOAP-запроса c получением результат
	// 	$result = $client->getStock("7");
	// 	echo "Текущий запас на складе: ", $result;
	// } catch (SoapFault $exception) {
	// 	echo $exception->getMessage();
	// }

    $client = new SoapClient('https://modyf.lxc/api/soap/?wsdl');

    // If somestuff requires API authentication,
    // then get a session token

    //$session = $client->login('apiUser', 'apiKey');
    //$result = $client->call($session,'customer.create',array(array('email' => 'mail@example.org', 'firstname' => 'Dough', 'lastname' => 'Deeks', 'password' => 'password', 'website_id' => 1, 'store_id' => 1, 'group_id' => 1)));
    //var_dump ($result);

    // If you don't need the session anymore
    //$client->endSession($session);