<?php

namespace Unifi;

/**
 * Class Api
 *
 * @author Mark Myers <marcusmyers@gmail.com>
 */ 
class Api
{

  /**
   * @var string
   */
  public $user = "";

  /**
   * @var string
   */

  public $password = "";
  /**
   * @var string
   */
 
  public $site = "default";
  /**
   * @var string
   */
  public $baseurl = "https://127.0.0.1:8443";

  /**
   * @var string
   */

  public $controller = "3.2.8";
  /**
   * @var bool
   */

  public $isLoggedin = false;
  /**
   * @var string
   */

  private $cookies = "";
  /**
   * @var bool
   */

  public $debug = false;
  /**
   * @param string $user
   * @param string $password
   * @param string $baseurl
   * @param string $site
   * @param string $controller
   */
  function __construct($user = "", $password = "", $baseurl = "", $site = "", $controller = "")
  {
    (empty($user)) ? $this->user = env('UNIFI_USER', $this->user) : $this->user = $user;
    (empty($password)) ? $this->password = env('UNIFI_PASSWORD', $this->password) : $this->password = $password;
    (empty($baseurl)) ? $this->baseurl = env('UNIFI_BASEURL', $this->baseurl) : $this->baseurl = $baseurl;
    (empty($site)) ? $this->site = env('UNIFI_SITE', $this->site) : $this->site = $site;
    if (empty($controller)) {
      $controller = $controller = env('UNIFI_CONTROLLER', $this->controller);
    }
    $this->controller = $this->getControllerVersion($controller);
  }
}
