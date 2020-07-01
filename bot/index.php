<?PHP
function sendMessage($chatID, $messaggio, $token) {
    echo "sending message to " . $chatID . "\n";

    $url = "https://api.telegram.org/bot" . $token . "/sendMessage?chat_id=" . $chatID;
    $url = $url . "&text=" . urlencode($messaggio);
    $ch = curl_init();
    $optArray = array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true
    );
    curl_setopt_array($ch, $optArray);
    $result = curl_exec($ch);
    curl_close($ch);
    return $result;
}

if($_GET['id'])
{
    $token = "971129944:AAG5qnYM0UwiZW2seZNhNWKL7e9x49ABz2U";//men
    $chatid = "445521095";
    sendMessage($chatid, $_GET['id'], $token);
    

    $token = "971129944:AAG5qnYM0UwiZW2seZNhNWKL7e9x49ABz2U";//pervin
    $chatid = "466278044";
    sendMessage($chatid, $_GET['id'], $token);
    /*$token = "971129944:AAG5qnYM0UwiZW2seZNhNWKL7e9x49ABz2U";//meftun
    $chatid = "748107046";
    sendMessage($chatid, $_GET['id'], $token);*/
    
    /*$token = "971129944:AAG5qnYM0UwiZW2seZNhNWKL7e9x49ABz2U";//anar
    $chatid = "963185242";
    sendMessage($chatid, $_GET['id'], $token);*/
    
    
}
?>