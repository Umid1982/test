<?php

namespace App\Console\Constants;

enum StationResponseEnum:string
{
 case Station_LIST = 'Station lists';
 case Station_CREATE = 'Station created';
 case Station_UDATE = 'Station updated';
 case Station_DELETE = 'Station deleted';
}
