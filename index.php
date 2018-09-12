<?php
define('API_ACCESS_KEY','AAAAAoa9CgE:APA91bGFLIejv5wzFkN5-ep7hpr53a06ZpfDJQ7EA_iGmtenS2A0P-LFwXHhwH5iEac3NnT3jub01Yb8R07Q6qlotk8ZP0AULZhcb5dpZAqa944HBONjkOSXKCMPq57LrCvU6N-S5WsT');
 
 $fcmUrl = 'https://fcm.googleapis.com/fcm/send';

 $token='cnYQ9jtZ3rI:APA91bEZtTgKzG8n3FCEKPVAL-VojAtHBxkkPDfz-ys_rJa1qvqYZ9j8l6mjRd-mYrTh55dTSx97Nz2TOxF9qmZy-T33peCBK7l6eSd7zer07sjyrqx6O5jWMlJuu4fd2NMPbbXidtkT8CsCcd4rknti6LARyyduaA';

     
     $notification = [
            'title' =>'title',
            'body' => 'body of message 2.',
            'icon' =>'myIcon', 
            'sound' => 'mySound'
        ];
        $extraNotificationData = ["message" => $notification,"moredata" =>'dd'];
        $fcmNotification = [
            //'registration_ids' => $tokenList, //multple token array
            'to'        => $token, //single token
            'notification' => $notification,
            'data' => $extraNotificationData
        ];
        $headers = [
            'Authorization: key=' . API_ACCESS_KEY,
            'Content-Type: application/json'
        ];

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,$fcmUrl);
        curl_setopt($ch, CURLOPT_POST, true); 
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fcmNotification));
        $result = curl_exec($ch);
        curl_close($ch);

        echo $result;
