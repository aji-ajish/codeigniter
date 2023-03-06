<!DOCTYPE html>
<html>

<head>
    <title>My Awesome Page</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <style>
        /* Global styles */

        body {
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            font-size: 16px;
            line-height: 1.5;
            color: #333;
            background-color: #fff;
        }

        /* Header styles */

        header {
            background-color: #333;
            color: #fff;
            padding: 20px;
        }

        header h1 {
            margin: 0;
            font-size: 36px;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 2px;
        }

        nav ul {
            margin: 0;
            padding: 0;
            list-style: none;
        }

        nav li {
            display: inline-block;
            margin-right: 20px;
        }

        nav li:last-child {
            margin-right: 0;
        }

        nav a {
            display: block;
            padding: 10px;
            color: #fff;
            text-decoration: none;
            text-transform: uppercase;
            letter-spacing: 2px;
            font-size: 14px;
            transition: all 0.3s ease-in-out;
        }

        nav a:hover {
            background-color: #fff;
            color: #333;
        }

        /* Main content styles */

        main {
            padding: 20px;
            max-width: 800px;
            margin: 0 auto;
        }

        section {
            margin-bottom: 40px;
        }

        section h2 {
            font-size: 28px;
            margin-bottom: 20px;
            text-transform: uppercase;
            letter-spacing: 2px;
        }

        ul {
            margin: 0;
            padding: 0;
            list-style: none;
        }

        li {
            margin-bottom: 10px;
        }

        a {
            color: #333;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        /* Footer styles */

        footer {
            background-color: #333;
            color: #fff;
            padding: 20px;
            text-align: center;
        }

        footer p {
            margin: 0;
            font-size: 14px;
            text-transform: uppercase;
            letter-spacing: 2px;
        }
    </style>
</head>

<body>
    <header>
        <h1>Welcome to Thirukural page!</h1>
        <nav>
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#">About</a></li>
                <li><a href="#">Contact</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <section>
            <h2>Home</h2>
            <p></p>
        </section>

        <section>
            <h2>Thirukural</h2>
            <table style="border: 1px #333 solid;">
                <thead>
                    <th style="border-bottom: 1px #333 solid;">Heading</th>
                    <th style="border-bottom: 1px #333 solid;">Name</th>
                </thead>
                <tbody>
                    <tr>
                        <td style="border-bottom: 1px #333 solid;">குறள் :</td>
                        <td style="border-bottom: 1px #333 solid;"><?= $thirukural_data['no'] ?></td>
                    </tr>
                    <tr>
                        <td style="border-bottom: 1px #333 solid;">பால் :</td>
                        <td style="border-bottom: 1px #333 solid;"><?= $thirukural_data['paal'] ?></td>
                    </tr>
                    <tr>
                        <td style="border-bottom: 1px #333 solid;">திருக்குறள் :</td>
                        <td style="border-bottom: 1px #333 solid;"><?= $thirukural_data['line1'] ?> <br><?= $thirukural_data['line2'] ?></td>
                    </tr>
                    <tr>
                        <td>திருக்குறள் Explane:</td>
                        <td><?= $thirukural_data['tam_exp'] ?></td>
                    </tr>
                </tbody>
            </table>

        </section>
    </main>

    <footer>
        <p>&copy; 2023 John Doe. All rights reserved.</p>
    </footer>

    <script src="script.js"></script>
</body>

</html>