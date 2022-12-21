<?php

namespace App\Controllers;

use App\Models\Articles;
use App\Utility\Upload;
use \Core\View;
use App\Utility\Mail;

/**
 * Product controller
 */
class Product extends \Core\Controller
{

    /**
     * Affiche la page d'ajout
     * @return void
     */
    public function indexAction()
    {

        if(isset($_POST['submit'])) {

            try {
                $f = $_POST;

                // TODO: Validation

                $f['user_id'] = $_SESSION['user']['id'];
                $id = Articles::save($f);


                if($_FILES['picture']["size"] != 0){
                    $pictureName = Upload::uploadFile($_FILES['picture'], $id);

                    Articles::attachPicture($id, $pictureName);
                }


                header('Location: /product/' . $id);
            } catch (\Exception $e){
                    var_dump($e);
            }
        }

        View::renderTemplate('Product/Add.html');
    }

    /**
     * Affiche la page d'un produit
     * @return void
     */
    public function showAction()
    {
        $id = $this->route_params['id'];

        try {
            Articles::addOneView($id);
            $suggestions = Articles::getSuggest();
            $article = Articles::getOne($id);
        } catch(\Exception $e){
            var_dump($e);
        }

        View::renderTemplate('Product/Show.html', [
            'article' => $article[0],
            'suggestions' => $suggestions
        ]);
    }

     /**
     * Affiche une page de contact et traite l'envoi du formulaire de contact (un mail est envoyé)
     */
    public function contactAction()
    {
    if(!isset($_SESSION["user"])){
        header("location: /login");
        
    }else{
      if($_SERVER["REQUEST_METHOD"] == "GET"){

     
        
        $product_id=$_GET["product_id"];
        $article = Articles::getOne($product_id);

        $success=false;
        if(array_key_exists("success", $_GET)){
            $success=true;
        }

        View::renderTemplate('Product/Contact.html', [
          'success' => $success,
           'article' =>  $article[0]
        ]);

    }
   else if($_SERVER["REQUEST_METHOD"] == "POST"){
   $message = $_POST["message"];
    $email = $_POST["email"];

    Mail::sendMail($recv=$email, $content=$message);
     
    $success = "Votre message a bien été envoyé !";
    header("location: ".$_SERVER['REQUEST_URI']."&success=true");

    }

    
    }
}
}
