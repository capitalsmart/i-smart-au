<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

function custom_send_email($to, $cc, $subject, $message, $attachments, $annotatedImage = null, $xmlAttachment = null)
{
    $CI =& get_instance();
    $config = $CI->config->item('email_config');
    $CI->load->library('email', $config);
    $CI->email->clear(true);
    $CI->email->set_newline("\r\n");
    $CI->email->from(ADMIN_EMAIL, 'i-S.M.A.R.T');

    if ($cc != null) {
        $CI->email->cc(is_array($cc) ? implode(",", $cc) : $cc);
    }

    $CI->email->to(is_array($to) ? implode(",", $to) : $to);
    $CI->email->subject($subject);
    $CI->email->message($message);

    $count = 1;
    foreach ($attachments as $attachment) {
        $ext = pathinfo($attachment, PATHINFO_EXTENSION);
        $CI->email->attach($attachment, '', 'Damaged Picture ' . $count . '.' . $ext);
        $count++;
    }
    if ($annotatedImage != null) {
        $ext = pathinfo($annotatedImage, PATHINFO_EXTENSION);
        $CI->email->attach($annotatedImage, '', 'Captured Damage.' . $ext);
    }

    if ($xmlAttachment != null) {
        $CI->email->attach($xmlAttachment, '', 'Submited_Data.xml');
    }

    if ($CI->email->send()) {
        return true;
    } else {
        show_error($CI->email->print_debugger());
        return false;
    }
}


function sendgrid_send_email($to, $cc, $subject, $message, $attachments, $annotatedImage = null, $xmlAttachment = null)
{

$email = new \SendGrid\Mail\Mail();
$email->setFrom(ADMIN_EMAIL, "i-S.M.A.R.T");
$email->setSubject("Sending with Twilio SendGrid is Fun");
$email->addTo("scott.lancaster@amagroupltd.com", "Scott Lancaster");
$email->addContent("text/plain", "and easy to do anywhere, even with PHP");
$email->addContent(
    "text/html", "<strong>and easy to do anywhere, even with PHP</strong>"
);
$sendgrid = new \SendGrid(getenv('SENDGRID_API_KEY'));
try {
    $response = $sendgrid->send($email);
    print $response->statusCode() . "\n";
    print_r($response->headers());
    print $response->body() . "\n";
} catch (Exception $e) {
    echo 'Caught exception: '. $e->getMessage() ."\n";
}

}


function save_data_as_xml_file($data, $user_id)
{
    //creating object of SimpleXMLElement
    $xml_car_info = new SimpleXMLElement("<?xml version=\"1.0\"?><car_info></car_info>");

    //function call to convert array to xml
    array_to_xml(clean_post_data($data), $xml_car_info);

    $xml_file_name = 'assets/uploads/' . $user_id . '/form_data.xml';
    //saving generated xml file
    $xml_car_info->asXML($xml_file_name);

    return $xml_file_name;
}

function clean_post_data($params)
{
    if (isset($params['annotated-image'])) {
        unset($params['annotated-image']);
        return $params;
    }
    return $params;
}

function base64_to_jpeg($base64_string, $output_file)
{
    $ifp = fopen($output_file, "wb");
    fwrite($ifp, base64_decode(str_replace("data:image/png;base64,", "", $base64_string)));
    fclose($ifp);
    return ($output_file);
}


function array_to_xml($array, &$xml_car_info)
{
    foreach ($array as $key => $value) {
         //if (!empty($value)) {
            if (is_array($value)) {
                if (!is_numeric($key)) {
                    $subnode = $xml_car_info->addChild("$key");
                    array_to_xml($value, $subnode);
                } else {
                    $subnode = $xml_car_info->addChild("item$key");
                    array_to_xml($value, $subnode);
                }
            } else {
                $xml_car_info->addChild("$key", htmlspecialchars("$value"));
            }
        //}
    }
}

function rrmdir($dir) { 
   if (is_dir($dir)) { 
     $objects = scandir($dir); 
     foreach ($objects as $object) { 
       if ($object != "." && $object != "..") { 
         if (is_dir($dir."/".$object))
           rrmdir($dir."/".$object);
         else
           unlink($dir."/".$object); 
       } 
     }
     rmdir($dir); 
   } 
 }
