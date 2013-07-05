<?php
namespace LaFourchette\Provisioner;

use LaFourchette\Model\VM;
use Symfony\Component\Process\Process;

class Vagrant extends ProvisionerAbstract
{
    protected $depot = 'git@github.com:lafourchette/lafourchette-vm.git';


    protected function getPrefixCommand($integ)
    {
        $cmd = '';


        $sshUser = $integ->getSshUser();
        $sshKey = $integ->getSshKey();
        $server = $integ->getServer();

        if (trim($sshUser) != '' && trim($server) != '') {
            $cmd .= 'ssh ' . $sshUser . '@' . $server . ':';
        }

        $path = $integ->getPath();

        if (trim($path) == '') {
            $cmd .= $path;
        } else {
            throw new \Exception('Seriously ? no path ? I can deploy the VM everywhere ?');
        }

        return $cmd;
    }

    public function getStatus(VM $vm)
    {
        // TODO: Implement getStatus() method.
    }

    public function start(VM $vm)
    {
        $integ = $vm->getInteg();

        $cmd = 'git clone git@github.com:lafourchette/lafourchette-vm.git';
        $cmd = $this->getPrefixCommand($cmd);



    }

    public function stop(VM $vm)
    {
        // TODO: Implement stop() method.
    }

    public function initialise(VM $vm)
    {
        // TODO: Implement initialise() method.
    }

    public function reset(VM $vm)
    {
        // TODO: Implement reset() method.
    }
}