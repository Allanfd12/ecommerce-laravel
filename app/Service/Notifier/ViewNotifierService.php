<?php
namespace App\Service\Notifier;

class ViewNotifierService {

    
    public static function success(DefaultMessagesSuccess $message) {
        session()->flash('success_message', $message->value);
    }

    public static function error(DefaultMessagesError $message) {
        session()->flash('error_message', $message->value);
    }
    
}