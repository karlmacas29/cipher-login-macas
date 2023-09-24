<?php
   include "./data/config.php";
   // Check user login or not
   if(!isset($_SESSION['name'])){
       header('Location: ./index.php');
       exit();
   }
       
       //username
       $name = $_SESSION['name'];
       //from fbandgoogle
       @$picture = $_SESSION['picture'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vigenere Cipher</title>
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
                <span class="navbar-brand mb-0 h1 fw-bold text-dark" id="title9"><i class="bi bi-table px-2"></i> Vigenere Cipher </span>
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
                        <label for="keyword">Keyword</label>
                        <input type="text" class="form-control" id="keyword" placeholder="Enter Keyword">
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
            $("#activel").addClass("bg-light text-dark").removeClass("text-white");

            // Function to perform Vigenère cipher encryption or decryption
            function vigenereCipher(text, keyword, decrypt = false) {
                let result = '';
                for (let i = 0, j = 0; i < text.length; i++) {
                    let char = text.charAt(i);
                    if (char.match(/[a-z]/i)) {
                        let keywordChar = keyword.charAt(j % keyword.length);
                        let keywordCode = keywordChar.charCodeAt(0) - (keywordChar >= 'a' ? 97 : 65);
                        let code = text.charCodeAt(i);
                        if (code >= 65 && code <= 90) {
                            char = String.fromCharCode(((code - 65 + (decrypt ? 26 - keywordCode : keywordCode)) % 26) + 65);
                        } else if (code >= 97 && code <= 122) {
                            char = String.fromCharCode(((code - 97 + (decrypt ? 26 - keywordCode : keywordCode)) % 26) + 97);
                        }
                        j++;
                    }
                    result += char;
                }
                return result;
            }

            // Encrypt button click event
            $("#encryptButton").click(function () {
                let inputText = $("#inputText").val();
                let keyword = $("#keyword").val();
                let encryptedText = vigenereCipher(inputText, keyword);
                $("#outputText").val(encryptedText);
            });

            // Decrypt button click event
            $("#decryptButton").click(function () {
                let inputText = $("#inputText").val();
                let keyword = $("#keyword").val();
                let decryptedText = vigenereCipher(inputText, keyword, true); // Decrypt by shifting in the opposite direction
                $("#outputText").val(decryptedText);
            });

        })
    </script>
    <?php include "./script/jquery.php" ?>
</body>
</html>