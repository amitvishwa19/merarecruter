<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Notifications\GitHubNotification;
use Symfony\Component\Process\Process;

use Artisan;
use Log;
use Event;

use Illuminate\Console\Command;
use TitasGailius\Terminal\Terminal;


class GithubDeployController extends Controller
{
    public function notify(Request $request)
    {
        User::first()->notify(new GitHubNotification());
        return response()->json(['message'=>'Successfully delivered notification'],200);

        // $githubPayload = $request->getContent();
        // $postdata = json_decode($request->getContent(), TRUE);
        // $githubHash = $request->header('X-Hub-Signature');
        // //app('log')->debug($postdata['pusher']['email']);

        // $localToken = config('gitdeploy.secret_key');
        // $localHash = 'sha1=' . hash_hmac('sha1', $githubPayload, $localToken, false);


        // if (hash_equals($githubHash, $localHash)) {

        //     activity()->log('Application Down for Maintainence/Update');
        //     Artisan::call("down");


        //     //Git pull fires
        //     Terminal::run('git pull');
        //     activity()->log('Git pull');

        //     //Updating composer
        //     Terminal::run('composer install --no-interaction --no-dev --prefer-dist');
        //     activity()->log('Composer install');


        //     Artisan::call("migrate --force");
        //     activity()->log('Performing Migration');

        //     Artisan::call("cache:clear");
        //     activity()->log('Clear Cache');


        //     //Clear Config
        //     Artisan::call("config:clear");
        //     activity()->log('Clear Config');

        //     //Config Cache
        //     Artisan::call("config:cache");
        //     activity()->log('Config Cache');

        //     Artisan::call("up");
        //     activity()->log('Application Up after Maintainence/Update');

        //     User::first()->notify(new GitHubNotification());
        //     return response()->json(['message'=>'Successfully delivered notification'],200);
        // }

        //Testing auto git pull,updated


    }

    public function deploy(Request $request)
    {
        if(setting('app.autogitdeploy') == 'true'){

            $githubPayload = $request->getContent();
            $postdata = json_decode($request->getContent(), TRUE);
            $githubHash = $request->header('X-Hub-Signature');

            $localToken = setting('app.autogitdeploykey');//config('gitdeploy.secret_key');
            $localHash = 'sha1=' . hash_hmac('sha1', $githubPayload, $localToken, false);

            if (hash_equals($githubHash, $localHash)) {

                User::first()->notify(new GitHubNotification());

                $root_path = base_path();
                $process = new Process($root_path .'/deploy.sh');

                $process->run(function ($type, $buffer) {
                    echo $buffer;
                });

                return response()->json(['message'=>'Successfully delivered notification'],200);
            }

        }

    }

    private function formatIPAddress(string $ip) {
        return inet_ntop(inet_pton($ip));
    }

}
