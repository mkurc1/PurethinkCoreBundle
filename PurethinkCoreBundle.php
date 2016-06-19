<?php

namespace Purethink\CoreBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class PurethinkCoreBundle extends Bundle
{
    public function getParent()
    {
        return 'SonataUserBundle';
    }
}