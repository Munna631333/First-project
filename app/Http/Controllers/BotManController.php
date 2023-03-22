<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use BotMan\BotMan;
use BotMan\BotMan\Messages\Incoming\Answer;

class BotManController extends Controller
{
    public function handle()
    {

        $botman=app('botman');
        $botman->hears('{message}',function($botman,$message){

            if($message=='hi'or'hlw' or 'hello'){

                $this->askName($botman);

            }
            else{
                $botman->replay("write 'hi' for testing");
            }
        });
        $botman->listen();
       
    }

    public function askName($botman)
    {
        $botman->ask("hello | What is your name?",function(Answer $answer){

            $name=$answer->getText();
            $this->say('Nice to meet you',$name);
            $this->say('Are you shop with us or need your any help??',$name);



        });
       
    }

   
   
}
