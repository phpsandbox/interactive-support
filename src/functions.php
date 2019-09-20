<?php

use Symfony\Component\VarDumper\Cloner\VarCloner;
use Symfony\Component\VarDumper\Dumper\HtmlDumper;
use Symfony\Component\VarDumper\VarDumper;

if (!function_exists('cdump')) {
    function cdump($var, ...$moreVars) {
        VarDumper::setHandler(function ($var) {
            $cloner = new VarCloner;
            $dumper = new HtmlDumper;

            $dumper->setTheme('light');
            $dumper->dump($cloner->cloneVar($var));
        });

        return dump($var, ...$moreVars);
    }
}
