<?php

namespace App\Controllers\Backend;

use App\Controllers\baseController;
use App\Models\modelCateSubject;

class adminCateSubject extends baseController
{

    function index()
    {
        $cateSubject = modelCateSubject::all();
        $this->render("admin.cateSubject.listCateSubject", ['dataCate' => $cateSubject]);
    }

    function addCate()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            extract($_POST);

            if (!empty($cate_name) || !trim($cate_name) || !empty($cate_slug) || !trim($cate_slug)) {
                $date_create = date('Y-m-d');
                // $this->dd($date_create);
                $data = [
                    'cate_name' => $cate_name,
                    'cate_slug' => $cate_slug,
                    'date_create' => $date_create,
                ];
                modelCateSubject::insertCate($data);
                header('Location: ./danh-sach-loai-mon-hoc');
            } else {
                $_SESSION['error'] = "Bạn đang bỏ trống dữ liệu !!!";
                header('Location: ./danh-sach-loai-mon-hoc');
                die();
            }
        }
    }

    // Hàm xóa
    function delete()
    {
        $id = isset($_GET['id']) ? $_GET['id'] : null;

        if (!$id) {
            header('Location: ./mess=id hiện không tồn tại');
            die();
        }

        $models = modelCateSubject::where("cate_id", "=", $id)->get();
        if (empty($models)) {
            header('Location: ./danh-sach-loai-mon-hoc?mess=id không tồn tại');
            die();
        } else {
            modelCateSubject::delete("cate_id", "=", $id)->executeQuery();
            header('Location: ./danh-sach-loai-mon-hoc');
        }
    }
}