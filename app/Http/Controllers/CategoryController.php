<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\App;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    // ~~~~~~~~~~~~~~~~~~~~~~~~ API LIST  ALL CATEGORY WITH APP~~~~~~~~~~~~~~~~~~~~~~~~~~~
    public function listCategory()
    {

        $categorys = Category::all();

        foreach ($categorys as  $category) {

            $apps = App::where('category_id', $category->category_id)->get();

            $batch[] = array(
                "categorie_id" => $category->category_id,
                "category_name" => $category->category_name,
                "category_icon" => "$category->category_icon",
                "app" => $apps,

            );
        }

        $stud = array(
            "status" => 200,
            "meaasge" => "success",
            "data" => $batch
        );
        return json_encode($stud);
    }
    //~~~~~~~~~~~~~~~~~~~~~~~~ API SEARCH CATEGORY ~~~~~~~~~~~~~~~~~~~~~~~~~~
    public function searchCategory(Request $req)
    {

        $categorys = Category::where('category_id', $req->category_id)->get();

        foreach ($categorys as  $category) {

            $apps = App::where('category_id', $category->category_id)->get();

            $batch[] = array(
                "categorie_id" => $category->category_id,
                "category_name" => $category->category_name,
                "category_icon" => "$category->category_icon",
                "app" => $apps,

            );
        }

        $stud = array(
            "status" => 200,
            "meaasge" => "success",
            "data" => $batch
        );
        return json_encode($stud);
    }

    //  ~~~~~~~~~~~~~~~~~~~~~SHOW CATEGORY TABLE~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    function showCategoryTable()
    {
        $categories = Category::all();

        return view("category/category_table", ["categories" => $categories]);
    }

    //~~~~~~~~~~~~~~~~~~ ADD CATEGORY FROM  ADMIN ~~~~~~~~~~~~~~~~~~~~~~~~
    public function addCategory(Request $req)
    {

        $access = session()->get('access');
        if ($access == 'true') {


            $this->validate($req, [

                'category_name' => 'required',
                'category_icon' => 'mimes:jpeg,jpg,png,gif,jfif|required'

            ]);

            $categories = new Category;

            $categories->category_name = $req->category_name;


            $pic = $req->file('category_icon');
            $new_file = time() . rand(1, 1000) . "." . $pic->getClientOriginalExtension();
            $pic->move("public/img", $new_file);

            $categories->category_icon = $new_file;

            if ($categories->save()) {
                return redirect('add_category')->with("success", "Insert Success");
            } else {
                return redirect('add_category')->with("fail", "Inser fail");
            }
        } else {
            return redirect('add_category')->with('access_msg', 'You are not Authorized');
        }
    }

    //~~~~~~~~~~~~~~~~~~~  DELETE CATEGORY ~~~~~~~~~~~~~~~~~~~~

    public function deleteCategory($category_id)
    {
        $access = session()->get('access');
        if ($access == 'true') {
            $category = Category::find($category_id);
            $path = "public/img/" . $category->category_icon;

            if (file_exists($path)) {
                unlink($path);
            }



            if ($category->delete()) {
                return redirect('category_table')->with("success", "Delete Success");
            } else {
                return redirect('category_table')->with("fail", "Delete fail");
            }
        } else {
            return redirect('category_table')->with('access_msg', 'You are not Authorized');
        }
    }

    //~~~~~~~~~~~~~~~~~~~~ SHOW UPDATE DATA ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    function showUpdateCategoryData($category_id)
    {

        $data = Category::find($category_id);

        return view("category/update_category", ['updatedata' => $data]);
    }

    //~~~~~~~~~~~~~~~~~~~  UPDATE CATEGORY ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

    public function updateCategory(Request $req)
    {
        $access = session()->get('access');
        if ($access == 'true') {
            $categories = Category::find($req->category_id);

            $categories->category_name = $req->category_name;
            $deleteIcon = $categories->category_icon;

            if ($req->file('category_icon')) {

                $pic = $req->file('category_icon');
                $new_file = time() . rand(1, 1000) . "." . $pic->getClientOriginalExtension();
                $pic->move("public/img/", $new_file);
                $categories->category_icon = $new_file;
                
                $path = "public/img/" . $deleteIcon;
                if (file_exists($path)) {
                    unlink($path);
                }
            }
            if ($categories->save()) {
                return redirect('category_table')->with("success", "Insert Success");
            } else {

                return redirect('category_table')->with("fail", "Insert fail");
            }
        } else {
            return redirect('category_table')->with('access_msg', 'You are not Authorized');
        }
    }
}
