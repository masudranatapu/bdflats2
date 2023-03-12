<?php

namespace App\Traits;

use Illuminate\Support\Facades\Http;

trait SMSAPI
{
    protected function sendSMS($to, $message)
    {
        $message = str_replace(" ", "+", $message);
        $message = 'RM0 AWSBIZ : OTP  ' . $message;
        $apiUrl = "http://web.bulksms2u.com/websmsapi/ISendSMS.aspx";
        $query = [
            "username"  => "sms_asia",
            "password"  => "sms_asiapassword",
            "message"   => $message,
            "mobile"    => '+60' . $to,
            "sender"    => "pdtv",
            "type"      => 1
        ];

        $apiUrl .= '?' . http_build_query($query);

        $response = Http::get($apiUrl);
        $code = $response->body();
        $code = explode(":", $code)[0];
        if (!$response->serverError() && $code != "1701") {
            return false;
        }

        return true;
    }


    protected function sendSMS1($to, $message)
    {
        // $message = str_replace(" ", "+", $message);
        $message = 'RM0 AWSBIZ ' . $message;
        $apiUrl = "http://web.bulksms2u.com/websmsapi/ISendSMS.aspx";
        $query = [
            "username"  => "sms_asia",
            "password"  => "sms_asiapassword",
            "message"   => $message,
            "mobile"    => '+60' . $to,
            "sender"    => "pdtv",
            "type"      => 1
        ];

// dd($query);
        $apiUrl .= '?' . http_build_query($query);

        $response = Http::get($apiUrl);
        $code = $response->body();
        $code = explode(":", $code)[0];
        // dd($code);
        if (!$response->serverError() && $code != "1701") {
            return false;
        }

        return true;
    }



    protected function sendSmsMetrotel($body, $mobile ){
        if(setting()->APP_MODE == 'live'){
            $url = "http://portal.metrotel.com.bd/smsapi";
            $data = [
              "api_key" => "R20000315d809876d27604.84144217",
              "type" => "text",
              "contacts" => $mobile,
              "senderid" => "8809612440143",
              "msg" => $body,
            ];
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            $response = curl_exec($ch);
            curl_close($ch);
            return $response;
        }else{
            return true;
        }


    }

}

