<?php
$distanceMiles = $_POST['distanceMiles'] ?: 0;                  // output values from form
$windowsGround = $_POST['windowsGround'] ?: 0;
$windowsStep =  $_POST['windowsStep'] ?: 0;
$windowsLadder = $_POST['windowsLadder'] ?: 0;
$windowsTransom = $_POST['windowsTransom'] ?: 0;
$windowsStorm = $_POST['windowsStorm'] ?: 0;
// $cutUpPanels = $_POST['cutUpPanels'] ?: 0;
// $cutUpsPerPanel = $_POST['cutUpsPerPanel'] ?: 0;
$guttersWalkable = $_POST['guttersWalkable'] ?: 0;
$guttersSteep = $_POST['guttersSteep'] ?: 0;
$screenCovering = $_POST['screenCovering'] ?: 0;
$rentEquipment = $_POST['rentEquipment'] ?: 0;
$oneTimeCharge = $_POST['oneTimeCharge'] ?: 0;
$modifierValue = $_POST['modifierValue'] ?: "NORMAL";

$PUBLIC_cutUps = $_POST['PUBLIC_cutUps'] ?: 0;                  // output additional values from customer-facing form
$PUBLIC_gridsPerPanel = $_POST['PUBLIC_gridsPerPanel'] ?: 0;    // all publicQuote-only variables are marked with PUBLIC_
$PUBLIC_stormWindows = $_POST['PUBLIC_stormWindows'] ?: 0;
$PUBLIC_inorout = $_POST['PUBLIC_inorout'] ?: 0;
$PUBLIC_hasScreens = $_POST['PUBLIC_hasScreens'] ?: 0;
$PUBLIC_referral = $_POST['PUBLIC_referral'] ?: "";

// this link isn't worth anything in the public version of the quote, so we'll just hide it
// $juicedLink = "mysql.php?distanceMiles=$distanceMiles&windowsGround=$windowsGround&windowsStep=$windowsStep&windowsLadder=$windowsLadder&windowsTransom=$windowsTransom&windowsStorm=$windowsStorm&guttersWalkable=$guttersWalkable&guttersSteep=$guttersSteep&screenCovering=$screenCovering&rentEquipment=$rentEquipment&oneTimeCharge=$oneTimeCharge&modifierValue=$modifierValue&PUBLIC_cutUps=$PUBLIC_cutUps&PUBLIC_gridsPerPanel=$PUBLIC_gridsPerPanel&PUBLIC_stormWindows=$PUBLIC_stormWindows&PUBLIC_inorout=$PUBLIC_inorout&PUBLIC_hasScreens=$PUBLIC_hasScreens&PUBLIC_referral=$PUBLIC_referral";


//^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^//
//            THESE FIELDS ARE PULLED                   //
//            FROM THE FORM. THESE DON'T                //
//            NEED TO BE CHANGED.                       //
//______________________________________________________//

function median() {
        $jobsLast12Months = array (
                     0 => [BLANK],   // Jan
                     1 => [BLANK],   // Feb
                //   2 => [BLANK],   // Mar
                //   3 => [BLANK],   // Apr
                //   4 => [BLANK],   // May
                //   5 => [BLANK],   // Jun
                     6 => [BLANK],   // Jul // rollover month
                     7 => [BLANK],  // Aug
                     8 => [BLANK],   // Sep
                     9 => [BLANK],   // Oct
                     10 => [BLANK],  // Nov
                     11 => [BLANK],  // Dec
                );
        sort($jobsLast12Months);
        $count = sizeof($jobsLast12Months);   // cache the count
        $index = floor($count/2);             // cache the index
        if (!$count) {
        echo "THE FORMULA ISN'T GOING TO WORK BECAUSE THERE ARE NO MONTHS IN THE ARRAY. FIX THIS!";
        } elseif ($count & 1) {               // count is odd
        return $jobsLast12Months[$index];
        } else {                              // count is even
        return ($jobsLast12Months[$index-1] + $jobsLast12Months[$index]) / 2;
        }
}

//^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^//
//            THIS IS A FIELD YOU GOTTA EDIT            //
//                                                      //
//       Add months into the bracketed area each        //
//       month. It doesn't ~technically~ need 12        //
//       months but its a good reference frame.         //
//       It can be 2 months or 12 months or 31 months   //
//       The bracketed area finds the MEDIAN value      //
//______________________________________________________//


////////////////
              //
////////////////

$jobsPerMonth = median();

