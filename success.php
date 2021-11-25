
<?php
echo "Transaction Succeeded";

$val_id=urlencode($_POST['val_id']);
$store_id=urlencode("skb7560794ff8d65dc");
$store_passwd=urlencode("skb7560794ff8d65dc@ssl");
$requested_url = ("https://sandbox.sslcommerz.com/validator/api/validationserverAPI.php?val_id=".$val_id."&store_id=".$store_id."&store_passwd=".$store_passwd."&v=1&format=json");

$handle = curl_init();
curl_setopt($handle, CURLOPT_URL, $requested_url);
curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
curl_setopt($handle, CURLOPT_SSL_VERIFYHOST, false); # IF YOU RUN FROM LOCAL PC
curl_setopt($handle, CURLOPT_SSL_VERIFYPEER, false); # IF YOU RUN FROM LOCAL PC

$result = curl_exec($handle);

$code = curl_getinfo($handle, CURLINFO_HTTP_CODE);

if($code == 200 && !( curl_errno($handle)))
{

  # TO CONVERT AS ARRAY
  # $result = json_decode($result, true);
  # $status = $result['status'];

  # TO CONVERT AS OBJECT
  $result = json_decode($result);

  # TRANSACTION INFO
  $status = $result->status;
  $tran_date = $result->tran_date;
  $tran_id = $result->tran_id;
  $val_id = $result->val_id;
  $amount = $result->amount;
  $store_amount = $result->store_amount;
  $bank_tran_id = $result->bank_tran_id;
  $card_type = $result->card_type;

  # EMI INFO

  # ISSUER INFO
  $card_no = $result->card_no;
  $card_issuer = $result->card_issuer;
  $card_brand = $result->card_brand;
  $card_issuer_country = $result->card_issuer_country;
  $card_issuer_country_code = $result->card_issuer_country_code;

  # API AUTHENTICATION
  $APIConnect = $result->APIConnect;
  $validated_on = $result->validated_on;
  $gw_version = $result->gw_version;

  echo $status;
  echo $tran_date;
  echo $tran_id;
  echo $val_id;
  echo $amount;
  echo $card_type;

} else {

  echo "Failed to connect with SSLCOMMERZ";
}
?>
<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />

<!DOCTYPE html>
<html>
<head>
 

  
</head>
<style media="screen">
      <style type="text/css">

    body
    {
        background:#f2f2f2;
    }

    .payment
  {
    border:1px solid #f2f2f2;
    height:280px;
        border-radius:20px;
        background:#fff;
  }
   .payment_header
   {
     background:rgba(255,102,0,1);
     padding:20px;
       border-radius:20px 20px 0px 0px;
     
   }
   
   .check
   {
     margin:0px auto;
     width:50px;
     height:50px;
     border-radius:100%;
     background:#fff;
     text-align:center;
   }
   
   .check i
   {
     vertical-align:middle;
     line-height:50px;
     font-size:30px;
   }

    .content 
    {
        text-align:center;
    }

    .content  h1
    {
        font-size:25px;
        padding-top:25px;
    }

    .content a
    {
        width:200px;
        height:35px;
        color:#fff;
        border-radius:30px;
        padding:5px 10px;
        background:rgba(255,102,0,1);
        transition:all ease-in-out 0.3s;
    }

    .content a:hover
    {
        text-decoration:none;
        background:#000;
    }
   
</style
    </style>
  



</head>
<body>

<div class="container">
   <div class="row">
      <div class="col-md-6 mx-auto mt-5">
         <div class="payment">
            <div class="payment_header">
               <div class="check"><i class="fa fa-check" aria-hidden="true"></i></div>
            </div>
            <div class="content">
               <h1>Payment Success !</h1>
               <p>Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs. </p>
               <a href="#">Go to Home</a>
            </div>
            
         </div>
      </div>
   </div>
</div>

</body>
</html>



