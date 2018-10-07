<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Twilio\TwiML;

class TwilioCaller extends Controller {

  public function __construct() { }

  private function test() {
    $response = new TwiML();
    $response->say('Hello World');
    return response($response, 200);
  }

  public function welcome() {
    $response = new TwiMl();

    $response
      ->gather([
        'numDigits' => 1,
        'action'  => route('menu-response', [], false),
      ])
      ->say(
        "Welcome to Alifax Online Banking.".
        "For English press 1.".
        "For Turkish press 2.",
        ['loop' => 3]
      );
    return $response;
  }

  public function initCall(Request $request) {
    return response($this->welcome());
  }

}
