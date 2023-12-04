<?php
use App\Models\MailSettings;

function hello(){
    $datas = MailSettings::first()->get();
    return $datas;
}

