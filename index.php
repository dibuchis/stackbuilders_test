<?php 
require_once 'vendor/autoload.php';

$loader = new Twig_Loader_Filesystem('views');
$twig = new Twig_Environment($loader);

    //START TEMPLATE
    echo $twig->render('_header.twig');
    
    //MAIN CONTENT
    //echo $twig->render('index.twig', ['content' => "", 'picoplaca' => $picoplaca ]);
    echo $twig->render('index.twig');
    
    //CLOSE TEMPLATE
    echo $twig->render('_footer.twig');