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

    <title>Absensi QR</title>

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
        <div id="#qrContainer">{!! $qr !!}</div>

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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
// Function to periodically check QR code status and update QR code
async function checkQRCodeStatus() { //Memeriksa status aktif QR code secara periodik.
    try {
        const response = await fetch('{{ route("checkQRStatus") }}');
        if (!response.ok) {
            throw new Error('Failed to check QR code status');
        }
        const data = await response.json();
        if (data.isActive != qrIsActive) {

            location.reload();

        }

    } catch (error) {
        console.error(error);
    }
}

// Call checkQRCodeStatus every second
// Menjalankan fungsi checkQRCodeStatus setiap detik (1000 milidetik).
setInterval(checkQRCodeStatus, 1000); // 1000 milliseconds = 1 second

// Variable to store the interval ID
let updateInterval;

// Function to update QR code
async function updateQRCode() { //Memperbarui QR code secara periodik.
    try {
        const response = await fetch('{{ route("updateQR") }}');
        if (!response.ok) {
            throw new Error('Failed to update QR code');
        }
        // const data = await response.json();
        // Reload the page
        location.reload();


    } catch (error) {
        console.error(error);
    }
}

// Variable to store the current isActive status
let qrIsActive = {{ $qrActive->isActive }};

// Call updateQRCode every 15 seconds
// Menjalankan fungsi updateQRCode setiap 10 detik (10000 milidetik).
updateInterval = setInterval(updateQRCode, 10000); // 10000 milliseconds = 10 seconds

      </script>
  </body>
</html>
