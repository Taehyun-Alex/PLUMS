<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Question;
use Illuminate\Support\Facades\DB;

class QuestionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
   public function run()
    {
        DB::table('questions')->insert([
            [
                'course_id' => 1, // Cyber Security
                'certificate_id' => 11, // Certificate 3
                'section_id' => 1, // Section 1
                'question_text' => 'What is the primary purpose of a firewall in cyber security?',
                'difficulty' => 'easy',
            ],
        ]);

        DB::table('answers')->insert([
            ['question_id' => 1, 'answer_text' => 'To filter incoming and outgoing traffic', 'is_correct' => true],
            ['question_id' => 1, 'answer_text' => 'To encrypt all network communications', 'is_correct' => false],
            ['question_id' => 1, 'answer_text' => 'To protect against physical theft', 'is_correct' => false],
            ['question_id' => 1, 'answer_text' => 'To scan for viruses and malware', 'is_correct' => false],
        ]);




//        // Cyber Security Questions
//        $cyberSecurityQuestions = [
//            ['What is the primary purpose of a firewall?', 'Easy', 1, 1, 1],
//            ['What does the acronym VPN stand for?', 'Easy', 1, 1, 1],
//            ['Which of the following is a type of malware that restricts access to the computer system it infects and demands a ransom paid to the creator of the malware?', 'Medium', 1, 2, 2],
//            ['What is a common use for multi-factor authentication (MFA)?', 'Medium', 1, 2, 2],
//            ['Which security protocol is used for secure communications over the Internet?', 'Medium', 1, 2, 2],
//            ['What is the difference between symmetric and asymmetric encryption?', 'Hard', 1, 3 ,3],
//            ['What type of cyber attack is characterized by overwhelming a system with a flood of Internet traffic?', 'Hard', 1, 3, 3],
//            ['In which of the following scenarios would a replay attack occur?', 'Hard', 1, 3, 3],
//            ['What is a zero-day vulnerability?', 'Hard', 1, 3 ,3],
//            ['Which of the following tools is commonly used for penetration testing to detect vulnerabilities?', 'Hard', 1, 3, 3],
//        ];
//
//        foreach ($cyberSecurityQuestions as $question) {
//            Question::create([
//                'question_text' => $question[0],
//                'difficulty' => $question[1],
//                'course_id' => $question[2],
//                'certificate_id' => $question[3],
//                'section_id' => $question[4],
//
//
//            ]);
//        }
//
//        // Information Technology Questions
//        $itQuestions = [
//            ['What does the acronym IT stand for?', 'Easy', 2, 1, 4],
//            ['What is the primary role of a database management system (DBMS)?', 'Easy', 2, 1, 4],
//            ['Which of the following is a non-relational database?', 'Medium', 2, 2, 5],
//            ['What is the function of an operating system?', 'Medium', 2, 2, 5],
//            ['Which language is commonly used for developing dynamic web pages?', 'Medium', 2, 2 ,5],
//            ['What is the main purpose of RAID (Redundant Array of Independent Disks)?', 'Hard', 2, 3, 6],
//            ['What is the purpose of using a proxy server?', 'Hard', 2, 3, 6],
//            ['Which of the following best describes "virtualization" in IT?', 'Hard', 2, 3, 6],
//            ['What does the term "scalability" refer to in IT?', 'Hard', 2, 3, 6],
//            ['What is the primary function of an IT helpdesk?', 'Hard', 2, 3, 6],
//        ];
//
//        foreach ($itQuestions as $question) {
//            Question::create([
//                'question_text' => $question[0],
//                'difficulty' => $question[1],
//                'course_id' => $question[2],
//                'certificate_id' => $question[3],
//                'section_id' => $question[4],
//            ]);
//        }
//
//        // Programming Questions
//        $programmingQuestions = [
//            ['What does the term "syntax" refer to in programming?', 'Easy', 3, 1, 7],
//            ['What is a loop in programming?', 'Easy', 3, 1, 7],
//            ['What is the purpose of a compiler in programming?', 'Medium', 3, 2, 8],
//            ['What does "inheritance" mean in object-oriented programming?', 'Medium', 3, 2, 8],
//            ['In programming, what is an "array"?', 'Medium', 3, 2, 8],
//            ['What is the difference between "call by value" and "call by reference"?', 'Hard', 3, 3, 9],
//            ['What does the term "recursion" mean in programming?', 'Hard', 3, 3, 9],
//            ['Which of the following languages is primarily used for web development?', 'Hard', 3, 3, 9],
//            ['What is a "deadlock" in concurrent programming?', 'Hard', 3, 3, 9],
//            ['What does the "this" keyword refer to in object-oriented programming?', 'Hard', 3, 3, 9],
//        ];
//
//        foreach ($programmingQuestions as $question) {
//            Question::create([
//                'question_text' => $question[0],
//                'difficulty' => $question[1],
//                'course_id' => $question[2],
//                'certificate_id' => $question[3],
//                'section_id' => $question[4],
//            ]);
//        }

//        // Web Development Questions
//        $webDevQuestions = [
//            ['What does HTML stand for?', 'Easy', 4, 1, 10],
//            ['Which CSS property is used to change the text color of an element?', 'Easy', 4, 1, 10],
//            ['What does the "C" in CSS stand for?', 'Medium', 4, 2, 11],
//            ['What is the primary function of JavaScript in web development?', 'Medium', 4, 2, 11],
//            ['Which tag is used to create a hyperlink in HTML?', 'Medium', 4, 2, 11],
//            ['What is the purpose of the DOCTYPE declaration in HTML?', 'Hard', 4, 3, 12],
//            ['Which of the following is a JavaScript framework commonly used for building web applications?', 'Hard', 4, 3, 12],
//            ['What does the term "responsive design" refer to in web development?', 'Hard', 4, 3, 12],
//            ['What is the main difference between HTML and XML?', 'Hard', 4, 3, 12],
//            ['In CSS, what does the z-index property do?', 'Hard', 4, 3, 12],
//        ];

//        foreach ($webDevQuestions as $question) {
//            Question::create([
//                'question_text' => $question[0],
//                'difficulty' => $question[1],
//                'course_id' => $question[2],
//                'certificate_id' => $question[3],
//                'section_id' => $question[4],
//            ]);
//        }
    }
}
