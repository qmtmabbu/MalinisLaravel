<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Malinis</title>
    <link rel="stylesheet" href="./reg/material-design-iconic-font.min.css">
    <link rel="icon" href="/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="./reg/style.css">
    <meta name="robots" content="noindex, follow">
    <script type="text/javascript" async src="./reg/analytics.js.download" nonce="db7c44e5-7e9b-4a62-af68-1e7998f39342">
    </script>
    <script defer referrerpolicy="origin" src="./reg/s.js.download"></script>
    <script nonce="db7c44e5-7e9b-4a62-af68-1e7998f39342">
        (function(w, d) {
            ! function(dK, dL, dM, dN) {
                dK[dM] = dK[dM] || {};
                dK[dM].executed = [];
                dK.zaraz = {
                    deferred: [],
                    listeners: []
                };
                dK.zaraz.q = [];
                dK.zaraz._f = function(dO) {
                    return function() {
                        var dP = Array.prototype.slice.call(arguments);
                        dK.zaraz.q.push({
                            m: dO,
                            a: dP
                        })
                    }
                };
                for (const dQ of ["track", "set", "debug"]) dK.zaraz[dQ] = dK.zaraz._f(dQ);
                dK.zaraz.init = () => {
                    var dR = dL.getElementsByTagName(dN)[0],
                        dS = dL.createElement(dN),
                        dT = dL.getElementsByTagName("title")[0];
                    dT && (dK[dM].t = dL.getElementsByTagName("title")[0].text);
                    dK[dM].x = Math.random();
                    dK[dM].w = dK.screen.width;
                    dK[dM].h = dK.screen.height;
                    dK[dM].j = dK.innerHeight;
                    dK[dM].e = dK.innerWidth;
                    dK[dM].l = dK.location.href;
                    dK[dM].r = dL.referrer;
                    dK[dM].k = dK.screen.colorDepth;
                    dK[dM].n = dL.characterSet;
                    dK[dM].o = (new Date).getTimezoneOffset();
                    if (dK.dataLayer)
                        for (const dX of Object.entries(Object.entries(dataLayer).reduce(((dY, dZ) => ({
                                ...dY[1],
                                ...dZ[1]
                            })), {}))) zaraz.set(dX[0], dX[1], {
                            scope: "page"
                        });
                    dK[dM].q = [];
                    for (; dK.zaraz.q.length;) {
                        const d_ = dK.zaraz.q.shift();
                        dK[dM].q.push(d_)
                    }
                    dS.defer = !0;
                    for (const ea of [localStorage, sessionStorage]) Object.keys(ea || {}).filter((ec => ec
                        .startsWith("_zaraz_"))).forEach((eb => {
                        try {
                            dK[dM]["z_" + eb.slice(7)] = JSON.parse(ea.getItem(eb))
                        } catch {
                            dK[dM]["z_" + eb.slice(7)] = ea.getItem(eb)
                        }
                    }));
                    dS.referrerPolicy = "origin";
                    dS.src = "/cdn-cgi/zaraz/s.js?z=" + btoa(encodeURIComponent(JSON.stringify(dK[dM])));
                    dR.parentNode.insertBefore(dS, dR)
                };
                ["complete", "interactive"].includes(dL.readyState) ? zaraz.init() : dK.addEventListener(
                    "DOMContentLoaded", zaraz.init)
            }(w, d, "zarazData", "script");
        })(window, document);
    </script>
    <script type="text/javascript" src="./reg/security.js.download"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sen:wght@600&display=swap" rel="stylesheet">
    <style>
        body {
            background: green;
            font-family: 'Sen', sans-serif;
        }
    </style>
</head>

