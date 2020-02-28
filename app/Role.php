<?php

namespace App;

abstract class Role {

    const __default = self::Member;

    const Member = 0;
    const Partner = 1;
    const Moderator = 2;
    const Admin = 3;
    const AdminDebug = 4;
}
