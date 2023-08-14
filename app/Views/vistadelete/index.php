<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario Bonito</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f7f7f7;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
        }

        .form-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            width: 300px;
        }

        .form-field {
            margin-bottom: 15px;
        }

        .form-label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        .form-input {
            width: 96%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .form-input[readonly] {
            background-color: #f7f7f7;
        }

        .form-button {
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            padding: 8px 12px;
            cursor: pointer;
        }

        .form-button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    
    <div class="form-container">
    <form action="<?php echo base_url(); ?>eliminarregistro" method="POST">

    <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />

        <div class="form-field">
            <label for="id" class="form-label">ID:</label>
            <input type="text" id="id" name="id" class="form-input" value="<?php echo $registro['id']; ?>" readonly>
        </div>
        
        <div class="form-field">
            <label for="area" class="form-label">AREA:</label>
            <input type="text" id="area" name="area" class="form-input" value="<?php echo $registro['area']; ?>" readonly>
        </div>

        <div class="form-field">
            <label for="linea" class="form-label">LINEA:</label>
            <input type="text" id="linea" name="linea" class="form-input" value="<?php echo $registro['linea']; ?>" readonly>
        </div>

        <div class="form-field">
            <label for="autor" class="form-label">AUTOR</label>
            <input type="text" id="autor" name="autor" class="form-input" value="<?php echo $registro['autor']; ?>" readonly>
        </div>

        <div class="form-field">
            <label for="sintoma_averia" class="form-label">Sintoma Averia:</label>
            <input type="text" id="sintoma_averia" name="sintoma_averia" class="form-input" value="<?php echo $registro['sintoma_averia']; ?>" readonly>
        </div>
        <input type="submit" value="Eliminar" class="form-button">
    </form>


        <br>
        <br>
        <br>
        <a href="<?php echo base_url(); ?>dashboard" class="form-button">Regresar</a>

    </div>
</body>
</html>
