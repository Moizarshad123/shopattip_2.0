
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Thank You</title>
  </head>
  <style>
    body {
      margin: 0;
    }
    .nav-sec {
      background-color: #000000;
      color: white;
      box-shadow: 0 12px 6px rgba(0, 0, 0, 0.16);
      display: flex;
      align-items: center;
      padding: 15px 30px;
    }
    .header-content a {
      color: white !important;
      text-decoration: none !important;
    }
    ul.log-reg-ul {
      display: inline-block;
      padding: 0;
      margin-left: 15px;
    }
    .mail-address {
      position: relative;
      margin-right: 30px;
    }
    .contact-num {
      position: relative;
      margin-right: 40px;
    }
    .header-content {
      margin-top: 0;
      margin-left: auto !important;
    }
    ul.log-reg-ul {
      margin-bottom: 0;
    }
    ul.log-reg-ul {
      padding: 0 !important;
      margin-left: 6px !important;
    }
    .log-reg-ul li {
      display: inline-block;
    }
    span.mail-address img {
      position: relative;
      width: 15px;
      left: -3px;
      top: 2px;
    }

    ul.log-reg-ul img {
      width: 16px;
    }

    ul.log-reg-ul {
      margin-top: 0;
    }
 /*   span.contact-num img {
      width: 16px;
      position: relative;
      top: 4px;
      left: -3px;
    }*/
    

    .email-content {
    padding: 30px 10%;
}
    /*p span {
      color: #d70d20;
    }*/
    .footer-top {
      background-color: #000000;
      padding: 30px 0;
    }
   /* span.v-line:after {
      content: "|";
      padding: 0 10px;
    }*/
    .cart-div {
      padding-right: 20px;
    }
    .footer-top {
      background-color: #000000;
      padding: 30px 0;
    }
    a img {
      width: 100%;
    }
     .foot
    {
        line-height: 6px !important;
    }
   
    .verifyBtn {
      background-color: #4CAF50;
      border: none;
      color: white;
      padding: 15px 32px;
      text-align: center;
      text-decoration: none;
      display: inline-block;
      font-size: 16px;
    }
  </style>
  <body>

  	 @php
        $username          = $data['username'];

    @endphp
      <img class="center" src="https://www.shopattip.com/images/logo3.png" alt="logo" />
     <div class="email-content">
       <h2 style="text-align: center">Welcome to ShopatTip </h2>
       <p>Hello, {{ $data['username'] }} </p>
       <p><b>Thank you!</b> for creating account at shopattip</p>
       <p>Please click on mention below link to verify you email address</p>

       <br>
       
        {{-- <a href="http://shopattip.com/customer_login" class="verifyBtn">Verify Your Account</a> --}}
    

        <a href="{{url('user/verify', $data['token'])}}" class="verifyBtn">Verify Email</a> 

     
	   </div>
  </body>
</html>
