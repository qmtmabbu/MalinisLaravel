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

        .rowBlue2 {
            background-color: #2c7249 !important;
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
                        <a href="#" class="logo" style="color: white !important;">MALINIS</a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav" style="color: white !important;">
                            <li class="scroll-to-section"><a href="/">Home</a></li>
                            <li class="scroll-to-section"><a href="/detections" class="active">Detections</a></li>
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




    <section class="section rowBlue2" id="about">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card mb-4">
                        <div class="card-header">
                            <h2>Detection Lists</h2>
                        </div>
                        <div class="card-header">
                            <form action="/adminusers" method="get">
                                <div class="input-group mb-3">
                                    <input type="search" class="form-control" placeholder="Search Malware Name"
                                        aria-describedby="basic-addon2" name="search">
                                    <button type="submit" class="input-group-text" id="basic-addon2">Search</button>
                                </div>
                            </form>
                        </div>
                        <div class="card-body">
                            <br>
                            <div class="table-responsive">
                                <table class="table border mb-0">
                                    <thead class="table-light fw-semibold">
                                        <tr class="align-middle">
                                            <th>
                                                Scan Date
                                            </th>
                                            <th>
                                                Malware Name
                                            </th>
                                            <th>
                                                Affected
                                            </th>
                                            <th>
                                                Action
                                            </th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($detections as $item)
                                            <tr>
                                                <td>{{ date('Y-m-d h:i a', strtotime($item['created_at'])) }}</td>
                                                <td>{{ $item['malwareName'] }}</td>
                                                <td title="{{$item['affected']}}">{{ strlen($item['affected']) > 8 ? substr($item['affected'], 0, 13) . '...' : $item['affected'] }}</td>
                                                <td>
                                                    <a class="btn btn-success" target="_blank"
                                                        href="http://10.0.2.15:5000/image/{{ $userid }}">View
                                                        Raw Images</a>
                                                    @if ($item['malwareName'] != 'None' && $item['status']=="")
                                                        <button class="btn btn-danger"
                                                            data-target="#quarantineModal{{ $item['detectionID'] }}"
                                                            data-toggle="modal">Quarantine</button>
                                                        <div class="modal fade "
                                                            id="quarantineModal{{ $item['detectionID'] }}"
                                                            tabindex="-1" role="dialog"
                                                            aria-labelledby="quarantineModalLabel{{ $item['detectionID'] }}"
                                                            aria-hidden="true">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <form action="/detections/disconnect" method="POST"
                                                                        enctype="multipart/form-data"
                                                                        autocomplete="off">
                                                                        @csrf
                                                                        <div class="modal-body" >
                                                                            <div class="row">

                                                                                <div class="form-group">
                                                                                    <h6 style="margin: 15px">If Quarantine, Computer will be
                                                                                        disconnected from network. Do
                                                                                        you want to proceed?</h6>
                                                                                </div>

                                                                            </div>
                                                                            <input type="hidden" name="id" value="{{$item['detectionID']}}">
                                                                            <input type="hidden" name="path" value="{{$item['affected']}}">
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button"
                                                                                class="btn btn-secondary"
                                                                                data-dismiss="modal">Close</button>
                                                                            <button type="submit"
                                                                                class="btn btn-primary"
                                                                                name="btnQuarantine"
                                                                                value="yes">Yes, Proceed</button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                            </div>
                        </div>
                        <div class="card-footer"></div>
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
    <!-- ***** Features Big Item End ***** -->





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
    @include('modals.success')
    @include('modals.error')
    @if (session()->pull('noDetections'))
        <script>
            setTimeout(() => {
                document.getElementById('successMsg').innerHTML = "No Detected Malware";
                document.getElementById('btnSuccessModal').click();
                setTimeout(() => {
                    document.getElementById('btnCloseSuccessModal').click();
                }, 1200);
            }, 500);
        </script>
        {{ session()->forget('noDetections') }}
    @endif
    @if (session()->pull('successQuarantine'))
        <script>
            setTimeout(() => {
                document.getElementById('successMsg').innerHTML = "Successfully Quarantined Malware";
                document.getElementById('btnSuccessModal').click();
                setTimeout(() => {
                    document.getElementById('btnCloseSuccessModal').click();
                }, 1200);
            }, 500);
        </script>
        {{ session()->forget('successQuarantine') }}
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
