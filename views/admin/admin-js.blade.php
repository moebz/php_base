@if ((Acme\Auth\LoggedIn::user()) && (Acme\Auth\LoggedIn::user()->access_level == 2))
        
    <script>
    var editor;
    function makePageEditable(item) {
        if ($(".editablecontent").length != 0) {
            $(".admin-hidden").addClass('admin-display').removeClass('admin-hidden');
            $(item).attr("onclick","turnOffEditing(this)");
            $(item).html("Turn off editing");
            $(".editablecontent").attr("contenteditable","true");
            $(".editablecontent").addClass("outlined");
            $("#old").val($("#editablecontent").html());
            var editoroptions = {
                allowedContent: true,
                floatSpaceDockedOffsetX: 150
            }
            var elements = document.getElementsByClassName( 'editablecontent' );
            for ( var i = 0; i < elements.length; ++i ) {
                CKEDITOR.inline( elements[ i ], editoroptions );
            }
            CKEDITOR.on( 'instanceLoaded', function(event) {
                    console.log("instanceLoaded");
                    editor = event.editor;
            });
        } else {
            alert ('No editable content on page!');
        }
    }
    function turnOffEditing(item) {
        for (name in CKEDITOR.instances) {
            CKEDITOR.instances[name].destroy()
        }
        $(".admin-display").addClass('admin-hidden').removeClass('admin-display');
        $(".menu-item").attr("onclick","makePageEditable(this)");
        $(".menu-item").html("Edit content");
        $(".editablecontent").attr("contenteditable","false");
        $(".editablecontent").removeClass("outlined");
        if ($('#old').val() != ''){
            $(".editablecontent").html($("#old").val());
        }
    }
    var options = {
        success: function() { 
                    alert('Thanks for your comment!'); 
                }   
    };
    function saveEditedPage() {
        // get the data from ckeditor
        var pagedata = editor.getData();
        // save this data
        $("#thedata").val(pagedata);
        console.log("pagedata = " + pagedata);
        var options = { success: showResponse };
        console.log("options = " + JSON.stringify(options));
        $("#editpage").unbind('submit')
        $("#editpage").ajaxSubmit(options);
        console.log("terminado?");
        return false;
    }
    function showResponse(responseText, statusText, xhr, $form)
    {
        console.log("antes del if, statusText = " + statusText);
        console.log("antes del if, xhr = " + xhr);
        if (responseText == 'OK'){
            $("#old").val('');
            turnOffEditing();
        } else {
            alert("responseText = " + responseText);
            console.log("responseText = " + responseText);
            console.log("statusText = " + statusText);
            console.log("xhr = " + xhr);
        }
    }
    </script>

@endif