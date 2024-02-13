<?php 
namespace App\Services\Notification;
use GuzzleHttp;
use GuzzleHttp\Subscriber\Oauth\Oauth1;
use Infobip\Api\SendSmsApi;
use Infobip\Api\SmsApi;
use Infobip\Configuration;
use Infobip\Model\SmsAdvancedTextualRequest;
use Infobip\Model\SmsDestination;
use Infobip\Model\SmsTextualMessage;
use Throwable;

class Infobip
{

    public static $API_KEY = '171fd75b1fc0464e2c7bd63d557e8813-565943ac-a95e-4ee5-937b-55c73adae8cf';
    public static $URL_BASE_PATH = 'https://gyx82e.api.infobip.com';
    public static $API_KEY_PREFIX = "App";
   

    public static function EnviarSMS($telefonos,$mensaje){
        $configuration = (new Configuration())->setHost(self::$URL_BASE_PATH)->setApiKeyPrefix('Authorization',self::$API_KEY_PREFIX)->setApiKey('Authorization',self::$API_KEY);
        $client = new GuzzleHttp\Client();
        $sendSmsApi = new SendSmsApi($client,$configuration);
        $destinations = self::formatNumber($telefonos);
        $message = (new SmsTextualMessage())
        ->setFrom('Baulito.co')
        ->setText($mensaje)
        ->setDestinations($destinations);
        $request = (new SmsAdvancedTextualRequest())->setMessages([$message]);
        try {
            $smsResponse = $sendSmsApi->sendSmsMessage($request);
            echo "<pre>";
            print_r($smsResponse->getMessages());
            echo "</pre>";
        } catch (Throwable $apiException) {
            echo("HTTP Code: " . $apiException->getCode()."".$apiException->getMessage()."\n");
        }

    }

    public static function formatNumber($telefonos){
        $destinations = [];
        if(is_array($telefonos)){
            foreach ($telefonos as $key => $numero) {
                $telefono = (new SmsDestination())->setTo($numero);
                array_push($destinations,$telefono);
            }
        } else {
            $telefono = (new SmsDestination())->setTo($telefonos);
            array_push($destinations,$telefono);
        }
        return $destinations;
    }

}