<p align="center">
    <h1 align="center">Bitcoin Rate API Service</h1>
    <br>
</p>

<p>Проект сделан на фреймворке Yii2 шаблон basic.</p>
<p>В качестве хранилища данных используется файл users.json</p>
<p>Пользователи хранятся в формате:</p>

    <user_email> => [
        'password_hash' => <password_hash>,
        'status' => <user_status>
    ],
<p>Реализованы базовые операции для работы с хранилищем юзеров - insert, remove, find</p>

<p>Реализованы 3 api endpoints: /user/create, /user/login, btcRate</p>

<p>Примеры использования</p>
<p>http://yii2basic.test/user/create/?email=dima.maimesko@gmail.com&password=12345</p>
<p>Варианты ответов:</p>

                {"result":false,"message":"User with this email already exists"}
               
                {"result":false,"message":"User created successfully"}
               
                
<p>http://yii2basic.test/user/login/?email=dima.maimesko@gmail.com&password=12345</p>
<p>Варианты ответов:</p>

                {"result":true,"message":"User logged in"}
               
                {"result":false,"message":"Wrong Password"}
                
            
<p>http://yii2basic.test/btcRate/?email=dima.maimesko@gmail.com&password=12345</p>
<p>Варианты ответов:</p>

                {"result":false,"message":"Success","data":"{\"USD\":{\"15m\":33435.77,\"last\":33435.77,\"buy\":33435.77,\"sell\":33435.77,\"symbol\":\"$\"},\"AUD\":{\"15m\":44047.48,\"last\":44047.48,\"buy\":44047.48,\"sell\":44047.48,\"symbol\":\"$\"},\"BRL\":{\"15m\":164310.04,\"last\":164310.04,\"buy\":164310.04,\"sell\":164310.04,\"symbol\":\"R$\"},\"CAD\":{\"15m\":41146.89,\"last\":41146.89,\"buy\":41146.89,\"sell\":41146.89,\"symbol\":\"$\"},\"CHF\":{\"15m\":30657.59,\"last\":30657.59,\"buy\":30657.59,\"sell\":30657.59,\"symbol\":\"CHF\"},\"CLP\":{\"15m\":24535156.15,\"last\":24535156.15,\"buy\":24535156.15,\"sell\":24535156.15,\"symbol\":\"$\"},\"CNY\":{\"15m\":215867.99,\"last\":215867.99,\"buy\":215867.99,\"sell\":215867.99,\"symbol\":\"\¥\"},\"DKK\":{\"15m\":208169.11,\"last\":208169.11,\"buy\":208169.11,\"sell\":208169.11,\"symbol\":\"kr\"},\"EUR\":{\"15m\":27997.56,\"last\":27997.56,\"buy\":27997.56,\"sell\":27997.56,\"symbol\":\"\€\"},\"GBP\":{\"15m\":24051.38,\"last\":24051.38,\"buy\":24051.38,\"sell\":24051.38,\"symbol\":\"\£\"},\"HKD\":{\"15m\":259516.71,\"last\":259516.71,\"buy\":259516.71,\"sell\":259516.71,\"symbol\":\"$\"},\"INR\":{\"15m\":2481089.26,\"last\":2481089.26,\"buy\":2481089.26,\"sell\":2481089.26,\"symbol\":\"\₹\"},\"ISK\":{\"15m\":4117948.97,\"last\":4117948.97,\"buy\":4117948.97,\"sell\":4117948.97,\"symbol\":\"kr\"},\"JPY\":{\"15m\":3705287.89,\"last\":3705287.89,\"buy\":3705287.89,\"sell\":3705287.89,\"symbol\":\"\¥\"},\"KRW\":{\"15m\":37693183.41,\"last\":37693183.41,\"buy\":37693183.41,\"sell\":37693183.41,\"symbol\":\"\₩\"},\"NZD\":{\"15m\":47299.47,\"last\":47299.47,\"buy\":47299.47,\"sell\":47299.47,\"symbol\":\"$\"},\"PLN\":{\"15m\":126395.99,\"last\":126395.99,\"buy\":126395.99,\"sell\":126395.99,\"symbol\":\"z\ł\"},\"RUB\":{\"15m\":2411541.26,\"last\":2411541.26,\"buy\":2411541.26,\"sell\":2411541.26,\"symbol\":\"RUB\"},\"SEK\":{\"15m\":283266.81,\"last\":283266.81,\"buy\":283266.81,\"sell\":283266.81,\"symbol\":\"kr\"},\"SGD\":{\"15m\":44884.17,\"last\":44884.17,\"buy\":44884.17,\"sell\":44884.17,\"symbol\":\"$\"},\"THB\":{\"15m\":1063257.37,\"last\":1063257.37,\"buy\":1063257.37,\"sell\":1063257.37,\"symbol\":\"\฿\"},\"TRY\":{\"15m\":290395.65,\"last\":290395.65,\"buy\":290395.65,\"sell\":290395.65,\"symbol\":\"\₺\"},\"TWD\":{\"15m\":933208.95,\"last\":933208.95,\"buy\":933208.95,\"sell\":933208.95,\"symbol\":\"NT$\"}}"}

<p>Текущий курс биткоина получаю с сервиса:</p>
<p>https://blockchain.info/ru/ticker</p>
