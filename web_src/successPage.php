<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Success</title>
    <style>
        /* Reset some default browser styles */
        body, h1, p {
            margin: 0;
            padding: 0;
            font-family: 'Arial', sans-serif;
        }

        /* Create a full-screen flex container */
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f7f8fc;
        }

        .success-card {
            padding: 20px 40px;
            background-color: #ffffff;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            text-align: center;
        }

        .success-card h1 {
            color: #34a853; /* A pleasant green shade */
            font-size: 2em;
            margin-bottom: 10px;
        }

        .success-card p {
            color: #5c5c5c;
        }

        /* Styling the button */
        .btn {
            display: inline-block;
            background-color: #34a853;
            color: #ffffff;
            padding: 10px 20px;
            margin-top: 20px;
            border-radius: 4px;
            text-decoration: none;
            font-weight: bold;
            transition: background-color 0.3s;
        }

        .btn:hover {
            background-color: #2c8a43;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="success-card">
            <h1>Registration Successful!</h1>
            <p>You are now registered with your Elizabethtown student Id! Feel free to start browsing and take whatever you need. Please make sure to checkout all the items you take!</p>
            <a href="index.php?page=products" class="btn">Start checkout process</a>
        </div>
    </div>
</body>

</html>
