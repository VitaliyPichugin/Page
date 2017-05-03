<?php
session_start();

/*******Конфиги для авторизации через ВК*******/
//ID приложения
define('CLIENT_ID','6010182');
//Защищённый ключ
define('CLIENT_SECRET','dSmyOM2gwFRRnUdtAzNh');
//Адрес сайта
define('REDIRECT_URI','http://page/?option=auth');
//ссылка авторизации
define('URL', 'http://oauth.vk.com/authorize');
/*******Конфиги для авторизации через ВК*******/

/**************Конфиги для БД*****************/
//сервер БД
define('HOST','localhost');
//пользователь
define('USER','root');
//пароль
define('PASS','');
//имя БД
define('DB','wall');
/**************Конфиги для БД*****************/
