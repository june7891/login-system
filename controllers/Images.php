<?php

require_once '../models/Image.php';
require_once '../helpers/session_helper.php';


class Images {
    
    public string $id;
    public string $name;
    public string $image_url;
    public string $title;
    public string $image_date;
    public string $user_id;

  
        private $userModel;
        
        public function __construct(){
            $this->imageModel = new Image;
        }

        public function upload(){
         
// echo "<pre>";
// print_r($_FILES['my_image']);
// echo "</pre>";


            $img_name = $_FILES['my_image']['name'];
	$img_size = $_FILES['my_image']['size'];
	$tmp_name = $_FILES['my_image']['tmp_name'];
	$error = $_FILES['my_image']['error'];
	$title = htmlspecialchars($_POST['title']);



       

    
    $user_id = $_SESSION['id'];
    //Init data
  

	if($error === 0) {
		if($img_size > 1250000) {
			flash("upload", "image est trop grande!");
	
		}else {
			$img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
			$img_ex_lc = strtolower($img_ex);
			$allowed_exs = array("jpg", "jpeg", "png");
	
			if(in_array($img_ex_lc, $allowed_exs)){
				$new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
				$img_upload_path = '../images/uploads/'.$new_img_name;


				move_uploaded_file($tmp_name, $img_upload_path);
			

		 $data = [
            'name' => $new_img_name,
            'image_url' => $img_upload_path,
            'title' => htmlspecialchars($_POST['title']),
        
            ];
	


                 //Upload image
            if($this->imageModel->upload($data, $user_id)){
                redirect("../gallery.php");
            }else{
                die("Something went wrong");
            }

			} else {
				echo "pas le bon type";
		
			}
		}
	
	} else {
		
	}
	
	echo "File upload successfully";
}
            


             public function updateGallery(){
        //Process form
        
        //Sanitize POST data
        $_POST = filter_input_array(INPUT_POST);
        
        $user_id = $_SESSION['id'];
        //Init data
        $data = [
            'user_id'=>$id,
            'firstname' => htmlspecialchars($_POST['firstname']),
            'lastname' => htmlspecialchars($_POST['lastname']),
            'phoneNumber' => htmlspecialchars($_POST['phoneNumber']),
            'dateOfBirth' => htmlspecialchars($_POST['dateOfBirth']),
            'address' => htmlspecialchars($_POST['address']),
            'gender' => htmlspecialchars($_POST['gender'])
        ];

   
    
        if($this->imageModel->updateImage($data, $image_id)){
            redirect("../index.php");
        }else{
            die("Something went wrong");
        }
    }



    public function displayImages(){

        





        
        if($this->imageModel->displayImages($data, $user_id)){
            redirect("../gallery.php");
        }else{
            die("Something went wrong");
        }
    }
}

    

   


    // public function createUserSession($user){
    //     $_SESSION['id'] = $user->id;
    //     $_SESSION['username'] = $user->username;
    //     $_SESSION['email'] = $user->email;
    //     redirect("../index.php");
    // }

    // public function logout(){
    //     unset($_SESSION['id']);
    //     unset($_SESSION['username']);
    //     unset($_SESSION['email']);
    //     session_destroy();
    //     redirect("../index.php");
    // }


    $init = new Images;

    //Ensure that user is sending a post request
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        switch($_POST['type']){
            case 'upload-image':
                $init->upload();
                break;
            case 'update-gallery':
                $init->update();
                break;
            case 'delete-image':
                $init->delete();
                break;
            case 'update-account':
                $init->updateAccount();
                break;
            default:
            redirect("../index.php");
        }
        
    }

    
    