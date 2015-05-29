<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title></title>
    <style>

        #wrapper {
            width: 1000px;
            margin: auto;
            /*border: 1px solid black;*/
        }

        header {
            background: linear-gradient(90deg, #4ec7ff, rgba(255, 237, 36, 0.66), rgba(72, 195, 29, 0.46)) repeat-x;
        }

        h1 {
            border-bottom: 3px solid darkblue;
        }

        nav {
            float: left;
            margin-left: 20px;
        }

        nav ul {
            padding-left: 0;
        }

        nav li {
            list-style: none;
            margin: 30px 0;
            font-size: 1.3em;
            font-weight: bold;
            text-align: center;
            background-color: rgba(255, 68, 82, 0.60);
            padding: 10px 40px;
            border-radius: 10px;

            transition: background-color , color, 0.4s;
        }


        nav a {
            text-decoration: none;
        }
        nav li:hover{
            background-color: #e9e9e9;
            box-shadow: 3px 3px 10px #888888;
            color: red;
        }

        #catalog {
            text-align: center;
            width: 800px;
            margin: auto;
            float: right;
            /*border: 1px solid black;*/
        }

        #catalog img {
            width: 200px;
            display: inline-block;
            margin: 30px 80px;
            box-shadow: 5px 5px 10px #888888;
            border-radius: 20px;
            transition: scale, 0.5s;

        }

        #catalog img:hover {
            transform: scale(1.2, 1.2);
        }

        footer {
            text-align: center;
            clear: both;
            position: relative;
            top: 50px;
            /*border: 1px solid black;*/
        }
    </style>
</head>
<body>
<div id="wrapper">
    <header>
        <h1>Cours d'informatique en ligne</h1>
    </header>
    <nav>
        <ul>
            <a href="">
                <li>Accueil</li>
            </a>
            <a href="">
                <li>Mes cours</li>
            </a>
            <a href="">
                <li>S'inscrire</li>
            </a>
            <a href="">
                <li>Contact</li>
            </a>
        </ul>

    </nav>

    <div id="catalog">
        <a href="#"><img src="img/cloud_computing.jpg" alt="cloud"></a>
        <a href="#"><img src="img/front_end.jpg" alt="front"></a>
        <a href="#"><img src="img/ios.jpg" alt="front"></a>
        <a href="#"><img src="img/java.jpg" alt="front"></a>
    </div>
    <footer>
        <p>footer footer footer footer footer footer footer footer</p>
    </footer>
</div>
</body>
</html>
