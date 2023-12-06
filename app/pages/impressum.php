<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <title>Impressum - Hotel Bravanto</title>
    <link href="<?=ROOT?>/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      #image1 {
        width: 200px; /* You can set the dimensions to whatever you want */
        height: 250px;
        object-fit: cover;
      }

      #image2 {
        width: 200px; /* You can set the dimensions to whatever you want */
        height: 250px;
        object-fit: cover;
      }
      
    </style>

    
    <link href="<?=ROOT?>/assets/css/headers.css" rel="stylesheet">
</head>
<body>

  

<body>

    <?php include "includes/navbar.php"; ?>


    <a id="impressum">
    <section class="my-4">
        <div class="py-4 mb-2 me-4">
            <h2 class="text-center">Impressum</h2>
        </div>
    </section>
    </a>
    


    <div class="row mb-2 me-1 d-flex justify-content-center">
    <ul class="list-group list-group-flush w-50 text-center">
    <li class="list-group-item">Hotel Bravanto</li>
    <li class="list-group-item">Unternehmensgegenstand: Hotelbetrieb</li>
    <li class="list-group-item">UID-Nr: ATU7319937</li>
    <li class="list-group-item">FN: 763901a</li>
    <li class="list-group-item">FB-Gericht: Gerichtsstand Palafrugell, Girona, Spanien</li>
    <li class="list-group-item">Sitz: 10118 Palafrugell</li>
    <li class="list-group-item">Tel.: +34 778 889 231</li>
    <li class="list-group-item">Fax: +43 012 342 122</li>
    <li class="list-group-item">E-Mail: bravanto@costabrava.com</li>
    <li class="list-group-item">Mitglied der WKO, ÖHV</li>
    <li class="list-group-item">Gewerbeordnung: www.ris.bka.gv.at</li>
    <li class="list-group-item">Bezirkshauptmannschaft Palafrugell</li>
    <li class="list-group-item">Online-Streitbeilegung: <a href="http://ec.europa.eu/odr" target="_blank">http://ec.europa.eu/odr</a></li>
    <li class="list-group-item">Hotelverwaltung: </li>
    </ul>
    </div>
        <div class="col me-4 mb-4">
          <img src="<?=ROOT?>/assets/images/aisa.jpeg" id="image1" class="img-fluid rounded mx-auto d-block" alt="Aisa Gulyas">
          <div class="text-center mt-1">
          Aisa Emese Gulyás
          </div>
        </div>

        <div class="col me-4 mb-4">
          <img src="<?=ROOT?>/assets/images/yehor.jpg" id="image2" class="img-fluid rounded mx-auto d-block" alt="Yehor Zudikhin">
          <div class="text-center mt-1 mb-5">
          Yehor Zudikhin
          </div>
      </div>


    <?php include "includes/footer.php"; ?>

    <script src="<?=ROOT?>/assets/bootstrap/js/bootstrap.bundle.min.js"></script>

      
</body>
</html>