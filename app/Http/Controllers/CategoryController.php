<?php
    namespace App\Http\Controllers;

    use Illuminate\Http\Request;
    use App\Http\Controllers\Controller;
    use App\Models\Category;
    use View;

    class CategoryController extends Controller {
        public function showCategories(Request $request) {
            $data['tab'] = 'category-manage';
            $page = 1;
            if (isset($request->page)) {
                $page = $request->page;
            }
            $categories = Category::all();

            $categoriesPerPage = 10;
            $data['maxPage'] = count($categories)/$categoriesPerPage + 1;

            $data['categories'] = array();
            for ($i = ($page-1)*$categoriesPerPage; $i < $page*$categoriesPerPage; $i++) {
                if (empty($categories[$i])) {
                    break;
                }
                $data['categories'][] = $categories[$i];
            }
            $data['page'] = $page;

            $view = View::make('admin/index', $data);
            return $view;
        }

        public function addCategory(Request $request) {
            $tab = 'add-category';
            if ($request->isMethod('post')) {
                $name = $request->name;
                $parentId = $request->parentId;
                
                $category = new Category();
                $valid = True;
                if (!empty($name)) {
                    $category->name = $name;
                }
                else {
                    $valid = False;
                    $nameError = "name is empty";
                }

                if (!empty($parentId)) {
                    $category->parent_id = $parentId;
                }
                else {
                    $category->parent_id = 0;
                }
                
                
                if ($valid) {
                    if ($category->parent_id == 0) {
                        $category->type = 1;
                    }
                    else {
                        $parent = Category::where('id', $category->parent_id)->first();
                        $category->type = $parent->type++;
                    }
                    $category->save();
                }
            }

            $categories = Category::all();
            $data = get_defined_vars();

            $view = View::make('admin/index', $data);
            return $view;

        }

        public function updateCategory(Request $request) {
            $tab = 'add-category';
            $id = $request->id;
            $category = Category::where('id', $id)->first();
            if (!empty($category)) {
                $name = $category->name;
                $parentId = $category->parent_id;
                
            }
            else {
                return "Category is not exist";
            }
            
            if ($request->isMethod('post')) {
                $name = $request->name;
                $parentId = $request->parentId;
                
                $valid = True;

                if (!empty($name)) {
                    $category->name = $name;
                }
                else {
                    $valid = False;
                    $nameError = "name is empty";
                }

                if (!empty($parentId)) {
                    $category->parent_id = $parentId;
                }
                else {
                    $category->parent_id = 0;
                }
                
                
                if ($valid) {
                    if ($category->parent_id == 0) {
                        $category->type = 1;
                    }
                    else {
                        $parent = Category::where('id', $category->parent_id)->first();
                        $category->type = $parent->type++;
                    }                    
                    $category->save();
                }
            }

            $categories = Category::all();
            $data = get_defined_vars();

            $view = View::make('admin/index', $data);
            return $view;
        }

        public function deleteCategories(Request $request) {
            $ids = $request->ids;

            Category::destroy($ids);
        }
    }
?>