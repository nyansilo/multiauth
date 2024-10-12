<script type="text/javascript">
    $(document).ready(function (){
        $('#name').on('keyup', function() {
            var str= $('#name').val();
            str = str.replace(/\W+(?!$)/g, '-').toLowerCase();
            $('#slug').val(str);
            $('slug').attr('placeholder', str);
        });  
    
    });
    
    </script>

<script type="text/javascript">
    $(document).ready(function (){
        $('#myForm').validate({
            rules: {
                unit_name: {
                    required : true,
                }, 
                unit_slug: {
                    required : true,
                }, 
                
            },
            messages :{
                unit_name: {
                    required : 'Please Enter Unit Title',
                }, 
                unit_slug: {
                    required : 'Please Select Unit Slug',
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


