<?php
namespace App\Enum;
enum TableStatusEnum:string{
    case Pending='pending';
    case Available='available';
    case Unavailable='unavailable';
}