<body>

    <div class="wrapper">
        <div class="image-holder">
            <img src="./landing.jpg" alt>
        </div>
        <div class="form-inner">
            <form action="/login" method="POST" class="has-validation-callback" autocomplete="off">
                @csrf
                <div class="form-header">
                    <h3 style="font-size: 56px !important;">Sign in</h3>
                    <h3>Welcome!</h3>
                </div>
                <div class="form-group">
                    <input class="form-control" required type="email" name="email" id=""
                        placeholder="Email">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" data-validation="length" data-validation-length="min8"
                        placeholder="Password" name="password">
                </div>
                <button class="btn btn-success" style="border-radius: 20px;" type="submit" name="btnLogin"
                    value="true">Login</button>
                <h6 class="h6Style">Don't Have An Account Yet?</h6>
                <a href="#" style="text-decoration: none;cursor: pointer;" data-bs-target="#signUpModal"
                    data-bs-toggle="modal">
                    <p class="pStyle">Create an account</p>
                </a>
            </form>
        </div>
    </div>

    <div class="modal fade " id="signUpModal" tabindex="-1" role="dialog" aria-labelledby="signUpModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="signUpModalLabel">Signup</h5>
                </div>
                <form action="/signup" method="POST" enctype="multipart/form-data" autocomplete="off"
                    class="has-validation-callback">
                    @csrf
                    <div class="modal-body">
                        <div class="row">

                            <div class="col-lg-12">
                                <div class="form-group">
                                    <input required class="form-control" type="text" name="firstName" id="fn"
                                        placeholder="First Name">
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
                                    <input required class="form-control" type="email" name="email" id="un"
                                        placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <input required class="form-control" type="password" name="password"
                                        id="pw" placeholder="Password" data-validation="length"
                                        data-validation-length="min8">
                                </div>

                                <div class="form-group">
                                    <input required class="form-control" type="password" name="confirmPass"
                                        id="pw" placeholder="Confirm Password" data-validation="length"
                                        data-validation-length="min8">
                                </div>

                            </div>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success" name="btnSignup"
                            value="yes">Signup</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="./reg/jquery-3.3.1.min.js.download"></script>
    <script src="./reg/jquery.form-validator.min.js.download"></script>
    <script src="./reg/main.js.download"></script>

    <script async src="./reg/js"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-23581568-13');
    </script>
    <script defer src="./reg/v52afc6f149f6479b8c77fa569edb01181681764108816"
        integrity="sha512-jGCTpDpBAYDGNYR5ztKt4BQPGef1P0giN6ZGVUi835kFF88FOmmn8jBQWNgrNd8g/Yu421NdgWhwQoaOPFflDw=="
        data-cf-beacon="{&quot;rayId&quot;:&quot;7d8854a6c9b82f10&quot;,&quot;token&quot;:&quot;cd0b4b3a733644fc843ef0b185f98241&quot;,&quot;version&quot;:&quot;2023.4.0&quot;,&quot;si&quot;:100}"
        crossorigin="anonymous"></script>

    @include('modals.success2')
    @include('modals.error2')

    @if (session()->pull('errorPassNotMatch'))
        <script>
            setTimeout(() => {
                document.getElementById('errorMsg').innerHTML = "Password Doesn't Match";
                document.getElementById('btnErrorModal').click();
                setTimeout(() => {
                    document.getElementById('btnCloseErrorModal').click();
                }, 1500);
            }, 500);
        </script>
        {{ session()->forget('errorPassNotMatch') }}
    @endif



    @if (session()->pull('errorLogin'))
        <script>
            setTimeout(() => {
                document.getElementById('errorMsg').innerHTML = "Wrong Email or Password";
                document.getElementById('btnErrorModal').click();
                setTimeout(() => {
                    document.getElementById('btnCloseErrorModal').click();
                }, 500);
            }, 500);
        </script>
        {{ session()->forget('errorLogin') }}
    @endif

    @if (session()->pull('successCreate'))
        <script>
            setTimeout(() => {
                document.getElementById('successMsg').innerHTML = "Successfully Created Account";
                document.getElementById('btnSuccessModal').click();
                setTimeout(() => {
                    document.getElementById('btnCloseSuccessModal').click();
                }, 500);
            }, 500);
        </script>
        {{ session()->forget('successCreate') }}
    @endif

    @if (session()->pull('successLogout'))
        <script>
            setTimeout(() => {
                document.getElementById('successMsg').innerHTML = "Successfully Logout";
                document.getElementById('btnSuccessModal').click();
                setTimeout(() => {
                    document.getElementById('btnCloseSuccessModal').click();
                }, 500);
            }, 500);
        </script>
        {{ session()->forget('successLogout') }}
    @endif
</body>

</html>
