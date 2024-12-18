<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Advanced QR Code Scanner</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="container">
        <h1 class="txt1">St.Mary's university digital id managment system</h1>
        <h1 class="txt2">QR Code Scanner</h1>
        <div id="qr-reader"></div>
        <div class="alert" id="result-alert"></div>
        <div id="image1"></div>
    </div>
    <div class="container">
        <!-- <h1 class="txt1">St.Mary's university digital id managment system</h1>
    <h1 class="txt2">QR Code Scanner</h1>
    <div id="qr-reader"></div> -->
        <div class="alert" id="result-alert"></div>
        <div id="image1"></div>
        <p id="message-text"></p>
        <img id="im1">
    </div>


    <!-- Include the html5-qrcode library -->
    <script src="https://unpkg.com/html5-qrcode"></script>

    <!-- Your JavaScript code -->
    <script>
        let scannedData = "";
        let imageDisplayed = false;

        function onScanSuccess(decodeText, decodeResult) {
            scannedData = decodeText;
            const resultAlert = document.getElementById("result-alert");
            const imageContainer = document.getElementById("image1");
            const messageText = document.getElementById("message-text"); // Get the <p> tag

            // ... (existing code)

            // Send the scanned data to a PHP script
            const xhr = new XMLHttpRequest();
            xhr.open("POST", "pqd.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            // Inside the onreadystatechange function of the XMLHttpRequest
            // Inside the onreadystatechange function of the XMLHttpRequest
            // Inside the onreadystatechange function of the XMLHttpRequest
            // Inside the onreadystatechange function of the XMLHttpRequest
            // Inside the onreadystatechange function of the XMLHttpRequest
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    const response = JSON.parse(xhr.responseText);

                    // Clear any previous message or image
                    messageText.textContent = '';
                    imageContainer.innerHTML = '';

                    if (response.message && response.message === "No student found.") {
                        // No student found
                        messageText.textContent = response.message;
                        imageDisplayed = false;
                    } else if (response.name && response.id && response.imagePath) {
                        // Student found
                        messageText.textContent = response.name + " " + response.id;
                        const imgElement = document.createElement("img");
                        imgElement.src = response.imagePath;
                        imgElement.id = "im1"; // Set an ID for the image element
                        imageContainer.appendChild(imgElement);
                        imageDisplayed = true;
                    }
                }
            };





            xhr.send("scannedData=" + encodeURIComponent(scannedData));
        }



        const scanner = new Html5QrcodeScanner("qr-reader", {
            fps: 50,
            qrbos: 100,
        });

        scanner.render(onScanSuccess);
    </script>


</body>

</html>