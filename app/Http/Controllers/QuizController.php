<?php

namespace App\Http\Controllers;
use Inertia\Inertia;

use Illuminate\Http\Request;

class QuizController extends Controller
{
    
    public function quiz_questions() {
        $questions = [
            [
                'id' => 1,
                'question' => 'Laravel is a ____ framework?',
                'options' => ['A' => 'PHP', 'B' => 'JavaScript', 'C' => 'Python', 'D' => 'React'],
                'correct' => 'A',
            ],
            [
                'id' => 2,
                'question' => 'All dependencies are specified in the ____ file, which is located in the source folder?',
                'options' => ['A' => 'Root', 'B' => 'Config', 'C' => 'composer.json', 'D' => 'Public'],
                'correct' => 'C',
            ],
            [
                'id' => 3,
                'question' => 'Command line interface used in Laravel is called ____.',
                'options' => ['A' => 'Command Prompt', 'B' => 'CLI', 'C' => 'Composer', 'D' => 'Artisan'],
                'correct' => 'D',
            ],
            [
                'id' => 4,
                'question' => 'What is the name of the ORM used in Laravel?',
                'options' => ['A' => 'Artisan', 'B' => 'Composer', 'C' => 'Hibernate', 'D' => 'Eloquent'],
                'correct' => 'D',
            ],
            [
                'id' => 5,
                'question' => 'The database definitions and structure are kept in PHP code using',
                'options' => ['A' => 'Redis', 'B' => 'Template engine', 'C' => 'Schema Builder', 'D' => 'Madrid'],
                'correct' => 'C',
            ],
            [
                'id' => 6,
                'question' => 'Which template language does Laravel use?',
                'options' => ['A' => 'Blade', 'B' => 'Cron', 'C' => 'Template engine', 'D' => 'Command Bus'],
                'correct' => 'A',
            ],
            [
                'id' => 7,
                'question' => '____ installed on your system before you install Laravel.',
                'options' => ['A' => 'Browser', 'B' => 'Composer', 'C' => 'Eloquent', 'D' => 'None of the above'],
                'correct' => 'B',
            ],
            [
                'id' => 8,
                'question' => 'Which folder in Laravel includes the entire source code of the project?',
                'options' => ['A' => 'Events', 'B' => 'Public', 'C' => 'App', 'D' => 'Console'],
                'correct' => 'C',
            ],
            [
                'id' => 9,
                'question' => ' ____ contains the artisan commands required by Laravel.',
                'options' => ['A' => 'Events', 'B' => 'Public', 'C' => 'Jobs', 'D' => 'Console'],
                'correct' => 'D',
            ],
            [
                'id' => 10,
                'question' => 'What is the extension of the folder which includes all the events for the project?',
                'options' => ['A' => '.php', 'B' => '.txt', 'C' => '.xml', 'D' => '.laravel'],
                'correct' => 'A',
            ],
        ];


        return Inertia::render('Quiz/Question',  ['questions' => $questions]);

    }
    

}
