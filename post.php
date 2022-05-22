<?php include("variables.php"); ?>
<!DOCTYPE html>
<html>
    <head>
    <title>Quote Em' by Rocket City Window Cleaning by Rocket City Window Cleaning</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css" type="text/css">
    <link rel="manifest" href="/quote/manifest.json">

        <meta name="mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="application-name" content="Quote Em' by Rocket City Window Cleaning">
        <meta name="apple-mobile-web-app-title" content="Quote Em' by Rocket City Window Cleaning">
        <meta name="theme-color" content="#000">
        <meta name="msapplication-navbutton-color" content="#000">
        <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

        <link rel="icon" type="image/png" sizes="512x512" href="apple-touch-icon.png">
        <link rel="apple-touch-icon" type="image/png" sizes="512x512" href="apple-touch-icon.png">
    </head>

    <body>
        <p>A NEW QUOTE HAS BEEN GENERATED
        <br><br />
        TOTAL CUSTOMER-FACING PRICE: <br />
        <h1>
            <span class="dollarsine">$</span><?php echo(round($totalGross,2)); ?>
        </h1><br /><br />
        ESTIMATED BILLABLE TIME: <br /><br />......................<?php echo($totalEstimatedHours); ?>h<?php echo($totalEstimatedMinutes); ?>m<br />
        <br /><br />
        <section id="breakdown">
            TOTAL WINDOWS:...... $<?php echo(round($totalWindowCleaning,2)); ?><br />
            &nbsp;&nbsp; ├─ INTERIOR: $<?php echo(round($totalInterior,0)); ?><br />
            &nbsp;&nbsp; └─ EXTERIOR: $<?php echo(round($totalExterior,0)); ?><br />
            TOTAL GUTTERS:...... $<?php echo(round($totalGutter,2)); ?><br />
            TOTAL SCREENS:...... $<?php echo(round($totalScreens,2)); ?><br />
            TOTAL INCIDENTAL:... $<?php echo(round($totalIncidentals,2)); ?><br />
            TOTAL ADDITIONAL:... $<?php echo(round($totalAdditionalCosts,2)); ?><br />
            TOTAL TRANSPORT:.... $<?php echo(round($totalTransportation,2)); ?><br />
            TOTAL TAXES:........ $<?php echo(round($totalTaxes,2)); ?><blink><!-- Inserted with CSS so it isn't selectable --></blink><br />

            <button onclick="location.href='javascript:window.history.back()'">&larr; Generate another quote</button>
            <!-- <a href="<?php echo("$juicedLink"); ?>">MySQL</a> --> <!-- This isn't used in the github version.
            
        </section>
    </p>
    </body>
<!-- 

     .... NO! ...                  ... MNO! ...
   ..... MNO!! ...................... MNNOO! ...
 ..... MMNO! ......................... MNNOO!! .
.... MNOONNOO!   MMMMMMMMMMPPPOII!   MNNO!!!! .
 ... !O! NNO! MMMMMMMMMMMMMPPPOOOII!! NO! ....
    ...... ! MMMMMMMMMMMMMPPPPOOOOIII! ! ...
   ........ MMMMMMMMMMMMPPPPPOOOOOOII!! .....
   ........ MMMMMOOOOOOPPPPPPPPOOOOMII! ...  
    ....... MMMMM..    OPPMMP    .,OMI! ....
     ...... MMMM::   o.,OPMP,.o   ::I!! ...
         .... NNM:::.,,OOPM!P,.::::!! ....
          .. MMNNNNNOOOOPMO!!IIPPO!!O! .....
         ... MMMMMNNNNOO:!!:!!IPPPPOO! ....
           .. MMMMMNNOOMMNNIIIPPPOO!! ......
          ...... MMMONNMMNNNIIIOO!..........
       ....... MN MOMMMNNNIIIIIO! OO ..........
    ......... MNO! IiiiiiiiiiiiI OOOO ...........
  ...... NNN.MNO! . O!!!!!!!!!O . OONO NO! ........
   .... MNNNNNO! ...OOOOOOOOOOO .  MMNNON!........
   ...... MNNNNO! .. PPPPPPPPP .. MMNON!........
      ...... OO! ................. ON! .......
         ................................

-->
</html>
