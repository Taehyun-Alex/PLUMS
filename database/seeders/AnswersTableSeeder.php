<?php

namespace Database\Seeders;

use App\Models\Question;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Answer;


class AnswersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Cyber Security Answers
        $cyberSecurityAnswers = [
            [
                ['To store passwords securely', 'false'],
                ['To encrypt data', 'false'],
                ['To prevent unauthorized access to or from a private network', 'true'],
                ['To perform network speed tests', 'false']
            ],
            [
                ['Virtual Private Network', 'true'],
                ['Virtual Public Network', 'false'],
                ['Variable Public Network', 'false'],
                ['Visible Private Network', 'false']
            ],
            [
                ['Spyware', 'false'],
                ['Ransomware', 'true'],
                ['Adware', 'false'],
                ['Trojan', 'false']
            ],
            [
                ['To enable faster logins', 'false'],
                ['To provide additional security by requiring more than one form of verification', 'true'],
                ['To connect multiple devices to a single network', 'false'],
                ['To allow multiple users to access an account simultaneously', 'false']
            ],
            [
                ['HTTP', 'false'],
                ['FTP', 'false'],
                ['SSL/TLS', 'true'],
                ['SMTP', 'false']
            ],
            [
                ['Symmetric uses one key for encryption and decryption, asymmetric uses two', 'true'],
                ['Symmetric is slower, asymmetric is faster', 'false'],
                ['Symmetric uses two keys, asymmetric uses one', 'false'],
                ['Symmetric is more secure than asymmetric', 'false']
            ],
            [
                ['Man-in-the-Middle Attack', 'false'],
                ['Denial of Service (DoS) Attack', 'true'],
                ['Phishing Attack', 'false'],
                ['SQL Injection', 'false']
            ],
            [
                ['A user’s password is cracked and reused', 'false'],
                ['An attacker intercepts and later retransmits a legitimate communication', 'true'],
                ['An attacker changes the data in transit between two parties', 'false'],
                ['A hacker gains access by exploiting outdated software', 'false']
            ],
            [
                ['A vulnerability that has been patched', 'false'],
                ['A previously unknown vulnerability that is exploited before a fix is available', 'true'],
                ['A weakness found in outdated operating systems', 'false'],
                ['A security issue related to software updates', 'false']
            ],
            [
                ['Wireshark', 'false'],
                ['Nmap', 'true'],
                ['Photoshop', 'false'],
                ['MySQL', 'false']
            ]
        ];

        $cyberQuestions = Question::where('tags', 'cybersecurity,programming')->get();
        foreach ($cyberQuestions as $index => $question) {
            foreach ($cyberSecurityAnswers[$index] as $answer) {
                Answer::create([
                    'question_id' => $question->id,
                    'answer' => $answer[0],
                    'correct' => $answer[1] === 'true'
                ]);
            }
        }

        // Information Technology Answers
        $itAnswers = [
            [
                ['Internet Technology', 'false'],
                ['Information Technology', 'true'],
                ['Internal Technology', 'false'],
                ['Innovation Technology', 'false']
            ],
            [
                ['To perform calculations', 'false'],
                ['To store and retrieve data', 'true'],
                ['To design web pages', 'false'],
                ['To protect networks', 'false']
            ],
            [
                ['MySQL', 'false'],
                ['PostgreSQL', 'false'],
                ['MongoDB', 'true'],
                ['Oracle', 'false']
            ],
            [
                ['To provide a platform for software applications', 'true'],
                ['To create graphical content', 'false'],
                ['To secure the hardware', 'false'],
                ['To connect to the internet', 'false']
            ],
            [
                ['HTML', 'false'],
                ['CSS', 'false'],
                ['PHP', 'true'],
                ['SQL', 'false']
            ],
            [
                ['To increase network speed', 'false'],
                ['To provide data redundancy and improve performance', 'true'],
                ['To encrypt data on a hard disk', 'false'],
                ['To partition a hard disk', 'false']
            ],
            [
                ['To connect to the internet', 'false'],
                ['To act as an intermediary between a client and a server', 'true'],
                ['To host websites', 'false'],
                ['To increase the processing power of a computer', 'false']
            ],
            [
                ['The process of creating virtual versions of physical hardware', 'true'],
                ['The act of storing data in the cloud', 'false'],
                ['The development of web-based applications', 'false'],
                ['The encryption of digital information', 'false']
            ],
            [
                ['The ability of a system to grow and manage increased demand', 'true'],
                ['The speed at which a network can transmit data', 'false'],
                ['The capability to encrypt and decrypt data', 'false'],
                ['The capacity to connect multiple devices to a network', 'false']
            ],
            [
                ['To develop new software applications', 'false'],
                ['To assist users with technology-related issues', 'true'],
                ['To monitor network traffic', 'false'],
                ['To design computer hardware', 'false']
            ]
        ];

        $itQuestions = Question::where('tags', 'information technology,programming')->get();
        foreach ($itQuestions as $index => $question) {
            foreach ($itAnswers[$index] as $answer) {
                Answer::create([
                    'question_id' => $question->id,
                    'answer' => $answer[0],
                    'correct' => $answer[1] === 'true'
                ]);
            }
        }

        // Programming Answers
        $programmingAnswers = [
            [
                ['The speed of a program', 'false'],
                ['The structure and set of rules for writing code', 'true'],
                ['The performance of a computer', 'false'],
                ['The design of a user interface', 'false']
            ],
            [
                ['A function that repeats a block of code', 'true'],
                ['A method for storing data', 'false'],
                ['A type of variable', 'false'],
                ['A way to structure a database', 'false']
            ],
            [
                ['To write code', 'false'],
                ['To translate high-level programming code into machine code', 'true'],
                ['To delete code', 'false'],
                ['To manage files', 'false']
            ],
            [
                ['The ability of a class to inherit properties and methods from another class', 'true'],
                ['The ability to execute code', 'false'],
                ['The process of compiling code', 'false'],
                ['The method of storing data', 'false']
            ],
            [
                ['A data structure used to store a collection of elements', 'true'],
                ['A type of loop', 'false'],
                ['A type of function', 'false'],
                ['A type of database', 'false']
            ],
            [
                ['Call by value copies the value of an argument; call by reference passes the address', 'true'],
                ['Call by value is faster than call by reference', 'false'],
                ['Call by reference does not pass any value', 'false'],
                ['They are the same', 'false']
            ],
            [
                ['A function that calls itself', 'true'],
                ['A function that runs only once', 'false'],
                ['A loop that repeats forever', 'false'],
                ['A type of variable', 'false']
            ],
            [
                ['C++', 'false'],
                ['Python', 'false'],
                ['Java', 'false'],
                ['JavaScript', 'true']
            ],
            [
                ['When two or more processes are waiting for each other to release resources', 'true'],
                ['When a program crashes', 'false'],
                ['When data is lost during processing', 'false'],
                ['When a program executes without stopping', 'false']
            ],
            [
                ['The current instance of the class', 'true'],
                ['The next instance of the class', 'false'],
                ['A global object', 'false'],
                ['A method within a class', 'false']
            ]
        ];

        $programmingQuestions = Question::where('tags', 'programming')->get();
        foreach ($programmingQuestions as $index => $question) {
            foreach ($programmingAnswers[$index] as $answer) {
                Answer::create([
                    'question_id' => $question->id,
                    'answer' => $answer[0],
                    'correct' => $answer[1] === 'true'
                ]);
            }
        }

        // Web Development Answers
        $webDevAnswers = [
            [
                ['HyperText Markup Language', 'true'],
                ['HighText Markup Language', 'false'],
                ['HyperText Managing Language', 'false'],
                ['HighText Managing Language', 'false']
            ],
            [
                ['Font-size', 'false'],
                ['Text-color', 'false'],
                ['Color', 'true'],
                ['Text-style', 'false']
            ],
            [
                ['Creative', 'false'],
                ['Cascading', 'true'],
                ['Custom', 'false'],
                ['Coding', 'false']
            ],
            [
                ['To style web pages', 'false'],
                ['To structure web content', 'false'],
                ['To add interactivity and dynamic content to web pages', 'true'],
                ['To manage databases', 'false']
            ],
            [
                ['<img>', 'false'],
                ['<link>', 'false'],
                ['<a>', 'true'],
                ['<div>', 'false']
            ],
            [
                ['To declare the version of HTML being used', 'true'],
                ['To link CSS files', 'false'],
                ['To add JavaScript', 'false'],
                ['To include images', 'false']
            ],
            [
                ['Bootstrap', 'false'],
                ['React.js', 'true'],
                ['WordPress', 'false'],
                ['HTML5', 'false']
            ],
            [
                ['A design that looks good on all devices', 'true'],
                ['A design that only works on desktops', 'false'],
                ['A design that is only used for mobile devices', 'false'],
                ['A design that does not use CSS', 'false']
            ],
            [
                ['HTML is used for web pages; XML is used for data transport', 'true'],
                ['HTML is a database language; XML is not', 'false'],
                ['HTML is for styling; XML is for scripting', 'false'],
                ['There is no difference', 'false']
            ],
            [
                ['Sets the transparency level', 'false'],
                ['Sets the font size', 'false'],
                ['Controls the stacking order of elements', 'true'],
                ['Changes the text color', 'false']
            ]
        ];

        $webDevQuestions = Question::where('tag', 'webdevelopment,programming')->get();
        foreach ($webDevQuestions as $index => $question) {
            foreach ($webDevAnswers[$index] as $answer) {
                Answer::create([
                    'question_id' => $question->id,
                    'answer' => $answer[0],
                    'correct' => $answer[1] === 'true'
                ]);
            }
        }
    }
}
