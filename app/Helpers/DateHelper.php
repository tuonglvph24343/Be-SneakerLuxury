<?php

namespace App\Helpers;

use Exception;
use Carbon\Carbon;

class DateHelper
{
  public static function parseDateBe($date, $format = 'Y-m-d H:i:s')
  {
    try {
      if (!$date) {
        return null;
      }
      return Carbon::parse($date)->format($format);
    } catch (Exception $e) {
      throw new Exception($e->getMessage());
    }
  }
}
