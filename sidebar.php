<div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-primary " style="height: 100vh; " id="sidebar1">
    <a href="./cipherWorld.php" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
      <h2><i class="bi bi-arrow-left-right p-3"></i></h2>
      <span class="fs-4">Cipher Web</span>
    </a>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
      <li class="nav-item">
        <a href="./cipherWorld.php" class="nav-link text-white" id="activeP">
        <i class="bi bi-house-door px-2"></i>
          Home
        </a>
      </li>
      <li>
        <a href="./atbash.php" class="nav-link text-white" id="activeQ">
        <i class="bi bi-sort-alpha-down px-2"></i>
          Atbash
        </a>
      </li>
      <li>
        <a href="./caesar.php" class="nav-link text-white" id="activei">
          <i class="bi bi-1-circle px-2"></i>
          Caesar
        </a>
      </li>
      <li>
        <a href="./vigenere.php" class="nav-link text-white" id="activel">
        <i class="bi bi-table px-2"></i>
          Vigenere
        </a>
      </li>
      <li>
        <!-- <a href="#" class="nav-link text-white disabled">
            <i class="bi bi-question-octagon px-2"></i>
          Coming Soon...
        </a> -->
      </li>
    </ul>
    <hr>
    <div class="dropdown">
      <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
        <img src="
        <?php
        if(!$picture){
          echo "https://t4.ftcdn.net/jpg/02/29/75/83/360_F_229758328_7x8jwCwjtBMmC6rgFzLFhZoEpLobB6L8.jpg";
        }else{
          echo $picture;
        }
        ?>
        " alt="" width="32" height="32" class="rounded-circle me-2">
        <strong><?php echo $name; ?></strong>
      </a>
      <ul class="dropdown-menu dropdown-menu-light text-small shadow" aria-labelledby="dropdownUser1">
        <li><a class="dropdown-item" href="#">Created by: Karl R. Macas</a></li>
        <li><hr class="dropdown-divider"></li>
        <li><a class="dropdown-item text-danger" href="./logout.php">Logout</a></li>
      </ul>
    </div>
  </div>