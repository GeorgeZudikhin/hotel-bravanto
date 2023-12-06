<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <title>FAQ - Hotel Bravanto</title>
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
    </style>

    
    <link href="<?=ROOT?>/assets/css/headers.css" rel="stylesheet">
</head>
<body>

  

<body class="d-flex flex-column min-vh-100">

    <?php include "includes/navbar.php"; ?>

    <a id="faq">
        <section class="my-4">
            <div class="py-4">
                <h2 class="text-center">FAQ</h2>
            </div>
        </section>
        </a>


    <div class="row mb-2 me-1 d-flex justify-content-center">
        <div class="accordion w-50" id="accordionExample">
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingOne">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    Wie kann ich mich registrieren?
                </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <strong>Um sich zu registrieren, </strong>können Sie gerne ein Formular auf unserem Homepage ausfüllen.
                </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingTwo">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    Passwort vergessen, wie kann ich es ändern?
                </button>
                </h2>
                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <strong>Falls Sie Ihr Passwort vergessen haben,</strong> können Sie sich an das Hotelpersonal wenden.
                </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingThree">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                    Welche Zahlmethoden akzeptieren Sie?
                </button>
                </h2>
                <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    Sie können mit <strong>Karte oder Bargeld</strong> zahlen.
                </div>
                </div>
            </div>
    </div>
    </div>

    <?php include "includes/footer.php"; ?>

    
    <script src="<?=ROOT?>/assets/bootstrap/js/bootstrap.bundle.min.js"></script>

      
</body>
</html>