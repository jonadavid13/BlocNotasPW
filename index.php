<?php

function guardarArchivo($nombre, $contenido)
{

}

$nombreInicial = "*sintitulo.txt";
$nombreArchivo = $nombreInicial;
$text = "Empezar a escribir aquí.";

$alertMessage = "Nada";
$alertStatus = false;
$alertVariant = "success";

if (isset($_POST)) {
    if (isset($_POST['btnGuardar']) || isset($_POST['btnGuardarComo'])) {
        $nombreArchivo = $_POST['nombreArchivo'];
        $archivo = "data/" . $nombreArchivo . ".txt";

        if (isset($_POST['notepad'])) {
            $text = $_POST['notepad'];

            if(file_exists($archivo)){
                if($operarArchivo = fopen($archivo, "w+")){
                    fwrite($operarArchivo, $text);
                } else {
                    echo "no se pudo guardar";
                }
            } else {
                if($operarArchivo = fopen($archivo, "w+")){
                    fwrite($operarArchivo, $text);
                } else {
                    echo "no se pudo guardar";
                }
            }
        }
    }
    if (isset($_POST['btnNuevo'])) {
        $nombreArchivo = $nombreInicial;
    }
    if (isset($_POST['btnAbrir'])) {
        $nombreArchivo = "Abrir";
    }
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bloc de Notas Online | PHP</title>
    <link rel="shortcut icon" href="assets/icons/Notepad.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/styles/index.css">
</head>

<body>
    <header class="header container-fluid d-flex justify-content-between p-2">
        <h4 class="header-title">Bloc de Notas Online</h4>
        <form method="post" action="<?php $_SERVER['PHP_SELF'] ?>" class="header-buttons d-flex px-2">
            <button type="submit" name="btnNuevo" class="mx-2 btn btn-success">Nuevo archivo</button>
            <button type="submit" name="btnAbrir" class="mx-2 btn btn-secondary">Abrir archivo</button>
        </form>
    </header>
    <main class="main-container d-flex my-3 justify-content-center">
        <form method="post" action="<?php $_SERVER['PHP_SELF'] ?>" class="notepad-container container-xxl row justify-content-between mx-2">
            
            <fieldset class="notepad-card card px-0 col-7">
                <div class="card-header">
                    <span class="text-muted fw-semibold">
                        <?php
                        echo $nombreArchivo;
                        ?>
                    </span>
                </div>
                <div id="notepadForm" class="notepad-form card-body p-0">
                    <?php
                    if ($nombreArchivo != $nombreInicial) {
                        echo "<textarea class='notepad form-control' name='notepad' id='notepad'>{$text}</textarea>";
                    } else {
                        echo "<textarea class='notepad form-control' name='notepad' id='notepad' placeholder='Empieza a escribir aquí...'></textarea>";
                    }
                    ?>
                </div>
            </fieldset>
            <fieldset class="control-panel card col-2 px-0 col-4">
                <div class="card-header">
                    <span class="fw-semibold" >Opciones</span>
                </div>
                <div class="card-body">
                    <div class="panel-body">
                        <span class="dir-card-title">Directorio: </span>
                        <div class="card dir-container mb-2 mt-2">
                            <div class="card-body dir-content">
                                <?php
                                $ruta = "data";
                                $files = scandir($ruta);
                                foreach ($files as $archivo) {
                                    echo $archivo; ?>
                                    <br>
                                    <?php
                                }
                                ?>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="nombreArchivo" class="form-label">Nombre: </label>
                            <?php 
                            
                                
                                if($nombreArchivo != $nombreInicial){
                                    if(isset($_POST['btnGuardarComo'])){
                                        echo '<input type="text" class="form-control" name="nombreArchivo" id="nombreArchivo"
                                        placeholder="Nombre del archivo" autofocus value=',$nombreArchivo,'>';
                                    } else {
                                        echo '<input type="text" class="form-control disabled-input" name="nombreArchivo" id="nombreArchivo"
                                        placeholder="Nombre del archivo" readonly value=',$nombreArchivo,'>';
                                    }
                                } else {
                                    echo '<input type="text" class="form-control" name="nombreArchivo" id="nombreArchivo"
                                    placeholder="Nombre del archivo" required>';
                                }
                            ?>
                        </div>
                    </div>
                    <div class="panel-footer">
                        <button type="submit" name="btnGuardar" class="btn btn-primary">Guardar</button>
                        <button type="submit" name="btnGuardarComo" class="btn btn-secondary">Guardar como</button>
                    </div>
                </div>
            </fieldset>
        </form>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
        crossorigin="anonymous"></script>
</body>

</html>