<?php


class Auth extends AController
{
    public function __construct(){}

    public function get_body(){

        $params = array(
            'client_id'     => CLIENT_ID,
            'redirect_uri'  => REDIRECT_URI,
            'response_type' => 'code'
        );

        if (isset($_GET['code'])) {
            $result = false;
            $params = array(
                'client_id' => CLIENT_ID,
                'client_secret' => CLIENT_SECRET,
                'code' => $_GET['code'],
                'redirect_uri' => REDIRECT_URI
            );

            $token = json_decode(file_get_contents('https://oauth.vk.com/access_token' . '?' . urldecode(http_build_query($params))), true);

            if (isset($token['access_token'])) {
                $params = array(
                    'uids'         => $token['user_id'],
                    'fields'       => 'photo_50',
                    'access_token' => $token['access_token']
                );

                $userInfo = json_decode(file_get_contents('https://api.vk.com/method/users.get' . '?' . urldecode(http_build_query($params))), true);
                if (isset($userInfo['response'][0]['first_name'])) {
                    $userInfo = $userInfo['response'][0];
                    $result = true;
                }
            }

            if ($result) {
                $_SESSION['userName'] = $userInfo['first_name'];
                $_SESSION['userPhoto'] = $userInfo['photo_50'];
                $_SESSION['userUid'] = $userInfo['uid'];
            }
        }
        return $this->render('auth', array('title' => 'Auth', 'params' => urldecode(http_build_query($params)) ));
    }
}