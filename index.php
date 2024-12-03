<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cryptocurrency</title>
    <link rel="stylesheet" href="./assets/style.css">
</head>
<body>
    <div class="container">
        <h1>Crypto Masters</h1>
        <p> 
            Beinvenue sur notre convertisseur de Cryptomonaies. Cet outil vous permet de convertir instantanément vos BTC (Bitcoin)
            ou ETH (Ethereum) en Euro. <br>en utilisant les taux de change en temps reel.
        </p>
        <div class="inputs">
            <form method="post">
                <div class="in-fields">
                    <input type="number" name="amount" id="amount" placeholder="Amount" require>
                    <select name="currency" id="currency" require>
                        <option value="BTC">BTC</option>
                        <option value="ETH">ETH</option>
                    </select>
                </div>
                <button type="submit" name="convert" >Convert</button>
            </form>
        </div>

        <div class="output">
            <?php 
                if( $_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['convert'])) {
                    $amount = $_POST['amount'];
                    $currency = $_POST['currency'];
                    
                    if ($amount > 0) {

                        $apiUrl = "https://cex.io/api/ticker/$currency/EUR";
                        $response = file_get_contents($apiUrl);
                        $data = json_decode($response, true);

                        $last = (int)$data['last'];
                        $result = $amount * $last;
                        echo "<h1> $amount $currency = $result EURO </h1>";
                    }
                    
                }
            ?>
        </div>
    </div>
</body>
</html>