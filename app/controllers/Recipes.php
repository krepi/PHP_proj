<?php

class Recipes extends Controller
{
    public function __construct()
    {
        if (!isLoggedIn()) {
            redirect('users/login');
        }

        $this->recipeModel = $this->model('Recipe');
        $this->userModel = $this->model('User');

    }
    public function index()
    {
        // todo decide about calling that method
        //Get recipes Ids from DB
        $recipes = $this->recipeModel->getRecipes();
//        $recipes = $this->recipeApi->getRecipes();


        $data = [
            'recipes' => $recipes->title
        ];
        $this->view('recipes/index', $data);
    }



    public function add(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){

            $data = [
                'recipe_id' => trim($_POST['recipe_id']),
                'user_id' => $_SESSION['user_id'],

            ];
            $id = $data['recipe_id'];
            $user = $_SESSION['user_id'];

            //check if recipe_id is already liked in database
            if($this->recipeModel->findRecipeById($id, $user)){
                echo "recipe $id is already added by user $user  ";
            } else {
                // adding to database  if not
                if ($this->recipeModel->addRecipe($data)) {
                    flash('post_message', 'recipe added to favorites');
                    redirect('/');
                    echo "dodane przez controller z if . $id . user . $user";
                } else {
                    echo " cos poszło nie tak";
                }
            }





        }

    }
}