<?php
/**
 * This file is part of the _codeXd-pg package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 * @author  Bartosz Zwierzchowski <cxdev@pro-grom.eu>
 * @license http://opensource.org/licenses/MIT MIT License
 */
namespace Xylio;

class Filtr
{
    /**
     * filtr data about xss
     *
     * @param string $str data to filtr
     * @return string
     */
    public static function xss($str) {
        return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
    }

    /**
     * filtr data about bad utf8
     *
     * @param string $str data to filtr
     * @return string
     */
    public static function utf8($str) {
        return @iconv("utf-8", "utf-8//IGNORE", $str);
    }

}