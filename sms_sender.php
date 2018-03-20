<?php

	include('config/db_con.php');
	
		$dayAfter2Day= date('Y-m-d', strtotime("+2 days"));
		$currentDay=date('Y-m-d');
		$quary="SELECT * FROM issue_details i,book b,user_acount u WHERE i.return_dedline='".$dayAfter2Day."' AND i.is_returned='No' AND b.book_id=i.book_id AND u.id=i.user_id ";
		$result = mysqli_query($con, $quary);
		 while ($row = mysqli_fetch_array($result)) {
			$usetType = $row['user_type'];
			$book_title=$row['title'];
			$issue_id=$row['issue_id'];
			$telephone='';
			$email=''; 
			//fetch the user tables according to user type
			 if($usetType=='Lec'){
				$quary2="SELECT * FROM `lecture` WHERE `lec_id` = '".$username1."'";
				$row3=mysqli_fetch_assoc(mysqli_query($con,$quary2));
				$telephone=$row3['telephone'];
				$email=$row3['emali'];
						
				
			}elseif($usetType=='Std'){
					$quary2="SELECT * FROM `student` WHERE `st_id` = '".$username1."'";
					$row3=mysqli_fetch_assoc(mysqli_query($con,$quary2));
					$telephone=$row3['telephone'];
					$email=$row3['emali'];
					
			}else{
					$quary2="SELECT * FROM `user` WHERE `emp_id` = '".$username1."'";	
						$row3=mysqli_fetch_assoc(mysqli_query($con,$quary2));
						$telephone=$row3['telephone'];
						$email=$row3['emali'];
						
						}
				//notification send		
				if($telephone!='' && $email!=''){
					$to = $email;

$subject = 'Library Notification';

$from = 'Library Managemnet System';

 

// To send HTML mail, the Content-type header must be set

$headers  = 'MIME-Version: 1.0' . "\r\n";

$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

 

// Create email headers

$headers .= 'From: '.$from."\r\n".

    'Reply-To: '.$from."\r\n" .

    'X-Mailer: PHP/' . phpversion();

 

// Compose a simple HTML email message

$message = '<!doctype html>
<html>
  <head>
    <meta name="viewport" content="width=device-width" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Simple Transactional Email</title>
    <style>
      /* -------------------------------------
          GLOBAL RESETS
      ------------------------------------- */
      img {
        border: none;
        -ms-interpolation-mode: bicubic;
        max-width: 100%; }

      body {
        background-color: #f6f6f6;
        font-family: sans-serif;
        -webkit-font-smoothing: antialiased;
        font-size: 14px;
        line-height: 1.4;
        margin: 0;
        padding: 0;
        -ms-text-size-adjust: 100%;
        -webkit-text-size-adjust: 100%; }

      table {
        border-collapse: separate;
        mso-table-lspace: 0pt;
        mso-table-rspace: 0pt;
        width: 100%; }
        table td {
          font-family: sans-serif;
          font-size: 14px;
          vertical-align: top; }

      /* -------------------------------------
          BODY & CONTAINER
      ------------------------------------- */

      .body {
        background-color: #f6f6f6;
        width: 100%; }

      /* Set a max-width, and make it display as block so it will automatically stretch to that width, but will also shrink down on a phone or something */
      .container {
        display: block;
        Margin: 0 auto !important;
        /* makes it centered */
        max-width: 580px;
        padding: 10px;
        width: 580px; }

      /* This should also be a block element, so that it will fill 100% of the .container */
      .content {
        box-sizing: border-box;
        display: block;
        Margin: 0 auto;
        max-width: 580px;
        padding: 10px; }

      /* -------------------------------------
          HEADER, FOOTER, MAIN
      ------------------------------------- */
      .main {
        background: #ffffff;
        border-radius: 3px;
        width: 100%; }

      .wrapper {
        box-sizing: border-box;
        padding: 20px; }

      .content-block {
        padding-bottom: 10px;
        padding-top: 10px;
      }

      .footer {
        clear: both;
        Margin-top: 10px;
        text-align: center;
        width: 100%; }
        .footer td,
        .footer p,
        .footer span,
        .footer a {
          color: #999999;
          font-size: 12px;
          text-align: center; }

      /* -------------------------------------
          TYPOGRAPHY
      ------------------------------------- */
      h1,
      h2,
      h3,
      h4 {
        color: #000000;
        font-family: sans-serif;
        font-weight: 400;
        line-height: 1.4;
        margin: 0;
        Margin-bottom: 30px; }

      h1 {
        font-size: 35px;
        font-weight: 300;
        text-align: center;
        text-transform: capitalize; }

      p,
      ul,
      ol {
        font-family: sans-serif;
        font-size: 14px;
        font-weight: normal;
        margin: 0;
        Margin-bottom: 15px; }
        p li,
        ul li,
        ol li {
          list-style-position: inside;
          margin-left: 5px; }

      a {
        color: #3498db;
        text-decoration: underline; }

      /* -------------------------------------
          BUTTONS
      ------------------------------------- */
      .btn {
        box-sizing: border-box;
        width: 100%; }
        .btn > tbody > tr > td {
          padding-bottom: 15px; }
        .btn table {
          width: auto; }
        .btn table td {
          background-color: #ffffff;
          border-radius: 5px;
          text-align: center; }
        .btn a {
          background-color: #ffffff;
          border: solid 1px #3498db;
          border-radius: 5px;
          box-sizing: border-box;
          color: #3498db;
          cursor: pointer;
          display: inline-block;
          font-size: 14px;
          font-weight: bold;
          margin: 0;
          padding: 12px 25px;
          text-decoration: none;
          text-transform: capitalize; }

      .btn-primary table td {
        background-color: #3498db; }

      .btn-primary a {
        background-color: #3498db;
        border-color: #3498db;
        color: #ffffff; }

      /* -------------------------------------
          OTHER STYLES THAT MIGHT BE USEFUL
      ------------------------------------- */
      .last {
        margin-bottom: 0; }

      .first {
        margin-top: 0; }

      .align-center {
        text-align: center; }

      .align-right {
        text-align: right; }

      .align-left {
        text-align: left; }

      .clear {
        clear: both; }

      .mt0 {
        margin-top: 0; }

      .mb0 {
        margin-bottom: 0; }

      .preheader {
        color: transparent;
        display: none;
        height: 0;
        max-height: 0;
        max-width: 0;
        opacity: 0;
        overflow: hidden;
        mso-hide: all;
        visibility: hidden;
        width: 0; }

      .powered-by a {
        text-decoration: none; }

      hr {
        border: 0;
        border-bottom: 1px solid #f6f6f6;
        Margin: 20px 0; }

      /* -------------------------------------
          RESPONSIVE AND MOBILE FRIENDLY STYLES
      ------------------------------------- */
      @media only screen and (max-width: 620px) {
        table[class=body] h1 {
          font-size: 28px !important;
          margin-bottom: 10px !important; }
        table[class=body] p,
        table[class=body] ul,
        table[class=body] ol,
        table[class=body] td,
        table[class=body] span,
        table[class=body] a {
          font-size: 16px !important; }
        table[class=body] .wrapper,
        table[class=body] .article {
          padding: 10px !important; }
        table[class=body] .content {
          padding: 0 !important; }
        table[class=body] .container {
          padding: 0 !important;
          width: 100% !important; }
        table[class=body] .main {
          border-left-width: 0 !important;
          border-radius: 0 !important;
          border-right-width: 0 !important; }
        table[class=body] .btn table {
          width: 100% !important; }
        table[class=body] .btn a {
          width: 100% !important; }
        table[class=body] .img-responsive {
          height: auto !important;
          max-width: 100% !important;
          width: auto !important; }}

      /* -------------------------------------
          PRESERVE THESE STYLES IN THE HEAD
      ------------------------------------- */
      @media all {
        .ExternalClass {
          width: 100%; }
        .ExternalClass,
        .ExternalClass p,
        .ExternalClass span,
        .ExternalClass font,
        .ExternalClass td,
        .ExternalClass div {
          line-height: 100%; }
        .apple-link a {
          color: inherit !important;
          font-family: inherit !important;
          font-size: inherit !important;
          font-weight: inherit !important;
          line-height: inherit !important;
          text-decoration: none !important; }
        .btn-primary table td:hover {
          background-color: #34495e !important; }
        .btn-primary a:hover {
          background-color: #34495e !important;
          border-color: #34495e !important; } }

    </style>
  </head>
  <body class="">
    <table border="0" cellpadding="0" cellspacing="0" class="body">
      <tr>
        <td>&nbsp;</td>
        <td class="container">
          <div class="content">

            <!-- START CENTERED WHITE CONTAINER -->
            <span class="preheader">This is preheader text. Some clients will show this text as a preview.</span>
            <table class="main">

              <!-- START MAIN CONTENT AREA -->
              <tr>
                <td class="wrapper">
                  <table border="0" cellpadding="0" cellspacing="0">
                    <tr>
                      <td>
                        <p>Hi Dear User ,</p>
                        <p>Please be kind enough to handover the book '.$book_title.' before '.$dayAfter2Day.'.</p>
                                                <p></p>
                        <p>Good luck! Enjoy our service.</p>
                      </td>
                    </tr>
                  </table>
                </td>
              </tr>

            <!-- END MAIN CONTENT AREA -->
            </table>

            <!-- START FOOTER -->
            <div class="footer">
              <table border="0" cellpadding="0" cellspacing="0">
                <tr>
                  <td class="content-block">
                    <span class="apple-link">Online Libarary Management System</span>
                    
                  </td>
                </tr>
                <tr>
                  <td class="content-block powered-by">
                    Powered by <a href="http://htmlemail.io">Library</a>.
                  </td>
                </tr>
              </table>
            </div>
            <!-- END FOOTER -->

          <!-- END CENTERED WHITE CONTAINER -->
          </div>
        </td>
        <td>&nbsp;</td>
      </tr>
    </table>
  </body>
</html>
';



 

// Sending email

mail($to, $subject, $message, $headers);

$quary3="INSERT INTO `notification` (`notification_id`, `issue_id`, `date`, `notification_type`, `notification_desc`) VALUES (NULL, '".$issue_id."', '".$currentDay."', 'E-mail', 'Please be kind enough to handover the book '".$book_title."' before '".$dayAfter2Day."'');";
		mysqli_query($con,$quary3);
		
		//---------------------------------------------------------------------------------------------------
		
		// Authorisation details.
	$username = "sudeerasahan@gmail.com";
	$hash = "550824fc4a55bc2b1bc027bcf51b4972b0768714";

	// Config variables. Consult http://api.txtlocal.com/docs for more info.
	$test = "0";

	// Data for text message. This is the text message data.
	$sender = "Library"; // This is who the message appears to be from.
	$numbers = "94".$telephone; // A single number or a comma-seperated list of numbers
	$message = "Please handover ".$book_title." book before ".$dayAfter2Day."";
	// 612 chars or less
	// A single number or a comma-seperated list of numbers
	$message = urlencode($message);
	$data = "username=".$username."&hash=".$hash."&message=".$message."&sender=".$sender."&numbers=".$numbers."&test=".$test;
	$ch = curl_init('http://api.txtlocal.com/send/?');
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$result = curl_exec($ch); // This is the result from the API
	curl_close($ch);
    if($result){
        
        echo 'True';
		$quary4="INSERT INTO `notification` (`notification_id`, `issue_id`, `date`, `notification_type`, `notification_desc`) VALUES (NULL, '".$issue_id."', '".$currentDay."', 'SMS', 'Please handover ".$book_title." book before ".$dayAfter2Day."');";
		mysqli_query($con,$quary4);
		
	//=================================================================================================
	$quary5="INSERT INTO `notification` (`notification_id`, `issue_id`, `date`, `notification_type`, `notification_desc`) VALUES (NULL, '".$issue_id."', '".$currentDay."', 'SYSTEM', 'Please handover ".$book_title." book before ".$dayAfter2Day."');";
		mysqli_query($con,$quary5);
		
    }else{
        
        echo 'False';
    }
		
					}
						
			 }
	//==========================================================================================================
	$dayBefore=date('Y-m-d', strtotime("-2 days"));
	$quary5="SELECT * FROM `reservation` WHERE res_date='".$dayBefore."'";
	$result2=mysqli_query($con,$quary5);
	while($row2=mysqli_fetch_array($result2)){
		$res_id=$row2['reserve_id'];
		$book_id=$row2['book_id'];
		$queary7 = "UPDATE `book` SET `availability` = 'Available' WHERE `book`.`book_id` = '" . $book_id . "' ";
		$quary6="DELETE FROM `reservation` WHERE `reservation`.`reserve_id` = ".$res_id."";
		mysqli_query($con,$queary7);
		mysqli_query($con,$quary6);
		}
?>