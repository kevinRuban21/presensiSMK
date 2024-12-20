
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
      crossorigin="anonymous"
    />

    <!-- Favicon -->
    <link rel="icon" href="<?= base_url() ?>/logo2.png" type="image/gif">

    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Viga&display=swap"
      rel="stylesheet"
    />

    <!-- html2canvas -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>

    <!-- My CSS -->
    <style>
        .card {
            background-image: url(<?= base_url('templateKartuSiswa/img/templateCard.png') ?>);
            background-size: contain;
            background-repeat: no-repeat;
            width: 390px;
            height: 550px;
        }
        .card-title {
            font-family: "Viga", serif !important;
        }

        .card-body {
            position: relative;
        }

        .nama {
            position: absolute;
            top: 394px;
            left: 210px;
        }

        .nisn {
            position: absolute;
            top: 430px;
            left: 210px;
        }

        .nipd {
            position: absolute;
            top: 465px;
            left: 210px;
        }

        .qrCode {
            position: absolute;
            top: 160px;
            left: 100px;
        }

        button{
            margin-left: 365px;
        }

    </style>

    <title>Kartu Siswa</title>
  </head>
  <body>
    <div class="container">
    <button onclick="convertHtmlToImage()" class="mt-4 btn btn-primary">Download</button>
        <div class="kartu d-flex justify-content-center">
            <div class="card" id="kartu_siswa">
                <div class="card-body">
                <div class="qrCode">
                    <img src="<?= $siswa['qr'] ?>" alt="" width="200" />
                </div>
                <div class="card-text">
                    <h4 class="nama" id="myText"><?= $siswa['nama_siswa'] ?></h4>
                    <h4 class="nisn" id="myText"><?= $siswa['nisn'] ?></h4>
                    <h4 class="nipd" id="myText"><?= $siswa['nipd'] ?></h4>
                </div>
                </div>
            </div>
        </div>
    </div>

   
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
      crossorigin="anonymous"
    ></script>

    <script>
      const text = document.getElementById("myText");
      text.textContent = text.textContent.slice(0, 12);
    </script>

    <script>
        function convertHtmlToImage() {
            html2canvas(document.getElementById('kartu_siswa')).then(canvas => {
                // Ubah canvas menjadi data URL
                var imgData = canvas.toDataURL('image/png');

                // Buat link download
                var link = document.createElement('a');
                link.download = 'kartusiswa.png';
                link.href = imgData;
                link.click();
            });
        }
    </script>

  </body>
</html>
