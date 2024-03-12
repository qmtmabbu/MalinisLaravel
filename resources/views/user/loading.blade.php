<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet">
    <link rel="icon" href="/logo.png" type="image/x-icon">
    <title>Malinis</title>
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">
    <link rel="stylesheet" type="text/css" href="assets/css/templatemo-art-factory.css">
    <link rel="stylesheet" type="text/css" href="assets/css/owl-carousel.css">
    <link rel="stylesheet" type="text/css" href="assets/css/ownstyle.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sen:wght@600&display=swap" rel="stylesheet">
    <style>
        .background-header {
            background-color: #00a00d !important;
            color: white !important;
        }

        .header-area {
            background-color: #00a00d !important;
        }

        #preloader {
            background-image: linear-gradient(145deg, #00a00d 0%, #00e827 100%);
        }

        .header-area.header-sticky .nav li a.active {
            color: black !important;
        }

        body {
            font-family: 'Sen', sans-serif !important;
        }

        footer .social li a {
            background-color: #00682b !important;
        }

        .sniff-item {
            opacity: 0;
            transition: opacity 0.5s ease-in-out;
        }

        #sniffData {
            font-family: 'Courier New', monospace;
            padding: 20px;
            background-color: #EDEDED;
            border-radius: 5px;
            color: #000000;
            opacity: 100%;
            transform: translateY(20px);
            transition: opacity 0.5s ease, transform 0.5s ease;
        }

        #progress-container {
            width: 90%;
            height: 30px;
            background-color: #1a1a1a;
            border-radius: 5px;
            margin-bottom: 20px;
            margin-left: 30px;
        }

        #progress-bar {
            width: 0%;
            height: 100%;
            background-color: #4caf50;
            border-radius: 5px;
            transition: width 0.3s ease;
        }

        .btnProceed {
            background-color: #4caf50;
            border-radius: 5px;
            opacity: 0;
        }

        /* CSS for the packet sniffing visualization */
        #sniffing-logs {
            font-family: 'Courier New', monospace;
            padding: 20px;
            background-color: #1a1a1a;
            border-radius: 5px;
            color: #cfcfcf;
            opacity: 0;
            transform: translateY(20px);
            transition: opacity 0.5s ease, transform 0.5s ease;
        }

        #sniffing-logs.show {
            opacity: 1;
            transform: translateY(0);
        }

        /* CSS for individual log items */
        .log-item {
            opacity: 0;
            transform: translateY(20px);
            transition: opacity 0.5s ease, transform 0.5s ease;
        }

        .log-item.show {
            opacity: 1;
            transform: translateY(0);
        }

        #results {
            color: #000000;
            font-family: 'Sen', sans-serif !important;
            margin-bottom: 20px;
            margin-left: 30px;
        }

        h2 {
            font-size: 18px;
        }

        #preloader .jumper {
            left: 0;
            top: 0;
            right: 0;
            bottom: 0;
            display: block;
            position: absolute;
            margin: auto;
            width: 50px;
            height: 50px;
        }

        #preloader .jumper>div {
            background-color: #fff;
            width: 10px;
            height: 10px;
            border-radius: 100%;
            -webkit-animation-fill-mode: both;
            animation-fill-mode: both;
            position: absolute;
            opacity: 0;
            width: 50px;
            height: 50px;
            -webkit-animation: jumper 1s 0s linear infinite;
            animation: jumper 1s 0s linear infinite;
        }

        #preloader .jumper>div:nth-child(2) {
            -webkit-animation-delay: 0.33333s;
            animation-delay: 0.33333s;
        }

        #preloader .jumper>div:nth-child(3) {
            -webkit-animation-delay: 0.66666s;
            animation-delay: 0.66666s;
        }

        @-webkit-keyframes jumper {
            0% {
                opacity: 0;
                -webkit-transform: scale(0);
                transform: scale(0);
            }

            5% {
                opacity: 1;
            }

            100% {
                -webkit-transform: scale(1);
                transform: scale(1);
                opacity: 0;
            }
        }

        @keyframes jumper {
            0% {
                opacity: 0;
                -webkit-transform: scale(0);
                transform: scale(0);
            }

            5% {
                opacity: 1;
            }

            100% {
                opacity: 0;
            }
        }
    </style>
    <link rel="stylesheet" href="/assets/css/ownstyle.css">
</head>

