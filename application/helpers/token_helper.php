<?php

function verifiedToken($headers)
{
    $CI = &get_instance();
    $CI->load->library('Authorization_Token');
    
    $decodedToken = $CI->authorization_token->validateToken($headers);
    //print_r($decodedToken);die;


    if (isset($decodedToken['data'])) {
        $var = (array)$decodedToken['data'];
    } else {
        $var = 'failed';
    }
    return $var;
}

?>