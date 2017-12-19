<?php

//envia menu
function sendMenu($menu, $accessToken, $senderId){

	$options = array(
	  'http' => array(
		'method'  => 'POST',
		'content' => $menu ,
		'header'=>  "Content-Type: application/json\r\n" .
					"Accept: application/json\r\n"
		)
	);

	$context  = stream_context_create( $options );
	$url = 'https://graph.facebook.com/v2.6/me/messages?access_token='.$accessToken;
	$result = file_get_contents( $url, false, $context );
}

//envia imagem
function sendImage($image, $senderId, $accessToken){
    
    $response = "{
        'recipient' : {
          'id' : '".$senderId."'
        },
        'message' : {
          'attachment' : {
            'type' : 'image',
            'payload' : {
              'url' : '".$image."'
            }
          }
        }
    }";
    
	$options = array(
	  'http' => array(
		'method'  => 'POST',
		'content' => $response ,
		'header'=>  "Content-Type: application/json\r\n" .
					"Accept: application/json\r\n"
		)
	);

	$context  = stream_context_create( $options );
	$url = 'https://graph.facebook.com/v2.6/me/messages?access_token='.$accessToken;
	$result = file_get_contents( $url, false, $context );
}

//envia texto
function sendTextMessage($message, $senderId, $accessToken){
    
    $response = "{
        'recipient' : {
          'id' : '".$senderId."'
        },
        'message' : {
          'text' : '".$message."'
        }
    }";
    
	$options = array(
	  'http' => array(
		'method'  => 'POST',
		'content' => $response ,
		'header'=>  "Content-Type: application/json\r\n" .
					"Accept: application/json\r\n"
		)
	);

	$context  = stream_context_create( $options );
	$url = 'https://graph.facebook.com/v2.6/me/messages?access_token='.$accessToken;
	$result = file_get_contents( $url, false, $context );
}

?>