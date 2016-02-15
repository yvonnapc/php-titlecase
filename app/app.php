<?php
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/TitleCaseGenerator.php";

    $app = new Silex\Application();

    $app->register(new Silex\Provider\TwigServiceProvider(), array(
        'twig.path' => __DIR__.'/../views'
    ));

    $app->get("/", function() user($app) {
        return $app['twig']->render('form.twig');
    });

    $app->get("/view_title_case", function() user ($app) {
        $myTitleCaseGenerator = new TitleCaseGenerator;
        $titleCasedPhrase = $myTitleCaseGenerator->makeTitleCase($_GET['phrase']);
        return $app['twig']->render('title_cased.twig', array('result' => $titleCasedPhrase));
    });

    return $app;
 ?>
