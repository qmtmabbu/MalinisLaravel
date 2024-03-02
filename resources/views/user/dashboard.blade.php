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
            font-family: 'Sen', sans-serif;
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
    </style>
    <link rel="stylesheet" href="/assets/css/ownstyle.css">
</head>

<body>

    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
    <!-- ***** Preloader End ***** -->


    <!-- ***** Header Area Start ***** -->
    <header class="header-area header-sticky background-header">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                        <a href="/" class="logo" style="color: white !important;">MALINIS</a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav" style="color: white !important;">
                            <li class="scroll-to-section"><a href="/" class="active">Home</a></li>
                            <li class="scroll-to-section"><a href="/detections">Detections</a></li>
                            <li><a data-toggle="modal" data-target="#logoutModal"
                                    class="cursorPoint decorationNone">Logout</a></li>

                        </ul>
                        <a class='menu-trigger'>
                            <span>Menu</span>
                        </a>
                        <!-- ***** Menu End ***** -->
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ***** Header Area End ***** -->

    <br>
    <br>
    <br>
    <!-- ***** Welcome Area End ***** -->


    <!-- ***** Features Big Item Start ***** -->
    <section class="section" id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 col-md-12 col-sm-12"
                    data-scroll-reveal="enter left move 30px over 0.6s after 0.4s">
                    <img src="/logo.png" class="rounded img-fluid d-block mx-auto" alt="App">
                </div>
                <div class="right-text col-lg-5 col-md-12 col-sm-12 mobile-top-fix">
                    <div class="left-heading">
                        <h5>MALINIS: Pioneering Cybersecurity Solutions</h5>
                    </div>
                    <div class="left-text">
                        <p>Your On-the-Fly Malware Detection Partner. MALINIS may be new on the scene, but our
                            commitment to protecting your digital world is unwavering. Our website is designed to
                            provide real-time malware detection for your computer, ensuring your online experience is
                            secure. With MALINIS, you can browse and work with confidence, knowing that our
                            cutting-edge technology is at your service. We're dedicated to making malware concerns a
                            thing of the past and ensuring that your digital life stays malware-free.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="hr"></div>
                </div>
            </div>
        </div>
    </section>

    <section class="section rowBlue" id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 fullWidth">
                    <label for="directory" class="btnWhite">
                        <h3>Scan Your Desktop Now</h3>
                    </label>
                    <center>
                        {{-- <input type="text" name="directory" id="" class="form-control"
                            placeholder="Type your directory you want to scan"> --}}
                        <a href="/scan" class="btn btn-success mt-3 fullWidth">Start Scan</a>
                    </center>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="hr"></div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Features Big Item End ***** -->

    <section class="section" id="sniff">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <br>
                    <h2>Network Traffic</h2>
                    <div class="col-lg-12" id="sniffData"></div>
                </div>
            </div>
        </div>
    </section>




    <!-- ***** Footer Start ***** -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-7 col-md-12 col-sm-12">
                    <p class="copyright">Copyright &copy; 2024</p>
                </div>
                <div class="col-lg-5 col-md-12 col-sm-12">
                    <ul class="social">
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                        <li><a href="#"><i class="fa fa-rss"></i></a></li>
                        <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>

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
    <script src="assets/js/custom.js"></script>
    <div class="modal fade " id="signUpModal" tabindex="-1" role="dialog" aria-labelledby="signUpModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="signUpModalLabel">Signup</h5>
                </div>
                <form action="/signup" method="POST" enctype="multipart/form-data" autocomplete="off">
                    @csrf
                    <div class="modal-body">
                        <div class="row">

                            <div class="col-lg-12">
                                <div class="form-group">
                                    <input required class="form-control" type="text" name="firstName"
                                        id="fn" placeholder="First Name">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" type="text" name="middleName" id="mn"
                                        placeholder="Middle Name">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" type="text" name="lastName" id="ln"
                                        placeholder="Last Name">
                                </div>
                                <div class="form-group">
                                    <textarea required class="form-control" name="address" id="" cols="10" rows="3"
                                        placeholder="Address"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="birthDate" class="for"
                                        style="float:left;margin-bottom: 10px;">Birth
                                        Date</label>
                                    <input required type="date" name="birthDate" id=""
                                        class="form-control">
                                </div>
                                <div class="form-group">
                                    <input required type="number" name="phoneNumber" id=""
                                        class="form-control" placeholder="Phone Number">
                                </div>
                                <div class="form-group">
                                    <input required class="form-control" type="email" name="email"
                                        id="un" placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <input required class="form-control" type="password" name="password"
                                        id="pw" placeholder="Password">
                                </div>

                            </div>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" name="btnSignup"
                            value="yes">Signup</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
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
        // Fetch sniff data every 1 minute
        setInterval(fetchSniffData, 60000);
        fetchSniffData();

        function fetchSniffData() {
            fetch('http://192.168.137.215:5000/sniff')
                .then(response => response.text())
                .then(data => {
                    updateSniffData(data);
                })
                .catch(error => console.error('Error fetching sniff data:', error));
        }

        function updateSniffData(sniffData) {
            var sniffContainer = document.getElementById('sniffData');
            // Clear the existing sniff data
            sniffContainer.innerHTML = '';

            // Split the sniff data by new lines
            var sniffList = sniffData.split('\n');

            // Sort the sniff data by date
            sniffList.sort(function(a, b) {
                var dateA = getDateFromSniff(a);
                var dateB = getDateFromSniff(b);
                return dateB - dateA;
            });

            // Get only the top 20 items of the sniff data
            var top20Sniff = sniffList.slice(0, 20);

            // Create a new list item for each sniff item and append it to the container
            top20Sniff.forEach(function(sniffItem, index) {
                var listItem = document.createElement('li');
                var mItem = sniffItem.replace(";;", "- ");
                var pTypeSlice = mItem.split("|||");
                let prefix = "";
                if (pTypeSlice[0] === "Packet Type: No Raw Layer") {
                    prefix = pTypeSlice[0] + ", ";
                } else if (pTypeSlice[0] === "Packet Type: Non-Image") {
                    prefix = `<span style="color: blue !important;">${pTypeSlice[0]}</span>, `;
                } else if (pTypeSlice[0] === "Packet Type: Image") {
                    prefix = `<span style="color: green !important;">${pTypeSlice[0]}</span>, `;
                }
                let whole = prefix + pTypeSlice[1];
                listItem.innerHTML = whole;
                listItem.classList.add('sniff-item');
                listItem.style.transitionDelay = (index * 0.5) + 's';
                sniffContainer.appendChild(listItem);

                // Triggering reflow to restart animation
                void listItem.offsetWidth;
                listItem.style.opacity = 1;
            });
        }

        function getDateFromSniff(sniffLine) {
            var parts = sniffLine.split(';;');
            var dateString = parts[1];
            return new Date(dateString);
        }
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
