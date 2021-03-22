<?php
function full_editor(){
    ?>
    <script src="<?php echo route("base_url"); ?>/tinymce/tinymce.min.js"></script>
    <script>
        tinymce.init({
            setup: function(editor) {
                editor.on("init", function(){
                    editor.shortcuts.remove('ctrl+s');
                });
            },
            mode : "specific_textareas",
            editor_selector: "oneditor",
            plugins: [
                "advlist autolink link image lists charmap preview hr anchor pagebreak spellchecker",
                "searchreplace wordcount visualblocks visualchars code insertdatetime media nonbreaking",
                "table contextmenu directionality emoticons template paste textcolor"
            ],
            // content_css: "css/content.css",
            toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | preview media | forecolor backcolor emoticons ",
            theme_advanced_path : false,
            relative_urls : false,
            remove_script_host : false,
            theme_advanced_resizing: true,
            style_formats: [
                {title: 'Bold text', inline: 'b'},
                {title: 'Header 1', block: 'h1'},
                {title: 'Header 2', block: 'h2'},
                {title: 'Header 3', block: 'h3'},
                {title: 'Header 4', block: 'h4'},
                {title: 'Header 5', block: 'h5'},
                {title: 'Header 6', block: 'h6'},
            ]
        });
    </script>
    <?php
}
function tiny_editor(){
    ?>
    <script src="<?php echo route("base_url"); ?>/tinymce/tinymce.min.js"></script>
    <script>
        tinymce.init({
            mode : "specific_textareas",
            editor_selector: "tinyeditor",
            menubar:false,
            statusbar: false,
            plugins: [
                'advlist autolink lists link image charmap anchor',
                'searchreplace',
                'media table',
            ],
            toolbar: '| bold italic | alignleft aligncenter alignright alignjustify | bullist numlist| link'
        });
    </script>
    <?php

}

function getCategoryName($id){
    $return = array();
    $cat_array = explode(',',$id);
   foreach ($cat_array as $cat){
      $cat =  DB::table('categories')->where('id',$cat)->first();
      if(empty($cat)){
        return "";
      }else {
          $return[] = $cat->category_name;
      }
   }
   return implode(',',$return);
}



?>
