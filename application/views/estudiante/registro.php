

<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta charset="utf-8" />
        <title></title>
    </head>
    <style>
        #menu{
            width: 100%;
            height :5%;
            overflow: hidden;
            position: absolute;left:0; top: 175;
            background-color:#f9875c;

        }
        .nav{
            position: absolute;top: 0;
        }
        .nav li{
            margin-bottom: 15px;
        }

        .nav li a{

            text-align: center;
            background-color:#f9875c;
            color:#00004d;
            text-decoration: none;
            padding: 0px 15px;
            display: block;
            width:450px;
        }

        .nav > li {

            float:left;

        }

        ul, ol {

            list-style:none;

        }

        .nav li a:hover{
            background-color:#e56b45;
        }
        body{
            background-color:#00004d;

        }

        .e{
            display:block;
            margin:auto;
            margin-top: 20px;
        }
    </style>
    <body>
        <img src="https://i.imgur.com/fbVfWl9.png" class="e">
            <div id="menu">
                <ul class="nav">
                    <li><a href="#">Inicio</a></li>
                    <li><a href="#">Clases</a></li>
                    <li><a href="#">Actividades</a></li>
                </ul>
            </div>
    </body>
</html>
