<?php
/**
 * Created by PhpStorm.
 * User: ilanv
 * Date: 29/11/2016
 * Time: 14:45
 */

namespace ilanvac\Services\recaptchaService;

require_once __DIR__."/../vendor/autoload.php";

use ReCaptcha\ReCaptcha;

class recaptchaService
{
    const SECRET_KEY = '6LcnnQcUAAAAAA3VLF4BguHGtlXAXhHFo-XuuxOl';
    const SITE_KEY = '6LcnnQcUAAAAAOmzhoelbgh_KfRgC39vrAML_xvR';


    public function getRecaptcha($response, $ip)
    {
        $resp = $this->getRecaptchaService()->verify($response, $_SERVER['REMOTE_ADDR']);
        if (!$resp->isSuccess()){
            return $resp->getErrorCodes();
        }
        return true;
    }

    /**
     * @return ReCaptcha
     */
    private function getRecaptchaService()
    {
        return new ReCaptcha(self::SECRET_KEY);
    }

    /**
     * @return string
     */
    public function getSiteKey()
    {
        return self::SITE_KEY;
    }
}

return new recaptchaService();