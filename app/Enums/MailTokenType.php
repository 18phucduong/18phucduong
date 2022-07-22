<?php

namespace App\Enums;

enum MailTokenType: int
{
    case VERIFY = 1;
    case RESET_PASSWORD = 2;
}
