<?php

date_default_timezone_set('Asia/Ho_Chi_Minh');
session_start();
$url = isset($_GET['url']) ? $_GET['url'] : "/";
require_once "./vendor/autoload.php";

use App\Controllers\Backend\adminCateSubject;
use App\Controllers\Backend\adminLesson;
use App\Controllers\Backend\adminMain;
use App\Controllers\Backend\adminMenu;
use App\Controllers\Backend\adminQuestion;
use App\Controllers\Backend\adminSubject;
use App\Controllers\Backend\Banner;
use App\Controllers\Frontend\Courses;
use App\Controllers\Frontend\introCourse;
use App\Controllers\Frontend\Lesson;

switch ($url) {
    case 'quan-tri':
        $ctr = new adminMain();
        echo $ctr->index();
        break;

        // 

    case 'danh-sach-mon':
        $ctr = new adminSubject();
        echo $ctr->index();
        break;
    case 'trang-them-mon-hoc':
        $ctr = new adminSubject();
        echo $ctr->addPage();
        break;
    case 'them-mon-hoc':
        $ctr = new adminSubject();
        echo $ctr->addSubject();
        break;
    case 'xoa-khoa-hoc':
        $ctr = new adminSubject();
        $ctr->delete();
        break;
    case 'sua-khoa-hoc':
        $ctr = new adminSubject();
        echo $ctr->editSubject();
        break;
    case 'update-mon-hoc':
        $ctr = new adminSubject();
        $ctr->updateSubject();
        break;
        //  Danh mục khóa học.
    case 'danh-sach-loai-mon-hoc';
        $ctr = new adminCateSubject();
        echo $ctr->index();
        break;
    case 'them-danh-muc';
        $ctr = new adminCateSubject();
        echo $ctr->addCate();
        break;
    case 'xoa-danh-muc';
        $ctr = new adminCateSubject();
        echo $ctr->delete();
        break;
    case 'sua-danh-muc';
        $ctr = new adminCateSubject();
        echo $ctr->edit();
        break;
    case 'update-danh-muc';
        $ctr = new adminCateSubject();
        echo $ctr->update();
        break;
        // Danh sách môn học.
    case 'chi-tiet-mon-hoc';
        $ctr = new adminLesson();
        echo $ctr->index();
        break;
        // Danh sách câu hỏi.
    case 'danh-sach-cau-hoi';
        $ctr = new adminQuestion;
        echo $ctr->index();
        break;
    case 'trang-them-cau-hoi';
        $ctr = new adminQuestion;
        echo $ctr->addPage();
        break;
    case 'them-cau-hoi';
        $ctr = new adminQuestion;
        echo $ctr->addQuestion();
        break;
    case 'xoa-cau-hoi';
        $ctr = new adminQuestion;
        echo $ctr->deleteQuestion();
        break;
    case 'test-cau-hoi';
        $ctr = new adminQuestion;
        echo $ctr->testQuestion();
        break;
    case 'test-run';
        $ctr = new adminQuestion;
        echo $ctr->test();
        break;

        // Danh sách bài học
    case 'them-bai-hoc';
        $ctr = new adminLesson();
        echo $ctr->insertLesson();
        break;
    case 'trang-them-bai-hoc';
        $ctr = new adminLesson();
        echo $ctr->addLesson();
        break;
    case 'xoa-bai-hoc';
        $ctr = new adminLesson();
        echo $ctr->deleteLesson();
        break;
    case 'trang-sua-bai-hoc';
        $ctr = new adminLesson();
        echo $ctr->editPage();
        break;
    case 'sua-bai-hoc';
        $ctr = new adminLesson();
        echo $ctr->editLesson();
        break;

        // Danh sách menu.
    case 'danh-sach-menu';
        $ctr = new adminMenu();
        echo $ctr->index();
        break;
    case 'them-menu';
        $ctr = new adminMenu();
        echo $ctr->addMenu();
        break;
    case 'xoa-menu';
        $ctr = new adminMenu();
        echo $ctr->deleteMenu();
        break;
    case 'trang-sua-menu';
        $ctr = new adminMenu();
        echo $ctr->editPage();
        break;
    case 'sua-menu';
        $ctr = new adminMenu();
        echo $ctr->edit();
        break;
    case 'cap-nhat-menu';
        $ctr = new adminMenu();
        echo $ctr->updateIndexs();
        break;

        // -----------------

        // Banner layout.
    case 'danh-sach-banner';
        $ctr = new Banner();
        echo $ctr->index();
        break;
    case 'them-banner';
        $ctr = new Banner();
        echo $ctr->addBanner();
        break;


        // -------- Giao diện khách hàng

        // Hiển thị câu hỏi.
    case 'khoa-hoc/cau-hoi';
        $ctr = new Lesson();
        echo $ctr->question();
        break;
        // Hiển thi khóa học.
    case 'khoa-hoc';
        $ctr = new Courses();
        echo $ctr->index();
        break;
    case 'khoa-hoc-theo-nganh';
        $ctr = new Courses();
        echo $ctr->listCourse();
        break;

        // Bài học
    case 'bai-hoc';
        $ctr = new Lesson();
        echo $ctr->index();
        break;
    case 'mo-ta-mon-hoc';
        $ctr = new introCourse();
        echo $ctr->index();
        break;
    case 'bai-hoc-tiep-theo';
        $ctr = new Lesson();
        echo $ctr->nextLesson();
        break;

        // Tìm kiếm khóa học.
    case 'tim-kiem-khoa-hoc';
        $ctr = new Courses();
        echo $ctr->search();
        break;

    default:
        "Không tồn tại file nào";
        break;
}
