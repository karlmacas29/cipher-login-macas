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
    <title>Atbash Cipher</title>
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
            <nav class="navbar sticky-top bg-primary-subtle "id="nav1">
            <div class="container bg-primary-subtle" id="nav2">
                <span class="navbar-brand mb-0 h1 fw-bold text-dark" id="title9"><i class="bi bi-sort-alpha-down px-2"></i> Atbash Cipher</span>
                    <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" id="modeToggle">
                    <label class="form-check-label" for="modeToggle"><i class="bi bi-moon-stars-fill"></i></label>
                    </div>
            </div>
            </nav>

            <div class="container mt-5">
        
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="form-group">
                    <label for="inputText">Input Text</label>
                    <textarea class="form-control" id="inputText" rows="3"></textarea>
                </div>
                <div class="form-group">
                    <label for="outputText">Output Text</label>
                    <textarea class="form-control" id="outputText" rows="3" readonly></textarea>
                </div>
                <div class="form-group text-center">
                    <button class="btn btn-primary" id="encodeBtn">Encode</button>
                    <button class="btn btn-primary" id="decodeBtn">Decode</button>
                </div>
            </div>
        </div>
            </div>

            <div class="container mt-5">
        <h1 class="text-center">Atbash Cipher Table</h1>
        <table class="table table-bordered text-center">
            <thead>
                <tr>
                    <th>Letter</th>
                    <td class="bg-success text-white">A</td>
                    <td>B</td>
                    <td>C</td>
                    <td>D</td>
                    <td>E</td>
                    <td>F</td>
                    <td>G</td>
                    <td>H</td>
                    <td>I</td>
                    <td>J</td>
                    <td>K</td>
                    <td>L</td>
                    <td>M</td>
                    <td>N</td>
                    <td>O</td>
                    <td>P</td>
                    <td>Q</td>
                    <td>R</td>
                    <td>S</td>
                    <td>T</td>
                    <td>U</td>
                    <td>V</td>
                    <td>W</td>
                    <td>X</td>
                    <td>Y</td>
                    <td>Z</td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th>Encode</th>
                    <td class="bg-primary text-white">Z</td>
                    <td>Y</td>
                    <td>X</td>
                    <td>W</td>
                    <td>V</td>
                    <td>U</td>
                    <td>T</td>
                    <td>S</td>
                    <td>R</td>
                    <td>Q</td>
                    <td>P</td>
                    <td>O</td>
                    <td>N</td>
                    <td>M</td>
                    <td>L</td>
                    <td>K</td>
                    <td>J</td>
                    <td>I</td>
                    <td>H</td>
                    <td>G</td>
                    <td>F</td>
                    <td>E</td>
                    <td>D</td>
                    <td>C</td>
                    <td>B</td>
                    <td>A</td>
                </tr>
            </tbody>
        </table>
    </div>
        </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $("#activeQ").addClass("bg-light text-dark").removeClass("text-white");

            $("#encodeBtn").click(function() {
                var inputText = $("#inputText").val().toUpperCase();
                var outputText = "";
                for (var i = 0; i < inputText.length; i++) {
                    if (inputText[i].match(/[A-Z]/)) {
                        var charCode = inputText.charCodeAt(i);
                        var encodedCharCode = 155 - charCode; // Atbash cipher formula
                        if (encodedCharCode < 65) {
                            encodedCharCode += 26; // Wrap around for letters
                        }
                        outputText += String.fromCharCode(encodedCharCode);
                    } else {
                        outputText += inputText[i];
                    }
                }
                $("#outputText").val(outputText);
            });

            $("#decodeBtn").click(function() {
                // To decode, you can reuse the same logic as encoding
                $("#encodeBtn").click();
            });
        })
    </script>
    <?php include "./script/jquery.php" ?>
</body>
</html>