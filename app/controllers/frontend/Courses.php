<?php

namespace App\Controllers\Frontend;

use App\Controllers\baseController;
use App\Models\modelCateSubject;
use App\Models\modelMenu;
use App\Models\modelSubject;

class Courses extends baseController
{
    private $menu;
    public function __construct()
    {
        $this->menu = modelMenu::all();
    }

    public function index()
    {
        $subject = modelSubject::all();
        $cateSubject = modelCateSubject::all();
        // $this->dd($this->menu);
        $this->render("customer.courses", [
            'cateSubject' => $cateSubject,
            'subject' => $subject,
            'menu' => $this->menu,
        ]);
    }

    public function listCourse()
    {
        $cate_id = $_GET['cate_id'];

        $course = [];
        if ($cate_id == null) {
            $course = modelSubject::all();
        } else {
            $course = modelSubject::where('cate_id', "=", $cate_id)->get();
            foreach ($course as $key) {
                $type = '';
                $sale = '';
                $class = '';
                if ((int)$key['type_id'] == 0) {
                    $type = "Miễn Phí";
                    $class = 'course__price--free';
                } else {
                    $class = 'course__price--cost';
                    $type = number_format($key['subject_price']);
                    $sale = number_format($key['subject_sale']) . 'đ';
                }
                echo "
            <div class='course-item'>
                <div class='course-poster'>
                    <img src='./public/img/" . $key['subject_img'] . "' class=' img-fluid'></img>
                </div>
                <div class='course-text'>
                    <h3 class='course__title' style='font-size: 15px;'>" . $key['subject_name'] . "</h3>
                    <span class='course__members'>
                        <i class='fas fa-users'></i>
                        123
                    </span>
                    <span class='course__price " . $class . "'>" . $type . "</span>
                    <span class='course__price course__price--old'>" . $sale . "</span>
                </div>
            </div>";
            }
        }
    }
}
