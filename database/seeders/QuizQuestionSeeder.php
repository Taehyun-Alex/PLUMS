<?php

namespace Database\Seeders;


use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\QuizQuestion;


class QuizQuestionSeeder extends Seeder
{
    public function run()
    {
        // Questions for certificate_3
        QuizQuestion::create([
            'question_text' => 'What does HTML stand for?',
            'option_a' => 'Hyper Text Markup Language',
            'option_b' => 'High Text Markup Language',
            'option_c' => 'Hyperlink and Text Markup Language',
            'option_d' => 'Hyper Text Markup Level',
            'correct_answer' => 'a',
            'tags' => 'Web Development',
            'difficulty' => 'certificate_3',
        ]);

        QuizQuestion::create([
            'question_text' => 'Which HTML element is used to define the title of a document?',
            'option_a' => '<title>',
            'option_b' => '<head>',
            'option_c' => '<meta>',
            'option_d' => '<header>',
            'correct_answer' => 'a',
            'tags' => 'Web Development',
            'difficulty' => 'certificate_3',
        ]);

        QuizQuestion::create([
            'question_text' => 'Which HTML attribute is used to specify the URL of an image?',
            'option_a' => 'src',
            'option_b' => 'href',
            'option_c' => 'link',
            'option_d' => 'url',
            'correct_answer' => 'a',
            'tags' => 'Web Development',
            'difficulty' => 'certificate_3',
        ]);



        // Questions for certificate_4
        QuizQuestion::create([
            'question_text' => 'What is the purpose of CSS?',
            'option_a' => 'To structure web pages',
            'option_b' => 'To style web pages',
            'option_c' => 'To create databases',
            'option_d' => 'To handle server requests',
            'correct_answer' => 'b',
            'tags' => 'Web Development,Programming',
            'difficulty' => 'certificate_4',
        ]);

        QuizQuestion::create([
            'question_text' => 'Which CSS property is used to change the text color?',
            'option_a' => 'color',
            'option_b' => 'font-color',
            'option_c' => 'text-color',
            'option_d' => 'background-color',
            'correct_answer' => 'a',
            'tags' => 'Web Development,Programming',
            'difficulty' => 'certificate_4',
        ]);

        QuizQuestion::create([
            'question_text' => 'Which of the following is a valid CSS selector?',
            'option_a' => 'div',
            'option_b' => '#div',
            'option_c' => '.div',
            'option_d' => 'All of the above',
            'correct_answer' => 'd',
            'tags' => 'Web Development,Programming',
            'difficulty' => 'certificate_4',
        ]);



        // Questions for diploma
        QuizQuestion::create([
            'question_text' => 'What is a RESTful API?',
            'option_a' => 'An API that uses HTTP requests',
            'option_b' => 'A method for accessing web servers',
            'option_c' => 'A way to build databases',
            'option_d' => 'None of the above',
            'correct_answer' => 'a',
            'tags' => 'Web Development,Networking',
            'difficulty' => 'diploma',
        ]);

        QuizQuestion::create([
            'question_text' => 'What protocol is commonly used for secure data transmission?',
            'option_a' => 'HTTP',
            'option_b' => 'HTTPS',
            'option_c' => 'FTP',
            'option_d' => 'SMTP',
            'correct_answer' => 'b',
            'tags' => 'Networking',
            'difficulty' => 'diploma',
        ]);

        QuizQuestion::create([
            'question_text' => 'Which of the following is a cloud storage service?',
            'option_a' => 'Google Drive',
            'option_b' => 'Dropbox',
            'option_c' => 'AWS S3',
            'option_d' => 'All of the above',
            'correct_answer' => 'd',
            'tags' => 'Networking',
            'difficulty' => 'diploma',
        ]);


    }
}
