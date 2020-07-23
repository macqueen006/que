<?php

// Retrieve the request's body
$body = @file_get_contents("php://input");
$signature = (isset($_SERVER['HTTP_X_PAYSTACK_SIGNATURE']) ? $_SERVER['HTTP_X_PAYSTACK_SIGNATURE'] : '');

/* It is a good idea to log all events received. Add code *
 * here to log the signature and body to db or file       */

if (!$signature) {
    // only a post with paystack signature header gets our attention
    exit();
}

define('PAYSTACK_SECRET_KEY','sk_test_354a8fe1388249156db33cc0334892731f9e2496');
// confirm the event's signature
if( $signature !== hash_hmac('sha512', $body, PAYSTACK_SECRET_KEY) ){
    // silently forget this ever happened
    exit();
}

http_response_code(200);
// parse event (which is json string) as object
// Give value to your customer but don't give any output
// Remember that this is a call from Paystack's servers and
// Your customer is not seeing the response here at all
$event = json_decode($body);
switch($event->event){
    // charge.success
    case 'charge.success':
        // TIP: you may still verify the transaction
        // before giving value.
        $username = $_SESSION['loginID'];
        $amount = $_COOKIE['deposit-amount'];
        $query = " SELECT * FROM users WHERE username='" . $username . "' OR user_email='" . $username . "' OR user_phone='" . $username . "' ";
        $result = Query($query);

        if($row = fetch_data($result)) {
            $dbUsername = $row['username'];

            $query = " INSERT INTO money_transaction(user,transaction,amount,status,date) VALUES('$dbUsername','Deposit','".$amount."','success',now()) ";
            $result = Query($query);
            confirm($result);

            if($result)
            {
                if(isset($_COOKIE['deposit-amount']))
                {
                    unset($_COOKIE['deposit-amount']);
                    setcookie('deposit-amount','', time() - 360);
                    redirect("../wallet.php");
                }
            }
        }
        break;
}
exit();