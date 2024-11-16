<div class="sm:flex sm:items-start justify-center">
    <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-center w-full">
        <h3 class="text-lg leading-6 font-medium text-gray-900 dark:text-gray-100" id="modal-title">
            QR Code Scanner
        </h3>
        <div class="mt-2 flex flex-col items-center">
            <div id="reader" style="width: 300px; height: 250px;"></div>
            <p id="scannedResult" class="font-bold text-blue-600">Waiting for QR code...</p>
        </div>
    </div>
</div>

<script src="https://unpkg.com/html5-qrcode"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const qrReader = new Html5Qrcode("reader");
        const config = {
            fps: 10,
            qrbox: { width: 300, height: 300 }
        };
        Html5Qrcode.getCameras().then(devices => {
            if (devices && devices.length) {
                const cameraId = devices[0].id;
                qrReader.start(
                    cameraId,
                    config,
                    (decodedText, decodedResult) => {
                        // Handle successful scan
                        const scannedResultElement = document.getElementById('scannedResult');
                        scannedResultElement.innerText = `SCANNED COMPLETE`;
                        scannedResultElement.style.color = 'green'; // Change font color to green
                        // Redirect to Laravel route with scanned data
                        const qrCodeInput = document.getElementById('qr_code');
                        if (qrCodeInput) {
                            qrCodeInput.value = decodedText;
                        } else {
                            console.error("QR code input element not found.");
                        }
                    },
                    (error) => {
                        console.warn(`QR error: ${error}`);
                    }
                ).catch(err => console.error(err));
            } else {
                console.error("No cameras found.");
                alert("No cameras found. Please ensure camera permissions are granted.");
            }
        }).catch(err => {
            console.error("Error accessing cameras: ", err);
            alert("Error accessing cameras. Please ensure camera permissions are granted.");
        });
    });
</script>
