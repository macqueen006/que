<?php
require_once('../functions/init.php');
if($_COOKIE['deposit-amount']) {
    $curl = curl_init();
    $reference = isset($_GET['reference']) ? $_GET['reference'] : '';
    if (!$reference) {
        die('No reference supplied');
    }

    curl_setopt_array($curl, array(
        CURLOPT_URL => "https://api.paystack.co/transaction/verify/" . rawurlencode($reference),
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_HTTPHEADER => [
            "accept: application/json",
            "authorization: Bearer sk_test_354a8fe1388249156db33cc0334892731f9e2496",
            "cache-control: no-cache"
        ],
    ));

    $response = curl_exec($curl);
    $err = curl_error($curl);

    if ($err) {
        // there was an error contacting the Paystack API
        die('Curl returned error: ' . $err);
    }

    $tranx = json_decode($response);

    if (!$tranx->status) {
        // there was an error from the API
        die('API returned error: ' . $tranx->message);
    }

    if ('success' == $tranx->data->status) {
        // transaction was successful...
        // please check other things like whether you already gave value for this ref
        // if the email matches the customer who owns the product etc
        // Give value

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
                $query = " UPDATE users SET wallet=wallet+$amount WHERE username='$dbUsername' ";
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
        }
    }
}else{
    ?>
    <script type="text/javascript">
        alert("Session Expired!");
        window.location.href = '../deposit.php';
    </script>
    <?php
}