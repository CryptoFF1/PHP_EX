<?php
	$name = $_POST['name'];
	$dat = $_POST['data'];
	$message = $_POST['message'];
	$comm = $_POST['comm'];
	$bank = $_POST['select'];
	$type = '-';
	$data = "$name, $dat, $message, $comm, $type\n"; // create a string with the data

	if($bank == 1){
		$fp = fopen('transaction.txt', 'r'); //Открываем файл с числом всех транзакций
		$count = file_get_contents('transaction.txt'); //Берем число всех транзакций
		echo $count;
		$parsed_count = (int)$count; //На всякий случай приводим к целочисленныму типу
		fclose($fp);//Закрываем файл 
		$fp = fopen('transaction.txt', 'w+');//Открываем с удалением всех данных из него
		$parsed_count++;//Добавляем 1 к кол-ву транзакций
		fwrite($fp, $parsed_count);//Записываем в файл
		fclose($fp);//Закрываем файл
		if (isset($_POST['submit'])) {
			$data = array(
				'amount' => $_POST['name'],
				'data' => $_POST['data'],
				'agent' => $_POST['message'],
				'comm' => $_POST['comm'],
				'bank' => 'first',
				'type' => 'minus'
			);
			$json_data = file_get_contents('data.json');
			$products = json_decode($json_data, true);
			$products[$parsed_count] = $data;
			$json_data = json_encode($products, JSON_PRETTY_PRINT);
			file_put_contents('data.json', $json_data);
		}
		$fp = fopen("amount.txt", "r"); //Открываем файл для чтения общей суммы
		$count = file_get_contents("amount.txt"); //Берем общую сумму 
		$parsed_count = (float)$count; //Приводим её к флоату
		fclose($fp); //Закрываем файл
		$fp = fopen("amount.txt", "w+");//Открываем с удалением всех элемнетов 
		$sum = $parsed_count - $name; //Суммируем общую сумму
		fwrite($fp, $sum); //Записываем в файл
		fclose($fp);//Закрываем 
		$one = array(
			'money' => $sum
		);
		$json_data = file_get_contents('all.json');
		$products = json_decode($json_data, true);
		file_put_contents('all.json', json_encode(array()));
		$products[1] = $one;
		$json_data = json_encode($products, JSON_PRETTY_PRINT);
		file_put_contents('all.json', $json_data);
		//Добавляем подсчёт для даннаго счёта
		$fp = fopen('sum1.txt', 'r');
		$count = file_get_contents('sum1.txt');
		$parsed_count = (float)$count;
		fclose($fp);
		$fp = fopen('sum1.txt', 'w+');
		$sum = $parsed_count - $name;
		fwrite($fp, $sum);
		fclose($fp);
		$sum1 = array(
			'all_money' => $sum
		);
		$json_data = file_get_contents('sum1.json');
		$products = json_decode($json_data, true);
		file_put_contents('sum1.json', json_encode(array()));
		$products[1] = $sum1;
		$json_data = json_encode($products, JSON_PRETTY_PRINT);
		file_put_contents('sum1.json', $json_data);
	}
	else if($bank == 2){
		$fp = fopen('transaction.txt', 'r');
		$count = file_get_contents('transaction.txt');
		$parsed_count = (int)$count;
		fclose($fp);
		$fp = fopen('transaction.txt', 'w+');
		$parsed_count++;
		fwrite($fp, $parsed_count);
		fclose($fp);
		if (isset($_POST['submit'])) {
			$data = array(
				'amount' => $_POST['name'],
				'date' => $_POST['data'],
				'agent' => $_POST['message'],
				'comm' => $_POST['comm'],
				'bank' => 'second',
				'type' => 'minus'
			);
			$json_data = file_get_contents('data.json');
			$products = json_decode($json_data, true);
			$products[$parsed_count] = $data;
			$json_data = json_encode($products, JSON_PRETTY_PRINT);
			file_put_contents('data.json', $json_data);
		}
		$fp = fopen('amount.txt', 'r');
		$count = file_get_contents('amount.txt');
		$parsed_count = (float)$count;
		fclose($fp);
		$fp = fopen("amount.txt", 'w+');
		$sum = $parsed_count - $name;
		fwrite($fp, $sum);
		fclose($fp);
		$one = array(
			'money' => $sum
		);
		$json_data = file_get_contents('all.json');
		$products = json_decode($json_data, true);
		file_put_contents('all.json', json_encode(array()));
		$products[1] = $one;
		$json_data = json_encode($products, JSON_PRETTY_PRINT);
		file_put_contents('all.json', $json_data);	
		//Подсчитываем сумму для данного счёта
		$fp = fopen('sum2.txt', 'r');
		$count = file_get_contents('sum2.txt');
		$parsed_count = (float)$count;
		fclose($fp);
		$fp = fopen('sum2.txt', 'w+');
		$sum = $parsed_count - $name;
		fwrite($fp, $sum);
		fclose($fp);
		$sum2 = array(
			'all_money' => $sum
		);
		$json_data = file_get_contents('sum2.json');
		$products = json_decode($json_data, true);
		file_put_contents('sum2.json', json_encode(array()));
		$products[1] = $sum2;
		$json_data = json_encode($products, JSON_PRETTY_PRINT);
		file_put_contents('sum2.json', $json_data);
	}
	else {
		$fp = fopen('transaction.txt', 'r');
		$count = file_get_contents('transaction.txt');
		$parsed_count = (int)$count;
		fclose($fp);
		$fp = fopen('transaction.txt', 'w+');
		$parsed_count++;
		fwrite($fp, $parsed_count);
		fclose($fp);
		if (isset($_POST['submit'])) {
			$data = array(
				'amount' => $_POST['name'],
				'date' => $_POST['data'],
				'agent' => $_POST['message'],
				'comm' => $_POST['comm'],
				'bank' => 'third',
				'type' => 'minus'
			);
			$json_data = file_get_contents('data.json');
			$products = json_decode($json_data, true);
			$products[$parsed_count] = $data;
			$json_data = json_encode($products, JSON_PRETTY_PRINT);
			file_put_contents('data.json', $json_data);
		}
		$fp = fopen('amount.txt', 'r');
		$count = file_get_contents('amount.txt');
		$parsed_count = (float)$count;
		fclose($fp);
		$fp = fopen("amount.txt", 'w+');
		$sum = $parsed_count - $name;
		fwrite($fp, $sum);
		fclose($fp);
		$one = array(
			'money' => $sum
		);
		$json_data = file_get_contents('all.json');
		$products = json_decode($json_data, true);
		file_put_contents('all.json', json_encode(array()));
		$products[1] = $one;
		$json_data = json_encode($products, JSON_PRETTY_PRINT);
		file_put_contents('all.json', $json_data);
		//Подсчитываем сумму для данного счёта 
		$fp = fopen('sum3.txt', 'r');
		$count = file_get_contents('sum3.txt');
		$parsed_count = (float)$count;
		fclose($fp);
		$fp = fopen('sum3.txt', 'w+');
		$sum = $parsed_count - $name;
		fwrite($fp, $sum);
		fclose($fp);
		$sum3 = array(
			'all_money' => $sum
		);
		$json_data = file_get_contents('sum3.json');
		$products = json_decode($json_data, true);
		file_put_contents('sum3.json', json_encode(array()));
		$products[1] = $sum3;
		$json_data = json_encode($products, JSON_PRETTY_PRINT);
		file_put_contents('sum3.json', $json_data);
	}
	header('location: ' . $_SERVER['HTTP_REFERER']); // либо явно указать путь к форме
	exit();
?>