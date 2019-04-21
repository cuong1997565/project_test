$("div.alert").delay(3000).slideUp();


function xacnhanxoa (msg) {
     if(window.confirm(msg)){
         return true;
     }
     return false;
}

$(document).ready(function(){
    $("#addImages").click(function(){
        $("#insert").append('<div class="form-group"><label>Images</label><input type="file" name="fProductDetail[]"></div>');
    });
});


$(document).ready(function(){
    $("a#del_img_demo").on('click',function(){
        var url = "http://localhost/project/admin/product/delete-img/";
        var _token = $("form[name='frmEditProduct']").find("input[name='_token']").val();
        var idHinh = $(this).parent().find("img").attr("idHinh");
        var img = $(this).parent().find("img").attr("src");
        var rid = $(this).parent().find("img").attr("id");
        $.ajax({
            url: url+idHinh,
            type: 'POST',
            cache: false,
            data: {
                "_token":_token,
                "idHinh":idHinh,
                "urlHinh":img
            },
            success: function (data) {
                if(data == "Oke"){
                     $("#"+rid).remove();
                } else{
                    alert("Error ! Please Contact Admin");
                }
            }
        })
    });
});



