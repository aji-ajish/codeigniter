<!DOCTYPE html>
<html>

<head>
    <title>404 Page Not Found</title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="style.css">
    <style>
        body {
            margin: 0;
            padding: 0;
            background-color: #f2f2f2;
            font-family: 'Montserrat', sans-serif;
        }

        .error-page {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .error-code {
            font-size: 10rem;
            font-weight: 700;
            color: #2c3e50;
            text-shadow: 2px 2px #ecf0f1;
        }

        .error-message {
            font-size: 3rem;
            font-weight: 400;
            color: #34495e;
            text-shadow: 2px 2px #ecf0f1;
            margin-bottom: 50px;
        }

        .back-home-btn {
            display: inline-block;
            background-color: #2c3e50;
            color: #fff;
            font-size: 1.2rem;
            font-weight: 700;
            padding: 15px 30px;
            border-radius: 5px;
            text-transform: uppercase;
            text-decoration: none;
            transition: background-color 0.2s ease-out;
        }

        .back-home-btn:hover {
            background-color: #34495e;
            color: #fff;
        }
    </style>
</head>

<body>
    <div class="error-page">
        <div class="error-code">404</div>
        <div class="error-message">Oops! Page Not Found</div>
        <a href="#" onclick="window.history.back();" class="back-home-btn">Go Back Home</a>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/3.2.1/anime.min.js"></script>
    <script src="app.js"></script>
    <script>
        // Animate the error code on page load
        anime({
            targets: '.error-code',
            translateX: [-100, 0],
            opacity: [0, 1],
            duration: 1500,
            easing: 'easeOutExpo'
        });

        // Animate the error message on page load
        anime({
            targets: '.error-message',
            translateX: [100, 0],
            opacity: [0, 1],
            duration: 1500,
            easing: 'easeOutExpo',
            delay: 500
        });

        // Animate the back home button on page load
        anime({
            targets: '.back-home-btn',
            translateY: [100, 0],
            opacity: [0, 1],
            duration: 1500,
            easing: 'easeOutExpo',
            delay: 1000
        });
    </script>
</body>

</html>