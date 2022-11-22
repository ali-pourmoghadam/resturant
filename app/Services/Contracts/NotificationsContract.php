<?php

namespace App\Services\Contracts;


interface NotificationsContract {

    public function registerNotification();

    public function unreadNotifications();

    public function getNotifications();
    
    public function markRead(int $id);

    public function count();



}