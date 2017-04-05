<?php
/*
 * This file is part of the oXylion package.
 *
 * (c) Bartosz Zwierzchowski <dev@pro-grom.pl>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Xylio\HttpFoundation;
use Config;
use Xylio\Log\Log;
use Xylio\Log\LogLevel;

class Request
{
    /**
     * @var type string
     */
    private $sh_alias;
    /**
     * @var type string
     */
    private $sh_domain;
    /**
     * @var type array
     */
    private $sh_gget = array();
    /**
     * @var type array
     */
    private $sh_gpost = array();
    /**
     * @var type string
     */
    private $sh_guri;
    /**
     * App runtime obj.
     *   - boost settings
     *
     * @var \Xylio\Config->runtime array
     */
    public $c_runtime = array();

    /**
     * Request constructor.
     * @param $c_runtime
     */
    public function __construct() {
        $this->c_runtime = Config::getRuntime();
        $this->parseAlias()->parseDomain()->loadGlobals();
    }


    /**
     * Parse server name into server alias.
     *
     * @return void.
     */
    private function parseAlias() {
        $s_name = $_SERVER["SERVER_NAME"];
        $alias = str_replace($this->c_runtime['domain'], '', $s_name);
        $alias = rtrim($alias, '.');
        $this->sh_alias = $alias;
        if (defined('DEV_PROFILOG'))
            log::add(LogLevel::NOTICE, __CLASS__.' -> parse server alias.\n');

        return $this;
    }
    /**
     * Parse server name into server domain.
     *
     * @return void
     */
    private function parseDomain() {
        $_same = $_SERVER['SERVER_NAME'];
        $domain = str_replace($this->sh_alias, '', $_same);
        $domain = ltrim($domain, '.');
        $this->sh_domain = $domain;
        if (defined('DEV_PROFILOG'))
            log::add(LogLevel::NOTICE, __CLASS__.' -> parse server domain name.\n');

        return $this;
    }
    /**
     * App global request stored
     *
     * @return void
     */
    private function loadGlobals() {

        $this->sh_guri= $_SERVER["REQUEST_URI"];
        $this->sh_gget   = $_GET;
        $this->sh_gpost  = $_POST;
        if (defined('DEV_PROFILOG'))
            log::add(LogLevel::NOTICE, __CLASS__.' -> parse server global headers.\n');

    }


    /**
     * Method - redirect to http link
     *
     * @var string $link
     */
    public function redirect($link = "") {
        header("Location: " . $link);
    }


    /**
     * Method - request page with code
     *
     * @param int $code
     */
    public function page_code($code = 0) {

    }

}