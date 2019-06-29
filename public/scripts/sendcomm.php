<?php 

// проверка на то, кто пользователь: исполнитель или заказчик

// исполнитель: 
// проверка на соответствие указанного id с id залогиненого пользователя
// проверка на соответствие указанного id заказа с id-шниками заказов этого пользователя, и должно у GET-ового id быть статус 1, при любом другом отвергать
// предоставление формы с отзывом и выбором звёзд, с кнопкой "отправить" 

$myCurl = curl_init();
curl_setopt_array($myCurl, array(
    CURLOPT_URL => 'https://www.googleapis.com/urlshortener/v1/url',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_POST => true,
    CURLOPT_HTTPHEADER => array('Content-type: application/json'),
    CURLOPT_POSTFIELDS => http_build_query(array('longUrl' => 'vk.com', 'key' => 'AIzaSyD-CZJfXWrQWHMDpng315DCtBOkTuvEm7Q'))
));
$response = curl_exec($myCurl);
curl_close($myCurl);

echo "Ответ на Ваш запрос: ".$response;

?>