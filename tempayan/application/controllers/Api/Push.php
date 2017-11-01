<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Push extends CI_Controller {

  public function send() {
		$msg = array
		(
			'title'		=> 'This is a title. title',
			'body' => 'test message',
			'vibrate'	=> "1",
			'sound'		=> "default",
		);
		$fields = array
		(
			'to' 	=> 'fpsK907dQ3E:APA91bE3uXBysbCuDDYYx6d3NKqD72jhzr-A_TlI6_qDCHRMqhZHbmN2_Qabq80bhlHU5hN0jbMj0j-oyj-x0StkWdtCRN268PBQVUYZfhEOKXOu8NAO0YBigMXNXBR9foh9-prmAkl3',
			'notification'			=> $msg
		);
        // Set POST variables
        $url = 'https://fcm.googleapis.com/fcm/send';

        $headers = array(
            'Authorization: key=AAAAeq1P6UU:APA91bETZTdRNqx0CLTm4LgTBU8tHAVTZNIfIta8OaActpQaAe_zR0VOGNPl45cNeF6nKBiYX6LauUbInriuVlPEtPTSx6nsIMkRII269VH6aRz40LYC_gOmqN6zE5jlYsDyllXmSXGU',
            'Content-Type: application/json'
        );
        // Open connection
        $ch = curl_init();

        // Set the url, number of POST vars, POST data
        curl_setopt($ch, CURLOPT_URL, $url);

        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        // Disabling SSL Certificate support temporarly
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));

        // Execute post
        $result = curl_exec($ch);
        if ($result === FALSE) {
            die('Curl failed: ' . curl_error($ch));
        }

        // Close connection
        curl_close($ch);

        return $result;
    }

}

/* End of file Push.php */
/* Location: ./application/controllers/Api/Push.php */