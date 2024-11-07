<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Question;

class QuestionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Cyber Security Questions
        $cyberSecurityQuestions = [
            ['What is the primary purpose of a firewall?', 1, 1, 'cybersecurity,programming'],
            ['What does the acronym VPN stand for?', 1, 1, 'cybersecurity,programming'],
            ['Which of the following is a type of malware that restricts access to the computer system it infects and demands a ransom paid to the creator of the malware?', 1, 1, 'cybersecurity,programming'],
            ['What is a common use for multi-factor authentication (MFA)?', 1, 1, 'cybersecurity,programming'],
            ['Which security protocol is used for secure communications over the Internet?', 1, 2, 'cybersecurity,programming'],
            ['What is the difference between symmetric and asymmetric encryption?', 1, 2, 'cybersecurity,programming'],
            ['What type of cyber attack is characterized by overwhelming a system with a flood of Internet traffic?', 1, 2, 'cybersecurity,programming'],
            ['In which of the following scenarios would a replay attack occur?', 1, 3, 'cybersecurity,programming'],
            ['What is a zero-day vulnerability?', 1, 3, 'cybersecurity,programming'],
            ['Which of the following tools is commonly used for penetration testing to detect vulnerabilities?', 1, 3, 'cybersecurity,programming'],
        ];

        foreach ($cyberSecurityQuestions as $question) {
            Question::create([
                'question' => $question[0],
                'course_id' => $question[1],
                'certificate_id' => $question[2],
                'score' => $question[2],
                'tags' => $question[3],
            ]);
        }

        // Information Technology Questions
        $itQuestions = [
            ['What does the acronym IT stand for?', 2, 1, 'information technology,programming'],
            ['What is the primary role of a database management system (DBMS)?',  2, 1, 'information technology,programming'],
            ['Which of the following is a non-relational database?', 2, 2, 'information technology,programming'],
            ['What is the function of an operating system?', 2, 2, 'information technology,programming'],
            ['Which language is commonly used for developing dynamic web pages?', 2, 2 ,'information technology,programming'],
            ['What is the main purpose of RAID (Redundant Array of Independent Disks)?', 2, 3, 'information technology,programming'],
            ['What is the purpose of using a proxy server?', 2, 3, 'information technology,programming'],
            ['Which of the following best describes "virtualization" in IT?', 2, 3, 'information technology,programming'],
            ['What does the term "scalability" refer to in IT?', 2, 3, 'information technology,programming'],
            ['What is the primary function of an IT helpdesk?', 2, 3, 'information technology,programming'],
        ];

        foreach ($itQuestions as $question) {
            Question::create([
                'question' => $question[0],
                'course_id' => $question[1],
                'certificate_id' => $question[2],
                'score' => $question[2],
                'tags' => $question[3],
            ]);
        }

        // Programming Questions
        $programmingQuestions = [
            ['What does the term "syntax" refer to in programming?', 3, 1, 'programming'],
            ['What is a loop in programming?', 3, 1, 'programming'],
            ['What is the purpose of a compiler in programming?', 3, 2, 'programming'],
            ['What does "inheritance" mean in object-oriented programming?', 3, 2, 'programming'],
            ['In programming, what is an "array"?', 3, 2, 'programming'],
            ['What is the difference between "call by value" and "call by reference"?', 3, 3, 'programming'],
            ['What does the term "recursion" mean in programming?', 3, 3, 'programming'],
            ['Which of the following languages is primarily used for web development?', 3, 3, 'programming'],
            ['What is a "deadlock" in concurrent programming?', 3, 3, 'programming'],
            ['What does the "this" keyword refer to in object-oriented programming?', 3, 3, 'programming'],
        ];

        foreach ($programmingQuestions as $question) {
            Question::create([
                'question' => $question[0],
                'course_id' => $question[1],
                'certificate_id' => $question[2],
                'score' => $question[2],
                'tags' => $question[3],
            ]);
        }

         // Web Development Questions
        $webDevQuestions = [
            ['What does HTML stand for?',  4, 1, 'webdevelopment,programming'],
            ['Which CSS property is used to change the text color of an element?',  4, 1, 'webdevelopment,programming'],
            ['What does the "C" in CSS stand for?',  4, 2, 'webdevelopment,programming'],
            ['What is the primary function of JavaScript in web development?',  4, 2, 'webdevelopment,programming'],
            ['Which tag is used to create a hyperlink in HTML?',  4, 2, 'webdevelopment,programming'],
            ['What is the purpose of the DOCTYPE declaration in HTML?',  4, 3, 'webdevelopment,programming'],
            ['Which of the following is a JavaScript framework commonly used for building web applications?',  4, 3, 'webdevelopment,programming'],
            ['What does the term "responsive design" refer to in web development?',  4, 3, 'webdevelopment,programming'],
            ['What is the main difference between HTML and XML?',  4, 3, 'webdevelopment,programming'],
            ['In CSS, what does the z-index property do?',  4, 3, 'webdevelopment,programming'],
        ];

        foreach ($webDevQuestions as $question) {
            Question::create([
                'question' => $question[0],
                'course_id' => $question[1],
                'certificate_id' => $question[2],
                'score' => $question[2],
                'tags' => $question[3],
            ]);
        }

        // Networking Questions
        $networkingQuestions = [
            ['What is the primary purpose of an IP address?', 5, 1, 'networking,programming'],
            ['What does the acronym DNS stand for, and what is its function?', 5, 1, 'networking,programming'],
            ['Which device is commonly used to connect different networks and route data between them?', 5, 1, 'networking,programming'],
            ['What is the role of the OSI model in networking?', 5, 1, 'networking,programming'],
            ['In which OSI layer does the IP protocol operate?', 5, 2, 'networking,programming'],
            ['What is the primary difference between TCP and UDP?', 5, 2, 'networking,programming'],
            ['Which network protocol is used to automatically assign IP addresses to devices on a network?', 5, 2, 'networking,programming'],
            ['What is a subnet, and why is subnetting used in networking?', 5, 3, 'networking,programming'],
            ['What is a MAC address, and how does it differ from an IP address?', 5, 3, 'networking,programming'],
            ['Which command is used to test the connectivity between two network devices?', 5, 3, 'networking,programming'],
        ];

        foreach ( $networkingQuestions as $question) {
            Question::create([
                'question' => $question[0],
                'course_id' => $question[1],
                'certificate_id' => $question[2],
                'score' => $question[2],
                'tags' => $question[3],
            ]);
        }
    }
}
