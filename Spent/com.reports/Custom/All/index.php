<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reporte Personalizado</title>
    <link rel="shortcut icon" href="../../../Assets/com.img/com.icon.png" type="image/x-icon">
    <link rel="stylesheet" href="../../../Vendor/com.css/com.config.css">
    <link rel="stylesheet" href="../../../Vendor/com.css/com.reports.print.css">
    <link rel="stylesheet" href="../../../Fonts/IndexFontsCaviarDreams.css">
    <link rel="stylesheet" href="../../../Fonts/IndexFontsRoboto.css">
</head>
<body class="ReportsBody Scroll">

<header>

<div class="HeaderDecoration"></div>

    <div class="QrCode"></div>


<div class="LeftZoneHeader">

    <t>Reporte Personalizado de Gastos</t>
    <p>Filtrar Fecha</p>

    <div class="ReportDetails">

        <t2>Detalles del reporte</t2>
        <p2> <b>Realizado el:</b> 31 de Mayo de 2024</p2>
        <p2> <b>ID de reporte:</b> ASC-2024-041001MR</p2>
        <p2> <b>Generado por:</b> Alejandro Salinas</p2>
    </div>

</div>

</header>


    <div class="ShowReportsPerMonth">

        <t class="PerMonthsLogTitle" style="width: 10px;">Registros del Reporte Personalizado</t>
        <div class="TitleBorder"></div>

        <div class="Table">

            <div class="Identifers">

                
                <columns>NO.</columns>
                <columns>Fecha</columns>
                <columns style="137.4px !important">No. de Factura</columns>
                <columns style="width:164.36px">Nombre de Proveedor</columns>
                <columns>Cnt.</columns>
                <columns>Cuenta Cont.</columns>
                <columns>Subtotal</columns>
                <columns>Exento</columns>
                <columns>ISV 15%</columns>
                <columns>ISV 18%</columns>
                <columns>Otros</columns>
                <columns>Total de Gasto</columns>
                <columns>Pago</columns>
                <columns>Fin</columns>
            </div>

            <div class="Logs">
                
                <?php

                    $Number = 0;

                    require '../../../config/com.server.config.php';
                    $Connection -> set_charset("utf8");

                    if(isset($_GET["Provider"]) && isset($_GET["From"]) && isset($_GET["Until"]) && isset($_GET["User"])){

                        $Provider = $_GET["Provider"];
                        $From = $_GET["From"];
                        $Until = $_GET["Until"];
                        $User = $_GET["User"];

                    }else{

                        ////echo "<script> window.location.href = '../' </script>";

                    }

                    $DoQuery = "SELECT * FROM logs WHERE Provider = '$Provider' AND Date BETWEEN '$From' AND '$Until' AND SpendedBy = '$User';";
                    $QueryResults = $Connection -> query($DoQuery);

                    if($QueryResults -> num_rows > 0){

                        while($Row = $QueryResults -> fetch_assoc()){

                            $Provider = $Row["Provider"];
                            $Date = $Row["Date"];
                            $Amount = $Row["Amount"];
                            $PayType = $Row["PayType"];
                            $BillNumber = $Row["BillNumber"];
                            $CountableCount = $Row["CountableCount"];
                            $BuyType = $Row["BuyType"];
                            $Subtotal = $Row["Subtotal"];
                            $Exempt = $Row["Exempt"];
                            $OtherISV = $Row["OtherISV"];
                            $ISV15 = $Row["ISV15"];
                            $ISV18 = $Row["ISV18"];
                            $Total = $Row["Total"];
                            $Number++;


                            //FormattedValues 

                            if($PayType == "Efectivo"){

                                $PayType = "Efc";

                            }else if($PayType == "Transferencia"){

                                $PayType = "Trans.";

                            }else if($PayType == "Tarjeta de Crédito"){

                                $PayType = "T/C";

                            }else if($PayType == "Pago en línea"){

                                $PayType = "BDP";

                            }else if($PayType == "Botón de Pago"){

                                $PayType = "BDP";

                            }
                            

                            if($BuyType == "Personal"){

                                $BuyType = "Prs";

                            }else if($BuyType == "Oficina"){

                                $BuyType = "Ofc";

                            }

                            $AmountInt = floatval($Amount);

                            if($Amount < 10){

                                $Amount = '0'. $Amount;

                            }

                            if ($OtherISV === '') {
                                $OtherISV = "L 0.00";
                            }
                            

                            echo "

                                <div class='ThisRes'>

                                <divs><n>$Number</n></divs>
                                <divs><p class='MountDate'>$Date</p></divs>
                                <divs><p>$BillNumber</p></divs>
                                <divs><p>$Provider</p></divs>           
                                <divs><p>$Amount</p></divs>
                                <divs><p>$CountableCount</p></divs>
                                <divs><p class='Subtotals'>$Subtotal</p></divs>
                                <divs><p class='Exempts'>$Exempt</p></divs>
                                <divs><p class='ISV15'>$ISV15</p></divs>
                                <divs><p class='ISV18'>$ISV18</p></divs>
                                <divs><p class='Others'>$OtherISV</p></divs>
                                <divs><p class='Totals'>$Total</p></divs>
                                <divs><p>$PayType</p></divs>
                                <divs><p>$BuyType</p></divs>
                                
                             
                                
            
                            </div>
                            
                            ";

                        }

                    }else{
                        
                       // echo "<script> try {window.close(); localStorage.setItem('NoLogKey', 'true') } catch (error) {window.location.href = '../';} </script>";

                       echo "<p style='    width:100%;height:40px;position:relative;background-color: transparent;display:flex;justify-content:center;align-items:center;text-align:center;font-family:caviarDreamsBold;
                       '>No hay Resultados</p>";

                    }

                ?>
                   
            </div>

        </div>

    </div>

    <div class="ShowAllResults">

    
     <t class="PerMonthsLogTitle" style="width: 10000px;">Totalizaciones de Registros del Reporte Personalizado</t>
        <div class="TitleBorder2"></div>

        <div class="Totalizate">

            <div class="Identifers">

                    <columns>Exentos</columns>
                    <columns>ISV 15%</columns>
                    <columns>ISV 18%</columns>
                    <columns>Otros Impuestos</columns>
                    <columns>Total de Registros</columns>

            </div>

        <div class="Scapes">

        <!--Exentos-->

        <?php

            require '../../../config/com.server.config.php';

            if(isset($_GET["Provider"]) && isset($_GET["From"]) && isset($_GET["Until"]) && isset($_GET["User"])){

                $Provider = $_GET["Provider"];
                $From = $_GET["From"];
                $Until = $_GET["Until"];
                $User = $_GET["User"];

            }else{

                ////echo "<script> window.location.href = '../' </script>";

            }


            $DoQuery = "SELECT Exempt FROM logs WHERE Provider = '$Provider' AND Date BETWEEN '$From' AND '$Until' AND SpendedBy = '$User';";

            $QueryResults = $Connection->query($DoQuery);

            $ExemptAdd = 0;

            if ($QueryResults->num_rows > 0) {
                
                while($row = $QueryResults->fetch_assoc()) {
                
                    $ExemptAdd += floatval($row["Exempt"]);
                }
                
                echo "<res class='ScapeExempt'>$ExemptAdd</res>";

            } else {

                echo "<res class='ScapeExempt'>$ExemptAdd</res>";

            }

            $Connection->close();

            ?>

            <!--Exentos-->


            <!--ISV 15-->

            <?php

                require '../../../config/com.server.config.php';

                if(isset($_GET["Provider"]) && isset($_GET["From"]) && isset($_GET["Until"]) && isset($_GET["User"])){

                    $Provider = $_GET["Provider"];
                    $From = $_GET["From"];
                    $Until = $_GET["Until"];
                    $User = $_GET["User"];

                }else{

                    ////echo "<script> window.location.href = '../' </script>";

                }

                $DoQuery = "SELECT ISV15 FROM logs WHERE Provider = '$Provider' AND Date BETWEEN '$From' AND '$Until' AND SpendedBy = '$User';";

                $QueryResults = $Connection->query($DoQuery);

                $ISV15Add = 0;

                if ($QueryResults->num_rows > 0) {
                    
                    while($row = $QueryResults->fetch_assoc()) {
                    
                        $ISV15Add += floatval($row["ISV15"]);
                    }
                    
                    echo "<res class='ScapeISV15'>$ISV15Add</res>";

                } else {

                    echo "<res class='ScapeISV15'>$ISV15Add</res>";

                }

                $Connection->close();

                ?>

            <!--ISV15-->


            <!--ISV 18-->

                <?php

                    require '../../../config/com.server.config.php';

                    if(isset($_GET["Provider"]) && isset($_GET["From"]) && isset($_GET["Until"]) && isset($_GET["User"])){

                        $Provider = $_GET["Provider"];
                        $From = $_GET["From"];
                        $Until = $_GET["Until"];
                        $User = $_GET["User"];

                    }else{

                        ////echo "<script> window.location.href = '../' </script>";

                    }


                    $DoQuery = "SELECT ISV18 FROM logs WHERE Provider = '$Provider' AND Date BETWEEN '$From' AND '$Until' AND SpendedBy = '$User';";

                    $QueryResults = $Connection->query($DoQuery);

                    $ISV18Add = 0;

                    if ($QueryResults->num_rows > 0) {
                        
                        while($row = $QueryResults->fetch_assoc()) {
                        
                            $ISV18Add += floatval($row["ISV18"]);
                        }
                        
                        echo "<res class='ScapeISV18'>$ISV18Add</res>";

                    } else {

                        echo "<res class='ScapeISV18'>$ISV18Add</res>";

                    }

                    $Connection->close();

                    ?>

            <!--ISV18-->

            <!--OtherISV-->

            <?php

                require '../../../config/com.server.config.php';

                if(isset($_GET["Provider"]) && isset($_GET["From"]) && isset($_GET["Until"]) && isset($_GET["User"])){

                    $Provider = $_GET["Provider"];
                    $From = $_GET["From"];
                    $Until = $_GET["Until"];
                    $User = $_GET["User"];

                }else{

                    ////echo "<script> window.location.href = '../' </script>";

                }

                $DoQuery = "SELECT OtherISV FROM logs WHERE Provider = '$Provider' AND Date BETWEEN '$From' AND '$Until' AND SpendedBy = '$User';";

                $QueryResults = $Connection->query($DoQuery);

                $OtherISVAdd = 0;

                if ($QueryResults->num_rows > 0) {
                    
                    while($row = $QueryResults->fetch_assoc()) {
                    
                        $OtherISVAdd += floatval($row["OtherISV"]);
                    }
                    
                    echo "<res class='ScapeOtherISV'>$OtherISVAdd</res>";

                } else {

                    echo "<res class='ScapeOtherISV'>0</res>";

                }

                $Connection->close();

        ?>

        <!--OtherISV-->

            <?php

            require '../../../config/com.server.config.php';

            if(isset($_GET["Provider"]) && isset($_GET["From"]) && isset($_GET["Until"]) && isset($_GET["User"])){

                $Provider = $_GET["Provider"];
                $From = $_GET["From"];
                $Until = $_GET["Until"];
                $User = $_GET["User"];

            }else{

                ////echo "<script> window.location.href = '../' </script>";

            }

            $DoQuery = "SELECT Total FROM logs WHERE Provider = '$Provider' AND Date BETWEEN '$From' AND '$Until' AND SpendedBy = '$User';";

            $QueryResults = $Connection->query($DoQuery);

            $TotalAdd = 0;

            if ($QueryResults->num_rows > 0) {
                
                while($row = $QueryResults->fetch_assoc()) {
                
                    $TotalAdd += floatval($row["Total"]);
                }
                
                echo "<res class='ScapeTotal'>$TotalAdd</res>";

            } else {

                echo "<res class='ScapeTotal'>$TotalAdd</res>";

            }

            $Connection->close();
            ?>
        </div>

        </div>
                    
    </div>

    </div>
    
    <footer style="display: none;">

        <div class="FooterDecoration"></div>    

    </footer>

</body>


</html>

<script>
        const files = [
            "../../../Vendor/com.js/com.versions.js",
            "../../../Vendor/com.js/com.reports.js",
            "../../../Vendor/com.js/com.format.config.js",
            "../../../Vendor/com.js/com.totalizate.js"


        ];

        files.forEach(file => {
            const script = document.createElement("script");
            script.src = `${file}?v=${Math.random() * Math.random() * Math.random()}`;
            document.body.appendChild(script);
        });
    </script>
