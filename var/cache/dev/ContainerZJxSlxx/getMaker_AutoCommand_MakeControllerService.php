<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.
// Returns the private 'maker.auto_command.make_controller' shared service.

$a = ($this->privates['maker.file_manager'] ?? $this->load(__DIR__.'/getMaker_FileManagerService.php'));

$this->privates['maker.auto_command.make_controller'] = $instance = new \Symfony\Bundle\MakerBundle\Command\MakerCommand(new \Symfony\Bundle\MakerBundle\Maker\MakeController($a), $a);

$instance->setName('make:controller');

return $instance;