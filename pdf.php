</html>
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
                  $data_n = $_GET["data_n"];
                  $localitate = $_GET["localitate"];
                  $firma = $_GET["firma"]; 
                  $sediu = $_GET["sediu"];
                  $zile_val = $_GET["zile_val"];
                  $data_inceput = $_GET["data_inceput"];
                  $repr_leg = $_GET["repr_leg"];
                  $nume_r = $_GET["nume_r"];
                  $prenume_r = $_GET["prenume_r"];
                  $functie_r = $_GET["functie_r"];
                  $data_completare = $_GET["data_completare"];
                  $poza = $_GET["imagine"];
                  ?> 
    <div>
        <div class="card-form" id="formular2-container">
            <h1 class="card-header text-center">Adeverinta angajator</h1>
            <div class="card-body"></div>
                <p>Se adevereste prin prezenta ca</p>
                <div class="input-group mb-2">
                    <div class="input-group-prepend">
                        <span class="input-group-text">domnul/doamna</span>
                    </div>
                    <?php  echo $nume; ?>
                </div>
                <div class="input-group mb-2">
                    <div class="input-group-prepend">
                        <span class="input-group-text">nascut/a in data</span>
                    </div>
                    <?php echo $data_n; ?>
                </div>
                <div class="input-group mb-2">
                    <div class="input-group-prepend">
                        <span class="input-group-text">in localitatea</span>
                    </div>
                    <?php echo $localitate; ?>
                </div>
                <div class="input-group mb-2">
                    <div class="input-group-prepend">
                        <span class="input-group-text">este angajat/a al</span>
                    </div>
                    <?php echo $firma; ?>
                </div>
                <div class="input-group mb-2">
                    <div class="input-group-prepend">
                        <span class="input-group-text">cu sediul in</span>
                    </div>
                    <?php echo $sediu; ?>
                </div>
                <div class="form-group">
                    <label for="locatii">De asemenea, se adeverește că persoana sus-numită desfășoară activitatea în cadrul organizației noastre, într-un interval care se suprapune cu cel cuprins între orele 22:00-05:00 la următoarea/următoarele adresă/adrese</label>
                    <?php echo htmlspecialchars($_GET['locatii']); ?>
                </div>
                <p>
                    Prezenta adeverință este valabilă pentru
                </p>
                <div class="input-group mb-2">
                    <div class="input-group-prepend">
                        <span class="input-group-text">o perioada de</span>
                    </div>
                    <?php echo $zile_val; ?>
                    <div class="input-group-append">
                        <span class="input-group-text">zile</span>
                    </div>
                </div>
                <div class="input-group mb-2">
                    <div class="input-group-prepend">
                        <span class="input-group-text ">incepand cu data de</span>
                    </div>
                    <?php echo $data_inceput?>
                </div>
                <p>Cunoscând prevederile articolului 326 din Codul Penal privind falsul în declarații, certific, în calitate de</p>
                <div class="input-group mb-2">
                    <div class="input-group-prepend">
                        <span class="input-group-text">reprezentant legal al</span>
                    </div>
                    <?php echo $repr_leg; ?>
                </div>
            
                <div class="input-group mb-2">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Nume</span>
                    </div>
                    <?php echo $nume_r; ?>
                </div>
                <div class="input-group mb-2">
                    <div class="input-group-prepend">
                        <span class="input-group-text">domnul/doamna</span>
                    </div>
                    <?php echo $prenume_r; ?>
                </div>
                <div class="input-group mb-2">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Functia</span>
                    </div>
                    <?php echo $functie_r;?>
                </div>
                <div class="input-group mb-2">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Data</span>
                    </div>
                    <?php echo $data_completare;?>
                </div>
               <?php echo "<img src='/imagini/" . $poza . "' alt='img'>"; ?>
                <button type="button" onclick="download();" class="btn btn-primary" id="submitButton" >Download</button>

        </div>
    </div>
    <script src="pdfkit.standalone.js"></script>
    <script src="blob-stream.js"></script>
    <script src="formular2S.js"></script>
</body>


 <script type="text/javascript">
               nume=<?php echo json_encode($_GET["nume"]) ?>;

    var data_n = "<?php echo $_GET["data_n"]; ?> "
    var localitate =  "<?php echo $_GET["localitate"]; ?> "
    var firma =  "<?php echo $_GET["firma"]; ?> "
    var sediu = " <?php echo $_GET["sediu"];?>" 
    var zile_val = " <?php echo $_GET["zile_val"];?> "
    var  data_inceput = "<?php echo $_GET["data_inceput"];?> "
    var  repr_leg = " <?php echo $_GET["repr_leg"];?> "
    var  nume_r = "<?php echo $_GET["nume_r"];?> "
    var  prenume_r = "<?php echo $_GET["prenume_r"];?> "
    var  functie_r = "<?php echo $_GET["functie_r"];?> "
    var  data_completare = "<?php echo $_GET["data_completare"];?> "
    var locatii = "<?php echo htmlspecialchars($_GET['locatii']); ?>"
    const doc = new PDFDocument({
        size: 'A4',
 
    });

// pipe the document to a blob
const stream = doc.pipe(blobStream());

// add your content to the document here, as usual

doc
    .fontSize(25)
    .text("             Adeverinta angajator,")
    .fontSize(16)
    .text("     Se adevereste prin prezenta ca domnul/doamna " + nume + " nascut/a in data "+ data_n+" , in localitatea " + localitate + " este angajat/a al " + " cu sediul in ", {
        align: 'left'
    })
    .text("\n")
    .text("     De asemenea, se adevereste ca persoana sus-numita desfasoara activitatea în cadrul organizatiei noastre, intr-un interval care se suprapune cu cel cuprins intre orele 20:00 - 05:00, la urmatoarea/urmatoarele adresa/adrese" + locatii, {
        align: 'left'
    })
    .text("\n")
    .text("     Prezenta adeverinta este valabila pentru o perioada de " + zile_val + "zile incepand cu data de" + data_inceput + "si a fost emisa pentru justificarea deplasarii in intervalul orar 20:00-05:00.")
    .text("\n")
    .text("     Cunoscand prevederile articolului 326 din Codul Penal privind falsul in declaratii, certific, in calitate de reprezentant legal al" + repr_leg + "faptul ca informatiile prezentate mai sus nu sunt false.")
    .text("\n")
    .text("     Data " + data_completare)
    .text("     Reprezentant legal", {
        width: 410,
        align: 'right'
    })
    .text("     Nume " + nume_r, {
        width: 410,
        align: 'right'
    })
    .text("     Prenume " + prenume_r, {
        width: 410,
        align: 'right'
    })
    .text("     Functia " + functie_r, {
        width: 410,
        align: 'right'
    })
    
    doc
  doc.addPage({
    size: 'LEGAL',
    layout: 'landscape'
    })

 doc.addPage()
 .text("Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum." ,{
     align: 'center'
 })
 .text("Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.",{
     align: 'right'
 })
 


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