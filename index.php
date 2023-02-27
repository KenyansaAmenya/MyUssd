<?php
//Reads the variables sent via POST from AT gateway
$_SESSION = $_POST["sessionID"];
$serviceCode = $_POST["serviceCode"];
$phoneNumber =$_POST["phoneNumber"];
$text = $_POST["text"];

if($text == "") {
    //This is the first request> Note how we start the response with CON
    $response = "CON what would you want to check \n";
    $response = "1. Check Case Status \n";
    $response = "2. Payments";
    $response = "3. Pick dates";
    $response = "0. Exit";
} else if ($text == "1") {
    //Business logic for the first level response
    $response = "CON Choose case information you want to view \n";
    $response = "1. Check on case activity\n";
    $response = "2. Check case outcome";
    $response = "0. Exit \n";
} else if ($text == "2") {
    //Business logic for the first level response
    $response = "CON Choose payment information you want to view \n";
    $response = "1. Pay Now \n";
    $response = "2. Check payment status \n";
    $response = "0. Exit \n";
} else if ($text == "3") {
    //Business logic for the first level response
    $response = "CON Choose the type of date you want to select \n";
    $response = "1. Mention Date \n";
    $response = "2. Hearing date \n";
    $response = "3. Judment date \n";
    $response = "0. Exit \n";
} else if ($text == "0") {
    //Business logic for the first level response
    //This is a terminal request. it starts with END
    $response = "END session".$exit;
    //Business logic for the second level response where the user selected 1 in the first instance
} else if ($text == "1*1") {
    $response = "CON Enter the case tracking no \n";
    $response = "0. exit \n";
} else if ($text == "1*1") {
    //This is a second level response where the user selected 1 and was propmted to input case tracking number
    $caseActivity = "hg date of 12/12/23";
    //This is a terminal request. we start with END
    $response = "END the case activity is ".$caseActivity;
} else if ($text == "1*1*0") {
    //Business logic for the secong level response if the user selects 1 then 2 but chooses to exit 
    //This is a terminal request. it starts with END
    $response = "END session".$exit;

} else if ($text == "1*2") {
    $response = "CON Enter the case tracking no \n";
    $response = "0. exit \n";
} else if ($text == "1*2") {
    //This is a second level response where the user selected 1 then 2 and was propmted to input case tracking number
    $caseOutcome = "judgment given";
    //This is a terminal request. we start with END
    $response = "END the case outcome is".$caseOutcome;
} else if ($text == "1*2*0") {
    //Business logic for the secong level response if the user selects 1 then 1 but chooses to exit 
    //This is a terminal request. it starts with END
    $response = "END session" .$exit;
    //Business logic for the second level response where the user selected 2 in the first instance
} else if ($text == "2*1") {
    $response = "CON Enter the case tracking no \n";
    $response = "0. exit \n";
} else if ($text == "2*1") {
    //This is a second level response where the user selected 2 the 1 and was propmted to input case tracking number
    $payNow = "Transaction successful";
    //This is a terminal request. we start with END
    $response = "END your payment is" .$payNow;
} else if ($text == "1*1*0") {
    //Business logic for the secong level response if the user selects 2 then 1 but chooses to exit 
    //This is a terminal request. it starts with END
    $response = "END session" .$exit;
    //Business logic for the second level response where the user selected 3 in the first instance
} else if ($text == "3*1") {
    $response = "CON Enter the case tracking no \n";
    $response = "0. exit \n";
} else if ($text == "3*1") {
    //This is a second level response where the user selected 3 then 1 and was propmted to input case tracking number
    $mentionDate = "Mention date selected";
    //This is a terminal request. we start with END
    $response = "END your mention date is" . $mentionDate;
} else if ($text == "3*1*0") {
    //Business logic for the secong level response if the user selects 3 then 1 but chooses to exit 
    //This is a terminal request. it starts with END
    $response = "END session" . $exit;
    //Business logic for the second level response where the user selected 3 then 2 in the first instance
} else if ($text == "3*2") {
    $response = "CON Enter the case tracking no \n";
    $response = "0. exit \n";
} else if ($text == "3*2") {
    //This is a second level response where the user selected 3 then 2 and was propmted to input case tracking number
    $hearingDate = "Hearing date selected";
    //This is a terminal request. we start with END
    $response = "END your hearing date is" . $hearingDate;
} else if ($text == "3*2*0") {
    //Business logic for the secong level response if the user selects 3 then 1 but chooses to exit 
    //This is a terminal request. it starts with END
    $response = "END session" . $exit;
} else if ($text == "3*3") {
    $response = "CON Enter the case tracking no \n";
    $response = "0. exit \n";
} else if ($text == "3*3") {
    //This is a second level response where the user selected 3 then 3 and was propmted to input case tracking number
    $judgmentDate = "Judgement date selected";
    //This is a terminal request. we start with END
    $response = "END your judgment date is" . $mentionDate;
} else if ($text == "3*3*0") {
    //Business logic for the secong level response if the user selects 3 then 3 but chooses to exit 
    //This is a terminal request. it starts with END
    $response = "END session" . $exit;
}
//echo the reponse to the API. The response depends on the statement that is fulfilled in each instance
header("Content-type: text/plain");
echo $response;

?>