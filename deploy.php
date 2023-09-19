<?php
namespace Deployer;

require 'recipe/common.php';

// Project name
set('application', 'assaig-static');

// Project repository
set('repository', 'https://github.com/Assaig-2DAW/assaig-vue.git');

// [Optional] Allocate tty for git clone. Default value is false.
set('git_tty', true); 

// Shared files/dirs between deploys 
set('shared_files', []);
set('shared_dirs', []);

// Writable dirs by web server 
set('writable_dirs', []);


// Hosts

host('54.85.146.153')
    ->user('vue_deployer')
    ->identityFile('~/.ssh/id_rsa.pub')
    ->set('deploy_path', '/var/www/assaig-static/html');

    task('build', function () {
    run('cd {{release_path}} && build');
}); 
    
// Tasks

desc('Deploy your project');
task('deploy', [
    'deploy:info',
    'deploy:prepare',
    'deploy:lock',
    'deploy:release',
    'deploy:update_code',
    'deploy:shared',
    'deploy:writable',
    'deploy:clear_paths',
    'deploy:symlink',
    'deploy:unlock',
    'cleanup',
    'success'
]);

task('run_build', function () {
    run('cd /var/www/assaig-static/html/current && npm i');
    run('cd /var/www/assaig-static/html/current && npm run build');
});

// [Optional] If deploy fails automatically unlock.
after('deploy:failed', 'deploy:unlock');


after('deploy', 'run_build');

