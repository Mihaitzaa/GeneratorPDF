<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="style.css">
    <title>PDF generator </title>
</head>


<body>
<?php $nume = $_GET["nume"]; 
            $prenume = $_GET["prenume"];
            $data_n = $_GET["data_n"];
            $adresa_l = $_GET["adresa_l"];
            $adresa_d = $_GET["adresa_d"];
            $motiv_d= $_GET["motiv_d"];
            $data_c = $_GET["data_c"];
                  ?> 
    <div>
<div class="card-body">
            <h1 class="text-center">DECLARATIE PE PROPRIE RASPUNDERE</h1>
           

                <div class="form-group"><label for="nume"> <strong>Nume</strong> </label>,<label for="prenume"><strong>prenume</strong></label>: <?php echo $nume ?> <?php echo $prenume ?> <br></div>

                <div class="form-group"> <label for="data_n"><strong>Data nasterii: </strong></label> <?php echo $data_n ?> <br> </div>
                <div class="form-group"> <label for="adresa_l"><strong>Adresa locuintei: </strong></label>
                <?php echo $adresa_l ?>
                    <br></div>
                <div class="form-group"> <label for="adresa_d"><strong>Locul/locurile deplasarii:</strong></label>
                <?php echo $adresa_d ?>
                
                    <br></div>
                <div class="form-group"> <label for="motiv_d"><strong>Motivul deplasarii:</strong></label> <br></div>
                
<?php
switch ($motiv_d) {
        case 1:
            $m= "1.interes profesional, inclusiv intre locuinta/gospodarie si locul/locurile de desfasurare a activitatii profesionale si inapoi";
            echo $m;
            break;
        case 2:
          $m = "2.asigurarea de bunuri care acopera necesitatile de baza ale persoanelor si animalelor decompanie/domestic";
          echo $m;
         break;
         case 3:
             $m ="3.asistenta medicala care nu poate fi amanata si nici realizata de la distanta";
             echo $m;
                    break;
                    case 4:
                        $m = "4.motive justificate, precum ingrijirea/ insotirea unui minor/copilului, asistenta persoanelor varstnice,  bolnave sau cu dizabilitati ori deces al unui membru de familie";
                        echo $m;
                        break;
                        case 5:
                            $m = "5.activitate fizica individuala (cu excluderea oricaror activitati sportive de echipa/ colective)sau pentru nevoile animalelor de companie/domestice, in apropierea locuintei";
                            echo $m;
                            break;
                            case 6:
                                $m = "6.realizarea de activitati agricole";
                                echo $m;
                                break;
                                case 7:
                                    $m = "7.donarea de sange, la centrele de transfuzie sanguina";
                                    echo $m;
                                    break;
                                    case 8:
                                        $m = "8.scopuri umanitare sau de voluntariat";
                                        echo $m;
                                        break;
                                        case 9:
                                            $m = "9.comercializarea de produse agroalimentare (în cazul producatorilor agricoli)";
                                            echo $m;
                                            break;
        case 10:
            $m = "10.asigurarea de bunuri necesare desfășurării activității profesionale";
            echo $m;
            break;
                    }
?>

                <div class="row">
                    <div class="col">
                        <label for="data_c"><strong>Data declaratiei </strong></label> <?php echo $data_c ?>
                    </div>

                </div>
                <div>
                <button type="button" onclick="download();" class="btn btn-primary" id="submitButton" >Download</button>
                
        </div>
        <script src="pdfkit.standalone.js"></script>
    <script src="blob-stream.js"></script>
    </div>
 <img> 

</body>

<script type="text/javascript">
            
    var nume = "<?php echo $_GET["nume"]; ?> "
    var prenume =  "<?php echo $_GET["prenume"]; ?> "
    var data_n =  "<?php echo $_GET["data_n"]; ?> "
    var adresa_l = " <?php echo $_GET["adresa_l"];?>" 
    var adresa_d = " <?php echo $_GET["adresa_d"];?> "
    var  motiv = "<?php echo $m;?> "
    var  data_c = " <?php echo $_GET["data_c"];?> "
    const doc = new PDFDocument({
        size: 'A4',
        layout: 'landscape'
    });

// pipe the document to a blob
const stream = doc.pipe(blobStream());

// add your content to the document here, as usual

doc
    .fontSize(25)
    .text("             Declaratie pe proprie raspundere")
    .fontSize(16)
    .text("Subsemnatul/a " + nume +" "+prenume + " nascut la data " + data_n + " domiciliat la " +adresa_l+ " declar pe proprie raspundere ca ma deplasez in afara locuintei catre " +adresa_d + "cu motivul:")
    .fillColor('green')
    .text(motiv, {
        align: 'center'
    })
    .fillColor('red')
    .text("Data declaratiei: " +data_c, {
        align: 'right'
    })
   
 doc.addPage(
     {
         layout: 'portrait'
     }
 )
    .text("Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam in suscipit purus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Vivamus nec hendrerit felis. Morbi aliquam facilisis risus eu lacinia. Sed eu leo in turpis fringilla hendrerit. Ut nec accumsan nisl. Suspendisse rhoncus nisl posuere tortor tempus et dapibus elit porta. Cras leo neque, elementum a rhoncus ut, vestibulum non nibh. Phasellus pretium justo turpis. Etiam vulputate, odio vitae tincidunt ultricies, eros odio dapibus nisi, ut tincidunt lacus arcu eu elit. Aenean velit erat, vehicula eget lacinia ut, dignissim non tellus. Aliquam nec lacus mi, sed vestibulum nunc. Suspendisse potenti. Curabitur vitae sem turpis. Vestibulum sed neque eget dolor dapibus porttitor at sit amet sem. Fusce a turpis lorem. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae;", {
  columns: 3,
  columnGap: 15,
  height: 100,
  width: 465,
  align: 'justify'
});
 


    // get a blob when you're done
doc.end();

const a = document.createElement("a");
document.body.appendChild(a);
a.style = "display: none";

let blob;

function download() {

    if (!blob) return;
    var url = window.URL.createObjectURL(blob);
    a.href = url;
    a.download = 'test.pdf';
    a.click();
    window.URL.revokeObjectURL(url);

}

stream.on("finish", function() {
    // get a blob you can do whatever you like with
    blob = stream.toBlob("application/pdf");

});
</script>


</html>