<?php
    include "header.php";
    use App\Bitm\SEIP133704\OrganizationSummary\Summary;
    use App\Bitm\SEIP133704\OrganizationSummary\Uses;
    use App\Bitm\SEIP133704\GlobalClasses\Utility;
    use App\Bitm\SEIP133704\GlobalClasses\Message;


?>
<title>
    <?php echo Uses::siteKeyword()  ?>
</title>
<div class="container">
    <div class="container-fluid" style="margin-bottom: 250px; margin-top: 100px">

        <form class="form-horizontal" role="form" method="post" style="margin-top: 100px" action="store.php">
            <h2 style="padding-left: 80px; margin-bottom: 20px">
                Enter <?php echo Uses::siteKeyword()  ?>

            </h2>
            <div class="container-fluid">

                <div class="container-fluid">
                    <div class="col-sm-6">
                    <label class="control-label"> Organization name</label>
                    <input type="text" class="form-control" id="title" name="name" placeholder="Enter Your Organization Name" required>
                    </div>
                    <div class="col-sm-6"></div>
                    <div class="container">
                    <label class="control-label"><?php echo Uses::siteKeyword() ?></label>
                    <textarea  class="form-control" id="summary" name="summary" placeholder="Enter Your <?php echo Uses::siteKeyword()  ?>" required> </textarea>
                    <button type="submit" class="btn btn-success">Submit</button>
                    </div>
                </div>
                
            </div>
        </form>
    </div>
</div>
<script>
    tinymce.init({
        selector: 'textarea',
        height: 500,
        theme: 'modern',
        plugins: [
            'advlist autolink lists link image charmap print preview hr anchor pagebreak',
            'searchreplace wordcount visualblocks visualchars code fullscreen',
            'insertdatetime media nonbreaking save table contextmenu directionality',
            'emoticons template paste textcolor colorpicker textpattern imagetools'
        ],
        toolbar1: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
        toolbar2: 'print preview media | forecolor backcolor emoticons',
        image_advtab: true,
        content_css: [
            '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
            '//www.tinymce.com/css/codepen.min.css'
        ]
    });
</script>
<?php include "footer.php"?>