<body>

    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="text-center mt-5">
            <h1 id="scanningText">Scanning ...</h1>
        </div>
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
    <!-- ***** Preloader End ***** -->

    <div class="row">
        <div class="col-lg-12 mt-5">
            <div id="progress-container">
                <div id="progress-bar"></div>
            </div>
        </div>
    </div>
    <div id="results">
        <h2>Processing Results: 0%</h2>

    </div>
    <div id="sniffing-logs">
        <h2>Packet Sniffing Logs:</h2>
        <ul id="logs-list"></ul>
    </div>
    <br>
    <button style="display: none" id="btnProceed1" class="btn btnProceed"
        onclick='window.location = "/detections?fromLoading=true" '>Proceed</button>

    <button style="display: none" id="btnShowAgain" onclick="animatePreload()">Show Again</button>




    <!-- jQuery -->
    <script src="assets/js/jquery-2.1.0.min.js"></script>

    <!-- Bootstrap -->
    <script src="assets/js/popper.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

    <!-- Plugins -->
    <script src="assets/js/owl-carousel.js"></script>
    <script src="assets/js/scrollreveal.min.js"></script>
    <script src="assets/js/waypoints.min.js"></script>
    <script src="assets/js/jquery.counterup.min.js"></script>
    <script src="assets/js/imgfix.min.js"></script>

    <!-- Global Init -->
    <script src="assets/js/custom2.js"></script>
    <div class="modal fade " id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="logoutModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="/logout" method="GET" autocomplete="off">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <p>
                                <h5><b>Are You Sure You Want To Logout?</b></h5>
                                </p>
                            </div>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btnWhite" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success btnWhite" name="btnLogin" value="yes">Yes,
                            Proceed</button>

                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        var filename = `<?php echo $uuid; ?>`;
        var fetchLogId = setInterval(() => {
            fetch(`http://10.0.2.15:5000/check?filename=${filename}`)
                .then(response => {
                    if (response.ok) {
                        return response.json();
                    } else {
                        throw new Error('Network response was not ok.');
                    }
                })
                .then(data => {
                    const scanEnded = data.scan_ended;
                    if (scanEnded !== undefined) {
                        console.log('Scan Ended:', scanEnded);
                        // You can use the value of scanEnded here
                        if (scanEnded) {
                            clearInterval(fetchLogId);
                            setTimeout(() => {
                                simulateProgress();
                                animatePreload();
                            }, 1000);
                        } else {

                        }
                    } else {
                        console.log('scan_ended field not found in response.');
                    }
                })
                .catch(error => {
                    console.error('There was a problem with the fetch operation:', error);
                    setTimeout(() => {
                        simulateProgress();
                        animatePreload();
                    }, 2000);
                });
        }, 5000);
    </script>

    <script>
        const progressBar = document.getElementById('progress-bar');

        function animatePreload() {
            console.log("clicked");
            var preloader = document.getElementById("preloader");
            var opacity = 1;
            var intervalId = setInterval(function() {
                if (opacity <= 0) {
                    clearInterval(intervalId);
                    preloader.style.opacity = 0;
                } else {
                    opacity -= 0.01; // Adjust decrement value as needed

                }
            }, 10); // Adjust interval duration as needed
        }

        function animateScanningText() {
            console.log("clicked");
            var scanningText = document.getElementById("scanningText");
            var opacity = 0;
            var fadeIn = true;
            var preloader = document.getElementById("preloader");
            var intervalId = setInterval(function() {
                if (fadeIn) {
                    opacity += 0.01; // Adjust increment value as needed
                    if (opacity >= 1) {
                        fadeIn = false;
                    }
                } else {
                    opacity -= 0.01; // Adjust decrement value as needed
                    if (opacity <= 0) {
                        fadeIn = true;
                    }
                }

                if (preloader.style.opacity === 0) {
                    console.log("turn off")
                    clearInterval(intervalId);
                }


                scanningText.style.opacity = opacity;
            }, 30); // Adjust interval duration as needed
        }
        async function simulateProgress() {
            let width = 0;
            // const logs = await fetchLogs();
            // if (!logs) {
            //     logs = await fetchLogs();
            // }
            const results = document.getElementById("results");
            const logsList = document.getElementById('logs-list');
            const btn = document.getElementById('btnProceed1');

            const interval = setInterval(() => {
                width += Math.random() * 10;
                if (width >= 100) {
                    clearInterval(interval);
                    results.innerHTML = "<h2>Processing Results: 100%</h2>";
                    // Show packet sniffing logs after progress completion
                    // document.getElementById('sniffing-logs').classList.add('show');
                    // setTimeout(() => {
                    //     window.location = "/detections?fromLoading=true";
                    // }, 2500);
                    progressBar.style.width = '100%';
                    btn.style.opacity = "100%";
                    var btnProceed1 = document.getElementById("btnProceed1");
                    btnProceed1.click();
                } else {
                    progressBar.style.width = width + '%';
                    results.innerHTML = "<h2>Processing Results: " + width.toFixed(2) + "%</h2>";
                    // Generate logs
                    // const log = logs[Math.floor(Math.random() * logs.length)]; // Pick a random log
                    // const log = logs[logs.length - 1]; // Pick a random log
                    // if (log) {
                    //     const li = document.createElement('li');
                    //     li.textContent = log;
                    //     li.classList.add('log-item');
                    //     logsList.appendChild(li);
                    //     // Trigger animation by adding show class
                    //     setTimeout(() => {
                    //         li.classList.add('show');
                    //     }, 10);
                    // }
                }
            }, 300);
        }
        animateScanningText();
    </script>


    @include('modals.success')
    @include('modals.error')
    @if (session()->pull('successLogin'))
        <script>
            setTimeout(() => {
                document.getElementById('successMsg').innerHTML = "Successfully Login";
                document.getElementById('btnSuccessModal').click();
                setTimeout(() => {
                    document.getElementById('btnCloseSuccessModal').click();
                }, 1200);
            }, 500);
        </script>
        {{ session()->forget('successLogin') }}
    @endif

    @if (session()->pull('errorLogin'))
        <script>
            setTimeout(() => {
                document.getElementById('errorMsg').innerHTML = "Wrong Email or Password";
                document.getElementById('btnErrorModal').click();
                setTimeout(() => {
                    document.getElementById('btnCloseErrorModal').click();
                }, 1500);
            }, 500);
        </script>
        {{ session()->forget('errorLogin') }}
    @endif
</body>

</html>
