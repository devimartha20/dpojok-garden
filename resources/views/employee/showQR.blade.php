<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- displays site properly based on user's device -->

    <link
      rel="icon"
      type="image/png"
      sizes="32x32"
      href="./images/favicon-32x32.png"
    />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;700&display=swap"
      rel="stylesheet"
    />

    <title>Frontend Mentor | QR code component</title>

    <!-- Feel free to remove these styles or customise in your own stylesheet 👍 -->
    <style>
      .attribution {
        font-size: 11px;
        text-align: center;
        display: flex;
        padding: 0 5px;
      }
      .attribution a {
        color: hsl(228, 45%, 44%);
      }
      :root {
        font-family: "Outfit", sans-serif;
      }
      * {
        box-sizing: border-box;
        margin: 0;
        padding: 0;
      }
      .container {
        background-color: hsl(212, 45%, 89%);
        width: 100%;
        height: 100%;
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
      }
      .qr-container {
        background-color: hsl(0, 0%, 100%);
        display: flex;
        flex-direction: column;
        align-items: center;
        padding: 12px;
        border-radius: 0.75rem;
        width: 22%;
        height: auto;
      }
      .image {
        max-width: 100%;
        height: auto;

        border-radius: 0.75rem;
      }
      .text {
        text-align: center;
        color: hsl(220, 15%, 55%);
        padding-bottom: 1rem;
        padding-left: 1rem;
        padding-right: 1rem;
      }
      p {
        font-size: 15px;
      }
      .head {
        padding: 1rem;
        text-align: center;
      }
      h2 {
        font-size: 20px;
      }
      @media only screen and (max-width: 768px) {
        .qr-container {
          width: 80%;
        }
      }
    </style>
  </head>
  <body>
    <div class="container">

      <div class="qr-container">
        @if($qr != null)
        {!! $qr !!}
            <h2 class="head">
            Absensi
            </h2>
            <p class="text">
            Scan QR code untuk Absensi.
            </p>
            <div class="attribution">
            Login sebagai pegawai. Buka fitur Absensi dan pilih Scan</a>.
            </div>
        @else
        <p class="text">
            Tidak ada sesi Absensi.
            </p>
        @endif
      </div>
    </div>
    <script>
        function updateQRCode() {
          // Make an AJAX request to update the QR code
          var xhr = new XMLHttpRequest();
          xhr.onreadystatechange = function() {
            if (xhr.readyState === XMLHttpRequest.DONE) {
              if (xhr.status === 200) {
                // Reload the page after updating the QR code
                location.reload();
              } else {
                console.error('Failed to update QR code: ' + xhr.status);
              }
            }
          };
          xhr.open('GET', '/updateQR', true);
          xhr.send();
        }

        // Call updateQRCode every 10 seconds
        setInterval(updateQRCode, 10000); // 10000 milliseconds = 10 seconds
      </script>
  </body>
</html>
