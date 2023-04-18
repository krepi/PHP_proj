<?php

class Recipes extends Controller
{
    public function __construct()
    {
//        if (!isLoggedIn()) {
//            redirect('users/login');
//        }

        $this->recipeModel = $this->model('Recipe');
        $this->userModel = $this->model('User');
        $this->apiModel = $this->model('RecipeApi');

    }

    public function index()
    {
        // todo decide about calling that method
        if (isLoggedIn()) {
            // setting Api search function
//            $this->apiModel->complexSearch();
            //fetching datas from  Api
            $dataApi = $this->apiModel->getComplexData();
            // exteract recipes from   Api datas
            $recipesApi = $dataApi['results'];

            $newRecipes=[];
            // check is  recipe in DB as favorite  and add proper class for button
            foreach ($recipesApi as $recipe) {

                $user = $_SESSION['user_id'];

                $id = $recipe['id'];

                if ($this->recipeModel->findRecipeById($id, $user)) {
                    $btn_class = 'btn-warning';
                } else {
                    $btn_class = 'btn-light';
                }
                // add btn class for recipe
                $recipe ['btn_class'] = $btn_class;
                //add recipe to recipes
                $newRecipes[$recipe['id']] = $recipe;
            }

            $data = [
                'title' => 'Notes z recipe ',
                'description' => 'Tutaj znajdziesz swoje ulubione przepisy i zestawy',
                'recipes' => $newRecipes,
                'fromApi'=> true

            ];
            $this->view('recipes/index', $data);

        } else {
                // todo decide about calling that method here
                //Get recipes
                $recipes = $this->recipeModel->getRecipes();
            $data = [
                'title' => 'Formulas',
                'description' => 'Formulas chosen by our users, log in or sign up for more',
                'recipes' => $recipes,
                'fromApi'=> false

            ];
            $this->view('recipes/index', $data);
        }


    }

// adding recipe to favourites Database table
    public function add()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $data = [
                'recipe_id' => trim($_POST['recipe_id']),
                'recipe_title' => trim($_POST['recipe_title']),
                'recipe_img' => trim($_POST['recipe_img']),
                'user_id' => $_SESSION['user_id'],

            ];
            $id = $data['recipe_id'];
            $user = $_SESSION['user_id'];

            //check if recipe_id is already liked in database
            if ($this->recipeModel->findRecipeById($id, $user)) {
               ;
                if($this->recipeModel->deleteRecipe($id, $user));{
                    flash('post_message', 'recipe deleted from favourites ');
                    redirect('recipes/index');
                }

            } else {
                // adding to database  if not
                if ($this->recipeModel->addRecipe($data)) {
                    flash('post_message', 'recipe added to favorites');
                    redirect('recipes/index');
                    echo "dodane przez controller z if . $id . user . $user";

                } else {
                    echo " cos poszło nie tak";
                }
            }


        }

    }

        public function your_recipes()
    {
        if (isLoggedIn()) {
            $user_id = $_SESSION['user_id'];
            $recipes = $this->recipeModel->getUserRecipes($user_id);
            $data = [
                'title' => 'Twoje przepisy',
                'description'=> 'tutaj sa twoje ulubione przepisy i zestawy',
                'recipes' => $recipes
                ];

            $this->view('recipes/your_recipes',$data);
        }
    }

}