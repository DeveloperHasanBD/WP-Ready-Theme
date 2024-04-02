<?php


function octgn_common_form_action_mail_sending()
{
    $param = $_POST['param'];

    $admin_mail_to = $_POST['mail_to'];
    $name = $_POST['name'];
    $cognome = $_POST['cognome'];
    $ruolo = $_POST['ruolo'];
    $azienda = $_POST['azienda'];
    $telefono = $_POST['telefono'];
    $email = $_POST['email'];
    $messaggio = $_POST['messaggio'];



    $data_one = '';
    if ($_POST['voglio_ricevere'] == 'value_one') {
        $data_one = 'Yes';
    } else {
        $data_one = 'No';
    }

    $data_two = '';
    if (isset($_POST['voglio_ricevere_two'])) {
        $data_two = 'Yes';
    }


    if ('mail_form_data' == $param) {
        $to_mail = $admin_mail_to;
        $headers = '';
        $subject = "redapple Mail";
        $headers .= "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

        $msg = '';
        $msg .= 'Nome: ' . $name . "<br>";
        $msg .= 'Cognome: ' . $cognome . "<br>";
        $msg .= 'Ruolo: ' . $ruolo . "<br>";
        $msg .= 'Azienda: ' . $azienda . "<br>";
        $msg .= 'Telefono: ' . $telefono . "<br>";
        $msg .= 'E-mail: ' . $email . "<br>";
        $msg .= 'Messaggio: ' . $messaggio . "<br><br>";
        $msg .= 'Newsletter : ' . $data_one . "<br>";
        $msg .= 'Trattamento Dati Personali  : ' . $data_two . "<br>";

        mail($to_mail, $subject, $msg, $headers);
?>
        <div class="alert alert-success">
            <p> Grazie per averci contattato, risponderemo alla vostra richiesta nel minor tempo possibile.</p>
        </div>
        <style>
            #octgn_common_form {
                display: none;
            }
        </style>
    <?php

    }
    die;
}


add_action('wp_ajax_octgn_common_form_action', 'octgn_common_form_action_mail_sending');
add_action('wp_ajax_nopriv_octgn_common_form_action', 'octgn_common_form_action_mail_sending');





add_action('admin_post_nopriv_octgn_profile_processing', 'octgn_profile_processing_form');
add_action('admin_post_octgn_profile_processing', 'octgn_profile_processing_form');

// echo get_theme_file_path() . "/files/";

function octgn_profile_processing_form()
{



    $admin_mail_to = $_POST['mail_to'] ?? '';

    $name = $_POST['type_name'] ?? '';
    $cognome = $_POST['cognome'] ?? '';
    $telefono = $_POST['telefono'] ?? '';
    $email = $_POST['email'];
    // $voglio_ricevere = $_POST['voglio_ricevere'];

    $data_one = '';
    if ($_POST['voglio_ricevere'] == 'value_one') {
        $data_one = 'Yes';
    } else {
        $data_one = 'No';
    }
    $data_two = '';
    if (isset($_POST['voglio_ricevere_two'])) {
        $data_two = 'Yes';
    }

    //   else{
    //       $data_two='No';
    //   }




    if ($admin_mail_to) {
        $to_mail = $admin_mail_to;
        $headers = '';
        $subject = "redapple mail";
        $headers .= "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

        $msg = '';
        $msg .= '**NOTIFICA DI COMPILAZIONE FORM**' . "<br><br>";
        $msg .= 'Nome = ' . $name . "<br>";
        $msg .= 'Cognome = ' . $cognome . "<br>";
        $msg .= 'Telefono = ' . $telefono . "<br>";
        $msg .= 'E-mail = ' . $email . "<br>";
        if (isset($_POST['files'])) {
            $downloaded_file = '';
            $total_files = count($_POST['files']);
            for ($i = 0; $i < $total_files; $i++) {

                $downloaded_file .= $_POST['files'][$i] . '<br>';
            }
        }
        $msg .= 'Downloads = ' . $downloaded_file . "<br><br>";
        $msg .= 'Newsletter : ' . $data_one . "<br>";
        $msg .= 'Trattamento Dati Personali  : ' . $data_two . "<br>";

        mail($to_mail, $subject, $msg, $headers);
    }


    if (isset($_POST['files'])) {
        $error = ""; //error holder
        if (isset($_POST['createzip'])) {
            $post = $_POST;
            $file_folder = get_theme_file_path() . "/files/"; // folder to load files
            if (extension_loaded('zip')) {
                if (isset($post['files']) and count($post['files']) > 0) {
                    // Checking files are selected
                    $zip = new ZipArchive(); // Load zip library 
                    $zip_name = time() . ".zip"; // Zip name
                    if ($zip->open($zip_name, ZipArchive::CREATE) !== TRUE) {
                        // Opening zip file to load files
                        $error .= "* Sorry ZIP creation failed at this time";
                    }
                    foreach ($post['files'] as $file) {
                        $zip->addFile($file_folder . $file, $file); // Adding files into zip
                    }
                    $zip->close();
                    if (file_exists($zip_name)) {
                        // push to download the zip
                        header('Content-type: application/zip');
                        header('Content-Disposition: attachment; filename="' . $zip_name . '"');
                        readfile($zip_name);
                        unlink($zip_name);
                    }
                } else
                    $error .= "* Please select file to zip ";
            } else
                $error .= "* You dont have ZIP extension";
        }
    }



    // $file_url = $_POST["url"];
    // $url_two_url = $_POST["url_two"];
    // if (isset($_POST['submit_btn'])) {
    // 	$file_name = basename($file_url);
    // 	header("Cache-Control: public");
    // 	header("Content-Description: File Transfer");
    // 	header("Content-Disposition: attachment; filename=$file_name");
    // 	header("Content-Type: application/zip");
    // 	header("Content-Transfer-Encoding: binary");
    // 	readfile($file_url);
    // }
}
