<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no"> -->

  <title>HealtyChoice</title>
  <link rel="stylesheet" href="style.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="icon" type="image/png" sizes="16x16" href="img/favicon-16x16.png">
  <link rel="icon" type="image/png" sizes="32x32" href="img/favicon-32x32.png">
  <link rel="apple-touch-icon" type="image/png" sizes="180x180" href="img/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="192x192" href="img/android-chrome-192x192.png">
  <link rel="icon" type="image/png" sizes="512x512" href="img/android-chrome-512x512.png">


</head>
<body>

  <header class="header">
    <h1>HealtyChoice</h1>
    <a href="#" class="menu-icon"><ion-icon name="menu-outline"></ion-icon></a>
  </header>

  <div class="menu">
    <ul>
        <li><a href="index.html">HOME</a></li>
        <li><a href="#">PROFILE</a></li>
        <li><a href="help.html">HELP</a></li>
        <li><a href="information.html">INFORMATION</a></li>
        <li><a href="login.html" class="login-link">LOGIN</a></li>
        <div class="searchbar">
          <input type="text"  id="searchInput" placeholder="Cerca prodotto">
          <button id="searchButton">Cerca</button>
        </div>
    </ul>
  </div>

  <div class="rapidnavigationbar">
    <a href="#" class="filter-link">
      <div class="filter">
        <ion-icon name="filter-outline"></ion-icon>
        <label>Filter</label>
      </div>
    </a>
    <div class="filter-search">
      <input type="text" id="quickSearchInput" placeholder="Cerca prodotto">
      <button id="quickSearchButton">Cerca</button>
    </div>
  </div>
  

  <div class="filter-container">
    <h3>Tipo di Prodotto</h3>
    <div class="checkbox-column">
      <label><input type="checkbox" name="productType" value="pasta">Pasta e Simili</label>
      <label><input type="checkbox" name="productType" value="bibite">Bibite</label>
      <label><input type="checkbox" name="productType" value="frutta">Frutta</label>
      <label><input type="checkbox" name="productType" value="carne">Carne</label>
      <label><input type="checkbox" name="productType" value="snack">Snack</label>
      <label><input type="checkbox" name="productType" value="legumi">Legumi</label>
      <label><input type="checkbox" name="productType" value="pesce">Pesce</label>
      <label><input type="checkbox" name="productType" value="cereali">Cereali</label>
    </div>

    <h3>Range di Prezzo (&#8364)</h3>
    <div class="range-container">
      <span class="range-label">Da:</span>
      <input class="range-input" type="range" id="minPrice" name="minPrice" min="0" max="100" step="0.10">
      <span class="selected-label range-value">-</span>
    </div>
    <div class="range-container" style="margin-top: 20px;">
      <span class="range-label">A:</span>
      <input style="margin-left: 17px;" class="range-input" type="range" id="maxPrice" name="maxPrice" min="0" max="100" step="0.10">
      <span class="selected-label range-value">-</span>
    </div>
    
    <h3>Range di Calorie (Kcal)</h3>
    <div class="range-container">
      <span class="range-label">Da:</span>
      <input class="range-input" type="range" id="minCalories" name="minCalories" min="0" max="1000" step="1">
      <span class="selected-label range-value">-</span>
    </div>
    <div class="range-container" style="margin-top: 20px">
      <span class="range-label">A:</span>
      <input style="margin-left: 17px;" class="range-input" type="range" id="maxCalories" name="maxCalories" min="0" max="1000" step="1">
      <span class="selected-label range-value">- </span>
    </div>

    <button class="submit-filter">Submit</button>

  </div>


<!--QUI BISOGNA INSERIRE I PRODOTTI DAL DATABASE-->
<div class="container">
  <h2>Prodotti Bevande</h2>
  <table>
      <tr>
          <th>Nome Prodotto</th>
          <th>Calorie</th>
      </tr>
      <?php
      $conn = new mysqli("localhost", "root", "Martina4928!!", "bevande");

      if ($conn->connect_error) {
          die("Connessione al database fallita: " . $conn->connect_error);
      }

      $query = "SELECT * FROM prodotti";
      $result = $conn->query($query);

      if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
              echo "<tr><td>" . $row["nome"] . "</td><td>" . $row["calorie"] . "</td></tr>";
          }
      } else {
          echo "<tr><td colspan='2'>Nessun prodotto trovato.</td></tr>";
      }

      $conn->close();
      ?>
  </table>
</div>



  <div id="disclaimer-popup" class="popup">
    <div class="popup-content">
      <h2>Disclaimer</h2>
      <p>Le dichiarazioni nutrizionali potrebbero non essere sempre accurate. Si prega di fare riferimento alle informazioni sul prodotto reale.</p>
      <p class="close-disclaimer-icon">x</p>
    </div>
  </div>

  <div class="hr-end-products">
    <h3>The products has been finished</h3>
  </div>

    <footer class="footer">
      <div class="footer-content">
        <div class="footer-section about">
          <h2>HealtyChoice</h2>
          <p>Benvenuti su HealtyChoice, il sito dedicato alla scelta di cibi salutari e bilanciati per uno stile di vita sano.</p>
        </div>
        <div class="footer-section contact">
          <h2>Contatti (N.D.)</h2>
          <p><ion-icon name="mail-outline"></ion-icon> <a href="mailto:contact@healtychoice.com">contact@healtychoice.com</a></p>
          <p><ion-icon name="call-outline"></ion-icon> +39 1234567890</p>
        </div>
        <div class="footer-section follow">
          <h2>Seguici (N.D.)</h2>
          <a href="#"><ion-icon name="logo-facebook"></ion-icon></a>
          <a href="#"><ion-icon name="logo-instagram"></ion-icon></a>
          <a href="#"><ion-icon name="logo-twitter"></ion-icon></a>
        </div>
      </div>
      <div class="footer-bottom">
        <p>&copy; 2023 HealtyChoice. Tutti i diritti riservati.</p>
      </div>
    </footer>
    
    <!-- <div id="disclaimer-banner" class="disclaimer-banner">
      <p>Accetta i termini e le condizioni per continuare.</p>
      <button id="accept-button">Accetto</button>
    </div> -->
    
    
  
  
  

  <script src="script.js"></script>
  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

</body>
</html>