// Controlled Numbers
$hourlyRate = [BLANK];
$hourlyRatePaid = [BLANK]; // how much I want to collect for myself per hour
// INSURANCE
$yearlyAutoPremium = [BLANK];
$yearlyBusinessPremium = [BLANK]; 
$yearlyLicensing = [BLANK];


// Pace King
$rateGround = $hourlyRate / [BLANK]; // how many of each type of windows can you do per hour e.g. '22'
$rateStep = $hourlyRate / [BLANK];
$rateTransom = $hourlyRate / [BLANK];
$rateLadder = $hourlyRate / [BLANK];
$rateCutUps = $hourlyRate / [BLANK];
$rateScreen = [BLANK];  // how much $ added per screen e.x. '3.00'
$rateStorms = [BLANK];   // per storm (straight rate) e.x. '50'
$rateWalkable = [BLANK];  // per linear foot of gutter
//$rateSteep = [BLANK];    // ^^           ^^

// Ancillary Costs
$carMPG = [BLANK];
$fuelPrice = [BLANK]; // per gallon e.x. shiiiiiiiiii I use '6.00' these days. Thanks Boe Bidun
$billsInsurance = (($yearlyAutoPremium / 12) / $jobsPerMonth) + (($yearlyBusinessPremium / 12) / $jobsPerMonth);
$billsLicensing = $Licensing = (($yearlyLicensing / 12) / $jobsPerMonth);
$carWear = [BLANK];        // costs tacked onto each quote for wear and tear e.x. '25'
$suppliesGeneral = [BLANK]; // supplies like rubber and replacement tools


// Multiplers
$modifierMild = 0.8;      // this is your multiplier for stuff like glass thats been cleaned recently like routework etc.
$modifierNormal = 1;      // straight-through -- this is here to show progression. not used in script.
$modifierThrashed = 1.17; // you know what this window looks like.. blading, weird hills, etc.

//////////////////////
// Calculation Z O N E
//////////////////////

// Sum
/////////////////////
//~~~/////////////////// 
$totalInterior = (($windowsGround+$windowsStep+$windowsTransom+$windowsLadder)*$rateGround);
$totalExterior = (($windowsGround*$rateGround)+($windowsStep*$rateStep)+($windowsTransom*$rateTransom)+($windowsLadder*$rateLadder));
$totalStorms = ($windowsStorm*$rateStorms); // storms are hardcoded to cost e.x. 50/per
$totalCutUps = (($cutUpPanels*$cutUpsPerPanel)*$rateCutUps);
$totalWindowCleaning = ($totalInterior + $totalExterior + $totalStorms + $totalCutUps);

// I have a private version of this file that I use for my own quotes.
<?php include("public.results1.php"); ?>
//

$totalGutter = (($guttersWalkable*$rateWalkable)+($guttersSteep*$rateSteep));
$totalScreens = ($screenCovering*$rateScreen);

// I have a private version of this file that I use for my own quotes.
// There is probably a more graceful way to keep this out of GitHub but I don't know how.
<?php include("public.results2.php"); ?>
//

$totalIncidentals = ($rentEquipment+$oneTimeCharge);
$totalAdditionalCosts = ($billsInsurance+$billsLicensing+$suppliesGeneral);
$totalTransportation = ($carWear+((($distanceMiles/$carMPG)*$fuelPrice)*2));
$totalTaxable = ($totalWindowCleaning+$totalScreens+$totalGutter+$totalAdditionalCosts+$totalIncidentals+$totalTransportation);
                    if ($modifierValue === "MILD") {$totalTaxable = ($totalTaxable * $modifierMild);}                ///
                       elseif ($modifierValue === "THRASHED") {$totalTaxable = ($totalTaxable * $modifierThrashed);} /// difficulty modifier
                         else {$totalTaxable = $totalTaxable;}                                                       ///
$totalTaxes = ($totalTaxable*0.25);  // guessing 25% tax overhead
$totalGross = ($totalTaxable+$totalTaxes);
$totalNet = ($totalGross-$totalTaxes-$totalAdditionalCosts-$totalTransportation);

// I have a private version of this file that I use for my own quotes.
<?php include("public.results3.php"); ?>
//

$totalEstimatedHours = floor($totalTaxable / $hourlyRate);
$totalEstimatedMinutes = str_pad(floor((($totalTaxable / $hourlyRate) - floor($totalTaxable / $hourlyRate)) * 60), 2, '0', STR_PAD_LEFT);
$totalPersonalIncome = ($totalEstimatedHours*$hourlyRatePaid);

/////////////////////
//~~~/////////////////// 


//////////////////////
//EOF -- PHP SCRIPT
//BEGIN VISIBLE PAGE
//////////////////////
?>


<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
?>