<?php
/**
 * @author Dheeraj jha
 * @email Dheeraj@thedije.com
 * @create date 2019-01-11 00:22:22
 * @modify date 2019-01-11 00:22:22
 * @desc [description]
 */


function jwt_config(){
    $param  =   array(
        'key'   =>  array(
            'jwt_secrate_pre'   =>  PRE_SECRATE_KEY,
            'jwt_secrate_post'  =>  POST_SECRATE_KEY
        ),
        'version' =>  1.0       
    );

    return $param;
}

function create_jwt($param  =   array() ){
    if(empty($param)){
        return false;
    }

    /*
    *
    *   Get JWT config, keys and version
    *
    */
    $token_key  =   jwt_config();

    $pre_key    =   $token_key['key']['jwt_secrate_pre'];
    $post_key   =   $token_key['key']['jwt_secrate_post'];
    $key_version=   $token_key['version'];

    /*
    *   @$param  =   array()
    *       Set of variables which needed to encode in JWT
    *       After verification these data can be retrieve and be used
    *       example
    *       $param  =   array($email,$username,$user_id);
    */
    $payload        =   $param;
    
    $create_token   =   array($pre_key, $payload,   $key_version,   $post_key);
    
    $json_token     =   json_encode($create_token);
    
    return base64_encode($json_token);

}


function verify_jwt($token  =   ''){
    if($token   =   ''){
        return false;
    }
    $token_key  =   jwt_config();

    $pre_key    =   $token_key['key']['jwt_secrate_pre'];
    $post_key   =   $token_key['key']['jwt_secrate_post'];
    $key_version=   $token_key['version'];


    $decoded_token  =   base64_decode($decode);

    $token_array    =   json_decode($decoded_token);

    if($token_array[0]!=$pre_key OR $token_array[3]!=$post_key OR $token_array[2]!=$key_version){
        return false;
    }

    return $token_array[1];


}