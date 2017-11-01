<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Single Sender FIrebase Push To Android
 *
 * @package Codeigniter
 * @author Vicky Saputra <http://vicky.work
 **/
class Firebase_push
{
	protected $ci;

	private $api_key = "AAAAeq1P6UU:APA91bETZTdRNqx0CLTm4LgTBU8tHAVTZNIfIta8OaActpQaAe_zR0VOGNPl45cNeF6nKBiYX6LauUbInriuVlPEtPTSx6nsIMkRII269VH6aRz40LYC_gOmqN6zE5jlYsDyllXmSXGU";
	private $url = 'https://fcm.googleapis.com/fcm/send';

	public $ID;
	public $title;
	public $message;
	public $to;
	public $activityName;

	public function __construct()
	{
        $this->ci =& get_instance();
	}

	public function setID($param = 0)
	{
		$this->ID = $param;
		return $this;
	}

	public function setTitle($param = "Android Notification")
	{
		$this->title = $param;
		return $this;
	}

	public function setMessage($param = "This Single Sender FIrebase Push To Android")
	{
		$this->message = $param;
		return $this;
	}

	public function setTo($param = "")
	{
		$this->to = $param;
		return $this;
	}

	public function setActivityName($param = 'MainActivity')
	{
		$this->activityName = $param;
		return $this;
	}

	public function fields()
	{
		return array(
			'to' => $this->to,
			'notification' => array(
				'title'	=> $this->title,
				'body' => $this->message,
				'options' => array(
					'activity' => $this->activityName,
					'ID' => $this->ID
				),
				'vibrate' => "1",
				'sound'	=> "default"
			)
		);
	}

	public function send()
	{
		$curl = curl_init();
        // Set the url, number of POST vars, POST data
        curl_setopt($curl, CURLOPT_URL, $this->url);

        curl_setopt($curl, CURLOPT_POST, TRUE);
        curl_setopt($curl, CURLOPT_HTTPHEADER, 
        	array(
            	'Authorization: key='.$this->api_key,
            	'Content-Type: application/json'
        	)
        );
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);

        // Disabling SSL Certificate support temporarly
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);

        curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($this->fields()));

        // Execute post
        $result = curl_exec($curl);
        if ($result === FALSE) 
           die('Curl failed: ' . curl_error($curl));

        // Close connection
        curl_close($curl);

        return $result;
	}

}

/* End of file Firebase_push.php */
/* Location: ./application/libraries/Firebase_push.php */
