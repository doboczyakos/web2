<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>MVC - PHP</title>
        <!-- <link rel="stylesheet" type="text/css" href="<?php echo SITE_ROOT?>css/main_style.css">    -->
        <?php // if($viewData['style']) echo '<link rel="stylesheet" type="text/css" href="'.$viewData['style'].'">'; ?>
        
        <!-- theme: https://html5up.net/strongly-typed -->
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="<?php echo SITE_ROOT?>assets/css/main.css" />
    </head>

    <body class="homepage is-preload">
        <div id="page-wrapper">

            <section id="header">
                <div class="container">

                    <h1 id="logo"><a >Formula 1 weboldal</a></h1>
                    <p>Keszult a Web-programozas II. tantargy kereretein belul.</p>

                    <div id="user"><em><?= $_SESSION['userlastname']." ".$_SESSION['userfirstname'] ?></em></div>

                    <nav id="nav">
                        <?php echo Menu::getMenu($viewData['selectedItems']); ?>
                    </nav>

                    <!-- <section id="banner">
                        <div class="container">
                            <p><strong>Web-programozás II</strong></p>
                            <p>Formula 1 app</p>
                        </div>
                    </section> -->
                </div>
            </section>

            <section>
                <?php if($viewData['render']) include($viewData['render']); ?>
            </section>


            <section id="footer">
                <div id="copyright" class="container">
                    <ul class="links">
                        <li>&copy; NJE - GAMF - Web2 <?= date("Y") ?> </li>
                    </ul>
                </div>
            </section>

        </div>

		<!-- Scripts -->
        <script src="<?php echo SITE_ROOT?>assets/js/jquery.min.js"></script>
        <script src="<?php echo SITE_ROOT?>assets/js/jquery.dropotron.min.js"></script>
        <script src="<?php echo SITE_ROOT?>assets/js/browser.min.js"></script>
        <script src="<?php echo SITE_ROOT?>assets/js/breakpoints.min.js"></script>
        <script src="<?php echo SITE_ROOT?>assets/js/util.js"></script>
        <script src="<?php echo SITE_ROOT?>assets/js/main.js"></script>
        
    </body>
</html>
