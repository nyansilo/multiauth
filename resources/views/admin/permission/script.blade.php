<script type="text/javascript">
$(document).ready(function (){
    $('#name').on('keyup', function() {
        var str= $('#name').val();
        str = str.replace(/\W+(?!$)/g, '-').toLowerCase();
        $('#slug').val(str);
        $('slug').attr('placeholder', str);
    });  
    
    $('#name').on('keyup', function() {
        var str= $('#name').val();
        str = str.toUpperCase();
        $('#displayName').val(str);
        $('display_name').attr('placeholder', str);
    }); 
});

</script>

<script type="text/javascript">
    $(document).ready(function (){
        $('#myForm').validate({
            rules: {
                category_title: {
                    required : true,
                }, 
                category_slug: {
                    required : true,
                }, 
                
            },
            messages :{
                category_title: {
                    required : 'Please Enter Category Title',
                }, 
                category_slug: {
                    required : 'Please Select Category Slug',
                }, 
                 
            },
            errorElement : 'span', 
            errorPlacement: function (error,element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight : function(element, errorClass, validClass){
                $(element).addClass('is-invalid');
            },
            unhighlight : function(element, errorClass, validClass){
                $(element).removeClass('is-invalid');
            },
        });
    });
    
</script>


