<?php


function validate_file($file, $accepted_types)
{

    if ($file['error'] !== UPLOAD_ERR_OK) {
        return [
                'isValid' => false,
                'message' => 'Erreur d\'upload : ' . $file['error']
        ];
    }
    if ($file['size'] > 5000000) { // 5 Mo maximum
        return [
                'isValid' => false,
                'message' => 'Fichier trop volumineux.'
        ];
    }

    $finfo = finfo_open(FILEINFO_MIME_TYPE);
    $mimeType = finfo_file($finfo, $file['tmp_name']);
    finfo_close($finfo);
    if (!in_array($mimeType, $accepted_types)) {
        return [
                'isValid' => false,
                'message' => 'Type de fichier ' . $mimeType . ' non autorisé.'
        ];
    }


    return [
            'isValid' => true,
            'message' => 'Fichier ' . $mimeType . ' valide.'];
}

function upload_file($file, $path)
{
    $extension = pathinfo($file['name'], PATHINFO_EXTENSION);
    $nomFinal = uniqid('upload_', true) . '.' . strtolower($extension);
    $cheminFinal = $path . $nomFinal;
    if (move_uploaded_file($file['tmp_name'], $cheminFinal)) {
        return $cheminFinal;
    } else {
        return null;
    }

}

$uploadDir = 'uploads/';
$docsAutorises = ['application/pdf'];
$imagesAutorises = ['image/jpeg', 'image/png'];
$error = '';


$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$email = $_POST['email'];
$cv = $_FILES['cv'];
$photo = $_FILES['photo'];
$cv_path = null;
$photo_path = null;

if (empty($nom)) {
    $error = 'Merci de saisir un nom';
}

if (empty($prenom)) {
    $error = 'Merci de saisir un prenom';
}

if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $error = 'Merci de saisir un email';
}

$cv_check = validate_file($cv, $docsAutorises);
$photo_check = validate_file($photo, $imagesAutorises);

if ($cv_check['isValid']) {
    $cv_path = upload_file($cv, $uploadDir);
} else {
    $error = $cv_check['message'];
}
if ($photo_check['isValid']) {
    $photo_path = upload_file($photo, $uploadDir);
} else {
    $error = $photo_check['message'];
}

?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body>

<div class="card text-center">
    <div class="card-header">
        Stage
    </div>
    <div class="card-body">

        <?php
        if (!empty($error)) {
            ?>
            <div class="mb-3 row">
                <div class="alert alert-danger" role="alert">
                    <?= $error ?>
                </div>
            </div>

            <?php
        } else {

            ?>

            <div class="mb-3 row">
                <div class="col-4">
                    <label for="nom" class="col-sm-2 col-form-label">Nom : <?= $nom ?></label>

                </div>

                <div class="col-4">
                    <label for="prenom" class="col-sm-2 col-form-label">Prenom : <?= $prenom ?></label>

                </div>
                <div class="col-4">
                    <label for="email" class="col-sm-2 col-form-label">Email : <?= $email ?></label>

                </div>


            </div>

            <div class="mb-3 row">
                <div class="col-6">
                    <label for="cv" class="col-sm-2 col-form-label">CV : </label>
                    <a href="<?= $cv_path ?>">ICI</a>

                </div>

                <div class="col-6">
                    <label for="photo" class="col-sm-2 col-form-label">Photo</label>
                    <div class="col-sm-10">
                        <img src="<?= $photo_path?>">
                    </div>
                </div>
            </div>

            <?php

        }
        ?>

    </div>

</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
        crossorigin="anonymous"></script>
</body>
</html>



