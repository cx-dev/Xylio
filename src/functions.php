<?php
/**
 * This file is part of the _codeXd-pg package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 * @author  Bartosz Zwierzchowski <cxdev@pro-grom.eu>
 * @license http://opensource.org/licenses/MIT MIT License
 */

if (!function_exists('view')) {
    function view($content)
    {
        print ("<pre>");

        if (is_array($content)) {
            print_r($content);
        } elseif (is_object($content)) {
            var_dump($content);
        } else {
            echo $content;
        }

        print ("</pre>");
    }
}