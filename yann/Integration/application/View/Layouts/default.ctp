<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
$cakeVersion = __d('cake_dev', 'CakePHP %s', Configure::version())
?>
<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <?=  $this->Html->css('bootstrap');?>
    <?=  $this->Html->css('grayscale');?>
    <?=  $this->Html->css('//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css')?>
    <?=  $this->Html->css('animate');?>     
    <?=  $this->fetch('css');?>


    <title>Fédération de pêche des alpes de haute provence</title>


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>


<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">
    <div id="preloader">
        <div id="status"></div>
    </div>
    
    
    <?=  $this->Session->flash();?>
    <?= $this->fetch('content');?>
    <!-- Footer -->
    <footer>
        <div class="container text-center">
            <p>Copyright &copy; <a href="http://peche-alpes-haute-provence.com/">http://peche-alpes-haute-provence.com/</a></p>
        </div>
    </footer>
    <?= $this->Html->script('jquery');?>
    <?= $this->Html->script('bootstrap.min');?>
    <?= $this->Html->script('custom');?>
    <?= $this->Html->script('jquery.easing.min');?>
    <?= $this->Html->script('wow.min');?>
    <?= $this->fetch('script');?>


</body>

</html>


