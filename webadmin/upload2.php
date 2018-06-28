<?php

session_start();

if(!(array_key_exists('Logged', $_SESSION) and $_SESSION['Logged']==true)){
    echo "<meta http-equiv=\"refresh\" content=\"0; url=login.php\" />";
    exit();
}

if(!empty($_POST['URL_IMAGEM']) and !empty($_POST['DATA_INICIO']) and $_POST['DATA_FIM']){
        $URL = $_POST['URL_IMAGEM'];
        $DATA_INICIO = $_POST['DATA_INICIO'];
        $DATA_FIM = $_POST['DATA_FIM'];
        insertAdvertising($URL, $DATA_INICIO, $DATA_FIM);
}
else{
$target_dir = "../PapaFilasRU/totem/Imagens/";
$target_filename = "anuncio";
$target_file_number = getFileNumber();
$target_file_extension = strtolower(pathinfo($_FILES["fileToUpload"]["name"], PATHINFO_EXTENSION));
if ($target_file_extension!='jpg'){
    echo "Deu ruim, extensão errada";
     // echo "<meta http-equiv=\"refresh\" content=\"0; url=upload_error.php\" />";
    exit();
}
$target_filename = $target_filename.$target_file_number;
$target_file = $target_dir . $target_filename .'.jpg';
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check === false) {
        echo "Deu ruim, não é imagem";
        // echo "<meta http-equiv=\"refresh\" content=\"0; url=upload_error.php\" />";
        exit();
    }
}

if(move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)){
    $full_target_filename = "http://dandico.com.br/PapaFilasRU/totem/".$target_filename.'.jpg';
    insertAdvertising($full_target_filename, $_POST['DATA_INICIO'], $_POST['DATA_FIM']);
    echo "Deu bom!";
     // echo "<meta http-equiv=\"refresh\" content=\"0; url=upload_successful.php\" />";
    exit();
}
else{
    echo "Deu ruim, impossível upar";
     // echo "<meta http-equiv=\"refresh\" content=\"0; url=upload_error.php\" />";
    exit();
}
}


function getFileNumber(){
    $target_dir = "../PapaFilasRU/totem/Imagens/anuncio";
    for ($i=1; $i<10001; $i++){
        $target_file = $target_dir.$i.'.jpg';
        if (!file_exists($target_file)){
        return $i;
        }
    }
    echo "Deu ruim, sem número disponível";
    // echo "<meta http-equiv=\"refresh\" content=\"0; url=upload_error.php\" />";
    exit();
}

function insertAdvertising($adress, $date_begin, $date_end){
    $advertisingParameters = array('URL_INICIO' => $adress,
                                    'DATA_INICIO' => $date_begin,
                                    'DATA_FIM' => $date_end);
    print_r($advertisingParameters);
    $encodedAdvertisingParameters = json_encode($advertisingParameters);

    $requestAds =  stream_context_create(array(
            'http' => array(
            'method' => 'POST',
            'header' => "Content-Type: application/json; charset=utf-8 \r\n",
            'content' => $encodedAdvertisingParameters
        )
    ));

    $request = file_get_contents("http://35.199.101.182/api/propaganda", false, $requestAds);
}
?>
