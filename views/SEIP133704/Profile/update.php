<?php

    include_once ("../../../vendor/autoload.php");
    use App\Bitm\SEIP133704\Profile\Picture;
    use App\Bitm\SEIP133704\Profile\Uses;
    use App\Bitm\SEIP133704\GlobalClasses\Utility;
    Utility::d($_FILES);
    Utility::d($_POST);

    $profilePicture = new Picture();
    $singleInfo = $profilePicture->prepare($_POST)->view();

    if(isset($_FILES['image']) && !empty($_FILES['image']['name'])){
        $imageName = $_FILES['image']['name'];
        $temporaryFileName = $_FILES['image']['tmp_name'];
        unlink($_SERVER['DOCUMENT_ROOT'],'AtomicProjectB22_AshfakMd.Shibli_133704/resource/images/'.$singleInfo->images);
        move_uploaded_file($temporaryFileName, '../../../resource/images'.$imageName);
        $_POST['image'] = $imageName;

    }

    $profilePicture->prepare($_POST)->update();
?>