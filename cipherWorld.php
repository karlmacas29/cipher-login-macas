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
    <title>Welcome to Cipher Web</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <?php include "./style/style.php" ?>
</head>
<body>

    <div class="row g-0 justify-content-center m-0 p-0">   
        <div class="col-md-3" >
                <?php include "sidebar.php" ?>
        </div>
        <div class="col-md-9 overflow-auto p-0" style="height: 100vh;">
            <!-- As a heading -->
            <nav class="navbar sticky-top bg-primary-subtle " id="nav1">
            <div class="container bg-primary-subtle" id="nav2">

                <span class="navbar-brand mb-0 h1 fw-bold text-dark" id="title9"><i class="bi bi-house-door px-2"></i> Home </span>
                    <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" id="modeToggle">
                    <label class="form-check-label" for="modeToggle"><i class="bi bi-moon-stars-fill"></i></label>
                    </div>
                    
            </div>
            
            </nav>
            

            <div class="container mx-auto p-2" id="darkbg">
                <h2 class="text-center">Available Cipher</h2>
                <div class="row px-4 g-2 text-center border-1">
                    <div class="col">
                        <div class="card border-dark" id="card">
                        <img src="https://media.geeksforgeeks.org/wp-content/uploads/aa-4.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Atbash Cipher</h5>
                            <p class="card-text">Atbash cipher is a substitution cipher with just one specific key where all the letters are reversed that is A to Z and Z to A. It was originally used to encode the Hebrew alphabets but it can be modified to encode any alphabet.</p>
                            <a href="https://www.geeksforgeeks.org/implementing-atbash-cipher/" target="_blank" class="btn btn-primary">Learn More</a>
                        </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card border-dark" id="card1">
                        <img src="https://media.geeksforgeeks.org/wp-content/uploads/ceaserCipher.png" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Caesar Cipher</h5>
                            <p class="card-text">The Caesar Cipher technique is one of the earliest and simplest methods of encryption technique. It's simply a type of substitution cipher, i.e., each letter of a given text is replaced by a letter with a fixed number of positions down the alphabet.</p>
                            <a href="https://www.geeksforgeeks.org/caesar-cipher-in-cryptography/" target="_blank" class="btn btn-primary">Learn More</a>
                        </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card border-dark" id="card2">
                        <img src="https://media.geeksforgeeks.org/wp-content/cdn-uploads/Vigen%C3%A8re_square_shading.png" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Vigenere Cipher</h5>
                            <p class="card-text">Vigenere Cipher is a method of encrypting alphabetic text. It uses a simple form of polyalphabetic substitution. A polyalphabetic cipher is any cipher based on substitution, using multiple substitution alphabets. The encryption of the original text is done using the Vigenère square or Vigenère table.</p>
                            <a href="https://www.geeksforgeeks.org/vigenere-cipher/" target="_blank" class="btn btn-primary">Learn More</a>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $("#activeP").addClass("bg-light text-dark").removeClass("text-white");
        })
    </script>
    <?php include "./script/jquery.php" ?>
</body>
</html>