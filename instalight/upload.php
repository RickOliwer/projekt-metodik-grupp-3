<?php

function addImageToFolder($imageInput, $folder, $imageByteSize){

    print_r($imageInput);

    $imageName = $_FILES[$imageInput]['name'];
    $imageTmpName = $_FILES[$imageInput]['tmp_name'];
    $imageSize = $_FILES[$imageInput]['size'];
    $imageError = $_FILES[$imageInput]['error'];
    $imageType = $_FILES[$imageInput]['type'];  

    $imageExt = explode('.', $imageName);
    $imageActualExt = strtolower(end($imageExt));

    $allowed = array('jpg', 'jpeg', 'png', 'pdf');

    if(in_array($imageActualExt, $allowed)){
        if($imageError === 0){
            if($imageSize < $imageByteSize){
                $imageNameNew = uniqid('', true).".".$imageActualExt;
                $imageDestination = $folder.basename($imageNameNew);
                //maybe not basename

                if (move_uploaded_file($imageTmpName, $imageDestination)) {
                    echo "Image uploaded successfully";

                } else {
                    echo "error";
                }

            } else {
                echo "Your file is to big";
            }
        } else {
            echo "there was an error uploading your file!"; 
        }
    } else {
        echo "You cannot upload files of this type";
    }
    return $imageNameNew;

}
?>