<?php

namespace App\Services;

use Berkayk\OneSignal\OneSignalFacade;

class OneSignalService
{
    public static function sendNotification($attributes): void
    {
        $amount = $attributes['amount'];
        $info = $attributes['info'];
        $notificationMessage = "נוסף תשלום חדש בסך $amount שח  עם המידע הזה: $info";
        OneSignalFacade::sendNotificationToExternalUser(
            $notificationMessage,
            explode(',', config('onesignal.external_ids')),
            $url = null,
            null,
            $buttons = null,
            $schedule = null
        );
    }

}
