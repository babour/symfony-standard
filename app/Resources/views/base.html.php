<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>
            <?php $view['slots']->start('title') ?>
            Welcome!
            <?php $view['slots']->stop() ?>
        </title>
    </head>
    <body>
        <?php $view['slots']->output('body') ?>
    </body>
</html>
