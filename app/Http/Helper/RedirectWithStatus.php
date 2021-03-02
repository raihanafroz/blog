<?php
/**
 * Created by PhpStorm.
 * User: Raihan
 * Date: 3/1/2021
 * Time: 11:00 PM
 */

namespace App\Http\Helper;


class RedirectWithStatus
{
  /**
   * @param $route
   * @param $message
   * @return $this
   */
  public static function routeSuccess($route, $message = '<strong>Congratulations!!!</strong>') {
    $status = '<div class="alert alert-success alert-dismissible show" role="alert">
                '. $message .'
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
              </div>';
    return redirect()->route($route)->with('status', $status);
  }

  /**
   * @param string $message
   * @return $this
   */
  public static function backWithInput($message = '<strong>Sorry!!! </strong> Update not possible.') {
    $status = '<div class="alert alert-warning alert-dismissible show" role="alert">
                '.$message.'
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
              </div>';
    return redirect()->back()->with('status', $status)->withInput();
  }

  /**
   * @param string $message
   * @return $this
   */
  public static function backWithInputFromException($message = '<strong>Sorry!!! </strong> Something went wrong.') {
    $status = '<div class="alert alert-danger alert-dismissible show" role="alert">
                '.$message.'
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
              </div>';
    return redirect()->back()->with('status', $status)->withInput();
  }
}