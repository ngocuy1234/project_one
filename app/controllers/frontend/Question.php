<?php

namespace App\Controllers\Frontend;

use App\Controllers\baseController;
use App\Models\modelLesson;
use App\Models\modelQuestion;
use App\Models\modelMenu;
use App\Models\modelQuestionStatus;


class Question extends baseController
{
    private $menu;
    public function __construct()
    {
        $this->menu = modelMenu::sortMenu();
    }
    function index()
    {
        $question_id = isset($_GET['question_id']) ? $_GET['question_id'] : null;
        $biendem_answer = isset($_GET['biendem']) ? $_GET['biendem'] : null;
        $biendem = 0;
        $biendem += $biendem_answer;



        $dataQuestion = modelQuestion::where('question_id', "=", $question_id)->get();
        $lesson_id = $dataQuestion[0]['lesson_id'];

        $answer = $dataQuestion[0]['answer'];
        $dataLessonJoinQuestion = modelLesson::LessonJoinQuestion($lesson_id);;
        $dataQuestionInLesson = modelQuestion::where('lesson_id', "=", $lesson_id)->get();
        if (isset($_SESSION['user_info'])) {
            $student_id = $_SESSION['user_info'][0]['student_id'];
        }

        //  Lấy ra câu hỏi liên quan đến student và trạng thái.
        // $dataQuestionStatus = modelQuestion::innerJoin($lesson_id);
        // $this->dd($dataQuestionStatus);
        $answers = explode("/", $answer);
        $countAnswers = count($answers);
        // $this->dd($dataQuestionStatus);


        $this->render("customer.quiz", [
            'dataQuestion' => $dataQuestion[0],
            'dataLessonJoinQuestion' => $dataLessonJoinQuestion[0],
            'menu' => $this->menu,
            'dataQuestionInLesson' => $dataQuestionInLesson,
            'countAnswers' => $countAnswers,
            'biendem' => $biendem_answer,
            'lesson_id' => $lesson_id,
            'subject_slug' => $dataLessonJoinQuestion[0]['subject_slug']
        ]);
    }

    public  function answerQuestion()
    {
        // $this->dd($_POST);
        if ($_SERVER['REQUEST_METHOD'] === "POST") {
            extract($_POST);
            //  $this->dd($_POST);
            if (!empty($anwer_one) || !empty($anwer_two) || !empty($anwer_three) || !empty($anwer_four)) {
                $answer = [];
                isset($anwer_one) ? $answer[0] = $anwer_one : [];
                isset($anwer_two) ? $answer[1] = $anwer_two : [];
                isset($anwer_three) ? $answer[2] = $anwer_three : [];
                isset($anwer_four) ? $answer[3] = $anwer_four : [];

                $answer_check =  implode("/", array_values($answer));

                $id = $question_id;
                // $this->dd($id);
                $question = modelQuestion::where('question_id', "=", $id)->get();
                $answerQuestion = $question[0]['answer'];

                // ------------------
                $Question = modelQuestion::where('lesson_id', "=", $lesson_id)->get();

                if ($answer_check !== $answerQuestion) {

                    $_SESSION['error'] = 'Đáp án sai !!!';
                    header('location: ' . $_SERVER['HTTP_REFERER']);
                    die();
                } else {
                    if (isset($_SESSION['user_info'])) {
                        $student_id = $_SESSION['user_info'][0]['student_id'];
                    }
                    $dataQuestion = modelQuestion::where('question_id', "=", $question_id)->get();
                    $lesson_id = $dataQuestion[0]['lesson_id'];
                    $CountQuestion = modelQuestion::where('lesson_id', "=", $lesson_id)->get();
                    $CountQuestions = count($CountQuestion);
                    $a = round(100 / $CountQuestions, 2);

                    $data = [
                        'student_id' =>  $student_id,
                        'question_id' => $question_id,
                        'question_status' => 1,
                        'question_point' => $a,
                    ];
                    // check câu trả lời đúng.
                    $dataStatusQuestion = modelQuestionStatus::where_and($question_id, $student_id);
                    $questionStatus = $dataStatusQuestion[0]['question_status'];
                    if ($questionStatus == 1) {
                        $_SESSION['error'] = 'Đáp án này bạn đã làn đúng trước đó !!!';
                        header('location: ' . $_SERVER['HTTP_REFERER']);
                        die();
                    }

                    modelQuestionStatus::insert($data);


                    $_SESSION['success'] = 'Đáp án đúng !!!';
                    header('location: ' . $_SERVER['HTTP_REFERER']);
                    die();
                }
            } else {
                $_SESSION['error'] = 'Chưa chọn đáp án !!!';
                header('location: ' . $_SERVER['HTTP_REFERER']);
                die();
            }
        }
    }
}
