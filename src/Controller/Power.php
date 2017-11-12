<?php

namespace LinuxControlApi\Controller;

use LinuxControlApi\Service\Cli;

class Power extends Cli {
    public function restart() {
        return $this->execute('ssh -tt root@localhost "sudo service apache2 restart"');
    }
}