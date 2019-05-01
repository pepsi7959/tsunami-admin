<?php
if (!function_exists('sendNotification')) {
	/* ref: https://github.com/firebase/quickstart-js/tree/master/messaging */
	function sendNotification($setting, $token, $playload_notification, $playload_data) {
		if( isset($setting['serverkey']) ){
			$SERVER_KEY = $setting['serverkey'];
		}else{
			log_message('error', 'not found SERVER_KEY');
			return FALSE;
		}

		if( isset($setting['senderid']) ){
			$SENDER_ID = $setting['senderid'];
		}else{
			log_message('error', 'not found SERVER_ID');
			return FALSE;
		}

		$SEND_URL = 'https://fcm.googleapis.com/fcm/send';

		$url = $SEND_URL;

		if( $setting['sendtype'] == 'topic' ){
			$feilds = array(
				'to' => $token,
				'priority' => 'high', 
				'notification' => $playload_notification,
				'data'=> $playload_data
			);
		}else if ( $setting['sendtype'] == 'token' ) {
			$feilds = array(
				'registration_ids' => $token,
				'priority' => 'high', 
				'notification' => $playload_notification,
				'data'=> $playload_data
			);
		}
		
		$headers = array(
			'Authorization: key='.$SERVER_KEY,
			'Content-Type: application/json'
		);
		
		$data = json_encode($feilds);
		log_message('debug', 'notification data: '.$data);
		//Open connection
		$ch = curl_init();

		// Set the url
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		// Disabling SSL Ceritficate 
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
		$result = curl_exec($ch);
		log_message('debug', 'notification status: '.$result.' error: '.curl_errno($ch)." desc:".curl_error($ch));
		return  $result;
	}
}
?>
