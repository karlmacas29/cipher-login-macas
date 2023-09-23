<?php
   include "./data/config.php";
   // Check user login or not
   if(!isset($_SESSION['id'])){
       header('Location: ./index.php');
   }
       $id = $_SESSION['id'];
       $name = $_SESSION['name'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Caesar Cipher</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <?php include "./style/style.php" ?>
    <style>
        body {
            margin: 0;
        }
    </style>
</head>
<body>
    <div class="row g-0 justify-content-center m-0 p-0">
        <div class="col-md-3">
                <?php include "./sidebar.php" ?>
        </div>
        <div class="col-md-9 overflow-auto p-0" style="height:100vh;" id="darkbg">
            <!-- As a heading -->
            <nav class="navbar sticky-top bg-primary-subtle " id="nav1">
            <div class="container bg-primary-subtle" id="nav2">
                <span class="navbar-brand mb-0 h1 fw-bold text-dark" id="title9"><i class="bi bi-1-circle px-2"></i> Caesar Cipher</span>
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" id="modeToggle">
                    <label class="form-check-label" for="modeToggle"><i class="bi bi-moon-stars-fill"></i></label>
                    </div>
            </div>
            </nav>

            <div class="container mt-5">
        
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="inputText">Input Text</label>
                    <textarea class="form-control" id="inputText" rows="4"></textarea>
                </div>
                <div class="form-group">
                    <label for="shiftValue">Shift Value</label>
                    <input type="number" class="form-control" id="shiftValue" value="3">
                </div>
                <div class="form-group">
                    <label for="outputText">Output Text</label>
                    <textarea class="form-control" id="outputText" rows="4" readonly></textarea>
                </div>
                <button class="btn btn-primary" id="encryptButton">Encrypt</button>
                <button class="btn btn-secondary" id="decryptButton">Decrypt</button>
            </div>
        </div>
    </div>
        
        

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $("#activei").addClass("bg-light text-dark").removeClass("text-white");

            // Function to perform Caesar cipher encryption or decryption
            function caesarCipher(text, shift) {
                let result = '';
                for (let i = 0; i < text.length; i++) {
                    let char = text.charAt(i);
                    if (char.match(/[a-z]/i)) {
                        let code = text.charCodeAt(i);
                        if (code >= 65 && code <= 90) {
                            char = String.fromCharCode(((code - 65 + shift) % 26) + 65);
                        } else if (code >= 97 && code <= 122) {
                            char = String.fromCharCode(((code - 97 + shift) % 26) + 97);
                        }
                    }
                    result += char;
                }
                return result;
            }

            // Encrypt button click event
            $("#encryptButton").click(function () {
                let inputText = $("#inputText").val();
                let shiftValue = parseInt($("#shiftValue").val());
                let encryptedText = caesarCipher(inputText, shiftValue);
                $("#outputText").val(encryptedText);
            });

            // Decrypt button click event
            $("#decryptButton").click(function () {
                let inputText = $("#inputText").val();
                let shiftValue = parseInt($("#shiftValue").val());
                let decryptedText = caesarCipher(inputText, -shiftValue); // Decrypt by shifting in the opposite direction
                $("#outputText").val(decryptedText);
            });
        })
    </script>
    <?php include "./script/jquery.php" ?>
</body>
</html>