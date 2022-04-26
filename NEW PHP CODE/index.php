<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="nav.css">

    <style>
        #bodyContainer
        {
            background-color: grey;
            /* margin-left: 5%;
            margin-right: 5%; */
            margin-left: 4%;
            width: 90%;
            margin-top: 1.7%;
            background-color:rgb(8, 7, 19);
        }
        #newsANDupdates
        {
            white-space: nowrap;
            background-color: beige;
            border-radius: 25px;
        }
        #news
        {
            margin-top: 1.7%;
            display: inline-block;
            text-align: center;
            /* margin-left: 4.5%;
            margin-right: 0%; */
            width:45%;
            margin-left: 4%;
            font-size: 15px;
            color: white;

            background-color: rgb(5, 60, 150);
            border-radius: 25px;
        }
        #newsUL
        {
            text-align: left;
        }
        #updates
        {
            display: inline-block;
            text-align: center;
            /* margin-right: 0%;
            margin-left: 35%; */
            width:45%;
            font-size: 15px;
            color: white;

            background-color: rgb(5, 60, 150);
            border-radius: 25px;
        }
        #updatesUL
        {
            text-align: left;
        }

        /*CATAGORY CONTAINERS*/
        #imageLinkContainer
        {
            position: static;
            display: block;
            margin: auto;
            width: 100%;
            margin-top: -0%;

            background-color: beige;
            border-radius: 25px;
        }
        #imageLinkOne
        {
            display: block;
            margin: auto;
            max-height: 150px;
            width: 50%;
            /* transform: translate(50%); */
        }
        #imageLinkTwo
        {
            display: block;
            margin:auto;
            max-height: 150px;
            width: 50%;
            /* transform: translate(50%); */
        }
        #imageLinkThree
        {
            display: block;
            margin:auto;
            max-height: 150px;
            width: 50%;
            /* transform: translate(50%); */
        }
        #imageLinkFour
        {
            display: block;
            margin:auto;
            max-height: 150px;
            width: 50%;
            /* transform: translate(50%); */
        }
        


        #truckText
        {
            text-align: center;
            color: Black;
            left: 50%;
        }
        #suvText
        {
            text-align: center;
            color: Black;
            left: 50%;
        }
        #carText
        {
            text-align: center;
            color: Black;
            left: 50%;
        }
        #convertibleText
        {
            text-align: center;
            color: Black;
            left: 50%;
        } 


        .image 
        {
            border-radius: 25px;
            padding: 10px 10px;
        }

    </style>
    <title>index</title>
</head>
<header>
    <h1 id="navH1">Pseudo<span>Motors</h1>
    <nav id="navbar">
        <ul id="navUl">
            <li id="navLi"><a id="navA" href="index.php">Home</a></li>
            <li id="navLi"><a id="navA" href="browse.php">Browse</a></li>
            <li id="navLi"><a id="navA" href="cart.php">Cart</a></li>
            <li id="navLi"><a id="navA" href="account.php">Account</a></li>
            <li id="navLi"><a id="navA" href="about.php">About</a></li>
            <li id="navLi"><a id="navA" href="signup.php">Signup</a></li>
            <li id="navLi"><a id="navA" href="login.php">Login</a></li>
        </ul>
    </nav>
</header>
<body>
    <br>
    <br>
    <hr>
    <div id="bodyContainer">
        <div id="newsANDupdates">
            <div id="news">
                <h3>NEWS<h3>
                    <hr>
                    <ul id="newsUL">
                        <li>Scenic Test Drives NOW Offered</li>
                        <li>Added New 2022 SUVS!</li>
                        <li>Competitive QUOTES Daily</li>
                        <li>SPRING SALE IN EFFECT!</li>
                    </ul>
            </div>
            <div id="updates">
                <h3>NEWS<h3>
                    <hr>
                    <ul id="updatesUL">
                        <li>Scenic Test Drives NOW Offered</li>
                        <li>Added New 2022 SUVS!</li>
                        <li>Competitive QUOTES Daily</li>
                        <li>SPRING SALE IN EFFECT!</li>
                    </ul>
            </div>
            <br>
            <br>
        </div>


<br>


        <div id="imageLinkContainer">
        
            <div class="imageLinks">
                <a href="##########">
                    <div class="textContainer">
                        <img class="image" id="imageLinkTwo" src="logImage.jpg" alt="Catagory Name HERE" title="TRUCKS">
                        <div id="suvText" class="textCentered">SUVS</div>
                    </div>
                </a>
            </div>


            <hr>


            <div class="imageLinks">
                <a href="##########">
                    <div class="textContainer">
                        <img class="image" id="imageLinkTwo" src="logImage.jpg" alt="Catagory Name HERE" title="TRUCKS">
                        <div id="truckText" class="textCentered">TRUCKS</div>
                    </div>
                </a>
            </div>


            <hr>


            <div class="imageLinks">
                <a href="##########">
                    <div class="textContainer">
                        <img class="image" id="imageLinkTwo" src="logImage.jpg" alt="Catagory Name HERE" title="CARS">
                        <div id="carText" class="textCentered">CARS</div>
                    </div>
                </a>
            </div>


            <hr>

            
            <div class="imageLinks">
                <a href="##########">
                <div class="textContainer">
                        <img class="image" id="imageLinkTwo" src="logImage.jpg" alt="Catagory Name HERE" title="CONVERTIBLES">
                        <div id="convertibleText" class="textCentered">CONVERTIBLES</div>
                    </div>
                </a>
            </div>

            <br>

        </div>
    </div>
    <p style="color:white;">Hello<p>
    <span id="testerSpan"></span>
</body>
</html>