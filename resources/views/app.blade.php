<html>
<head>
    <title>Karesepan App</title>
    <link rel="icon" type="image/png" href="../assets/img/white_logo.png">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/style.css">
        <!-- CSRF Token -->
    @laravelPWA
</head>
<body>
    @yield('content')
</body>
<script>
    if ('serviceWorker' in navigator) {
        navigator.serviceWorker.register('/serviceworker.js', {
            scope: '.'
        }).then(function (registration) {
            console.log('Laravel PWA: ServiceWorker registration successful with scope: ', registration.scope);
        }, function (err) {
            console.log('Laravel PWA: ServiceWorker registration failed: ', err);
        });
    }
</script>  
</html>   