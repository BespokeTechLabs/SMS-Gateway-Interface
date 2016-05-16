<?php
/*
		Class for communicating with a Wincast SMS Gateway via XML POST.
		Written by Lewis Smallwood on 16/05/2016.
*/

error_reporting(0); // Remove CURL error messages

class SMSGateway {
   var $url;
   var $username;
   var $password;
   var $from;

   function SMSGateway($url, $username, $password, $from) {
      $this->url = $url;
      $this->username = $username;
      $this->password = $password;
      $this->from = $from;
   }

   function send($to, $message) {
      // Setup who to send the message to.
      $requestID = mt_rand(100000, 999999);
      $xml = '<?xml version="1.0" standalone="no"?>';
      $xml .= '<!DOCTYPE WIN_DELIVERY_2_SMS SYSTEM "winbound_messages_v1.dtd">';
      $xml .= '<WIN_DELIVERY_2_SMS><SMSMESSAGE>';
      $xml .= '<DESTINATION_ADDR>'.$to.'</DESTINATION_ADDR>';
      $xml .= '<TEXT><![CDATA['.$message.']]></TEXT>';
      $xml .= '<TRANSACTIONID>111222333</TRANSACTIONID>';
      $xml .= '<TYPEID>2</TYPEID><SERVICEID>1</SERVICEID>';
      $xml .= '<COSTID>1</COSTID><SOURCE_ADDR>'.$this->from.'</SOURCE_ADDR>';
      $xml .= '</SMSMESSAGE></WIN_DELIVERY_2_SMS>';

      $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL, $this->url);
      curl_setopt($ch, CURLOPT_POST, 1);
      curl_setopt($ch, CURLOPT_POSTFIELDS, "User=".$this->username."&Password=".$this->password."&RequestID=".$requestID."&WIN_XML=".$xml."");
      curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/x-www-form-urlencoded'));
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

      $response = curl_exec($ch);
      curl_close ($ch);
      return $response;
   }
}

?>
