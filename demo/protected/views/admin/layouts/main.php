<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"/>
    <title>Simpla Admin</title>
    <?php
    /*CSS*/
        $cs=Yii::app()->clientScript;
        $cs->registerCssFile(Yii::app()->request->baseUrl."/css/admin/reset.css");
        $cs->registerCssFile(Yii::app()->request->baseUrl."/css/admin/style.css");
        $cs->registerCssFile(Yii::app()->request->baseUrl."/css/admin/invalid.css");
        $cs->registerCssFile(Yii::app()->request->baseUrl."/css/admin/ie.css");

//        $cs->registerCssFile(Yii::app()->request->baseUrl."/css/admin/red.css");
    /*Javascripts*/
        $cs->registerScriptFile(Yii::app()->request->baseUrl."/js/admin/jquery-1.3.2.min.js");
        $cs->registerScriptFile(Yii::app()->request->baseUrl."/js/admin/simpla.jquery.configuration.js");
        $cs->registerScriptFile(Yii::app()->request->baseUrl."/js/admin/facebox.js");
        $cs->registerScriptFile(Yii::app()->request->baseUrl."/js/admin/jquery.wysiwyg.js");
//        $cs->registerScriptFile(Yii::app()->request->baseUrl."/js/admin/DD_belatedPNG_0.0.7a.js");
    ?>

    <!--<script type="text/javascript">
        DD_belatedPNG.fix('.png_bg, img, li');
    </script>-->
</head>

<body>
<div id="body-wrapper"> <!-- Wrapper for the radial gradient background -->
<div id="sidebar">
    <div id="sidebar-wrapper"> <!-- Sidebar with logo and menu -->
        <h1 id="sidebar-title"><a href="#">Simpla Admin</a></h1>
        <!-- Logo (221px wide) -->
        <a href="#"><img id="logo" src="<?php echo Yii::app()->request->baseUrl; ?>/css/admin/images/logo.png" alt="Simpla Admin logo"/></a>
        <!-- Sidebar Profile links -->
        <div id="profile-links">
            Hello, <a href="#" title="Edit your profile">Admin</a>, you have <a href="#messages" rel="modal"
                                                                                   title="3 Messages">3
            Messages</a><br/>
            <br/>
            <a href="<?php echo Yii::app()->request->baseUrl; ?>" title="View the Site">View the Site</a> | <a href="#" title="Sign Out">Sign Out</a>
        </div>

        <ul id="main-nav">  <!-- Accordion Menu -->
            <li>
                <a href="http://www.google.com" class="nav-top-item no-submenu">
                    <!-- Add the class "no-submenu" to menu items with no sub menu -->
                    Dashboard
                </a>
            </li>
            <li>
                <a href="#" class="nav-top-item current"> <!-- Add the class "current" to current menu item -->
                    Articles
                </a>
                <ul>
                    <li><a href="#">Write a new Article</a></li>
                    <li><a class="current" href="#">Manage Articles</a></li>
                    <!-- Add class "current" to sub menu items also -->
                    <li><a href="#">Manage Comments</a></li>
                    <li><a href="#">Manage Categories</a></li>
                </ul>
            </li>

            <li>
                <a href="#" class="nav-top-item">
                    Pages
                </a>
                <ul>
                    <li><a href="#">Create a new Page</a></li>
                    <li><a href="#">Manage Pages</a></li>
                </ul>
            </li>

            <li>
                <a href="#" class="nav-top-item">
                    Image Gallery
                </a>
                <ul>
                    <li><a href="#">Upload Images</a></li>
                    <li><a href="#">Manage Galleries</a></li>
                    <li><a href="#">Manage Albums</a></li>
                    <li><a href="#">Gallery Settings</a></li>
                </ul>
            </li>

            <li>
                <a href="#" class="nav-top-item">
                    Events Calendar
                </a>
                <ul>
                    <li><a href="#">Calendar Overview</a></li>
                    <li><a href="#">Add a new Event</a></li>
                    <li><a href="#">Calendar Settings</a></li>
                </ul>
            </li>

            <li>
                <a href="#" class="nav-top-item">
                    Settings
                </a>
                <ul>
                    <li><a href="#">General</a></li>
                    <li><a href="#">Design</a></li>
                    <li><a href="#">Your Profile</a></li>
                    <li><a href="#">Users and Permissions</a></li>
                </ul>
            </li>

        </ul>
        <!-- End #main-nav -->

        <div id="messages" style="display: none">
            <!-- Messages are shown when a link with these attributes are clicked: href="#messages" rel="modal"  -->

            <h3>3 Messages</h3>

            <p>
                <strong>17th May 2009</strong> by Admin<br/>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus magna. Cras in mi at felis aliquet
                congue.
                <small><a href="#" class="remove-link" title="Remove message">Remove</a></small>
            </p>

            <p>
                <strong>2nd May 2009</strong> by Jane Doe<br/>
                Ut a est eget ligula molestie gravida. Curabitur massa. Donec eleifend, libero at sagittis mollis,
                tellus est malesuada tellus, at luctus turpis elit sit amet quam. Vivamus pretium ornare est.
                <small><a href="#" class="remove-link" title="Remove message">Remove</a></small>
            </p>

            <p>
                <strong>25th April 2009</strong> by Admin<br/>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus magna. Cras in mi at felis aliquet
                congue.
                <small><a href="#" class="remove-link" title="Remove message">Remove</a></small>
            </p>

            <form action="" method="post">

                <h4>New Message</h4>

                <fieldset>
                    <textarea class="textarea" name="textfield" cols="79" rows="5"></textarea>
                </fieldset>

                <fieldset>

                    <select name="dropdown" class="small-input">
                        <option value="option1">Send to...</option>
                        <option value="option2">Everyone</option>
                        <option value="option3">Admin</option>
                        <option value="option4">Jane Doe</option>
                    </select>

                    <input class="button" type="submit" value="Send"/>

                </fieldset>

            </form>

        </div>
        <!-- End #messages -->

    </div>
</div>
<!-- End #sidebar -->

<div id="main-content"> <!-- Main Content Section with everything -->

<noscript> <!-- Show a notification if the user has disabled javascript -->
    <div class="notification error png_bg">
        <div>
            Javascript is disabled or is not supported by your browser. Please <a href="http://browsehappy.com/"
                                                                                  title="Upgrade to a better browser">upgrade</a>
            your browser or <a href="http://www.google.com/support/bin/answer.py?answer=23852"
                               title="Enable Javascript in your browser">enable</a> Javascript to navigate the interface
            properly.
        </div>
    </div>
</noscript>

<!-- Page Head -->
<h2>Welcome Admin</h2>

<p id="page-intro">What would you like to do?</p>

<!-- End .shortcut-buttons-set -->


<!-- End .clear -->


    <?php echo $content; ?>


    <div class="clear"></div>

<div id="footer">
    <small>
        &#169; Copyright 2009 Simpla Admin | Powered by <a
            href="http://themeforest.net/item/simpla-admin-flexible-user-friendly-admin-skin/46073">Simpla Admin</a> |
        <a href="#">Top</a>
    </small>

</div>
<!-- End #footer -->

</div>
<!-- End #main-content -->

</div>
</body>

</html>
