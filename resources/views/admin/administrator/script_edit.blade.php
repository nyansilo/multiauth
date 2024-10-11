<script type="text/javascript">
    $(document).ready(function (){
        $('#firtName').on('keyup', function() {
            var str= $('#firstName').val();
            str = str.replace(/\W+(?!$)/g, '-').toLowerCase();
            $('#slug').val(str);
            $('slug').attr('placeholder', str);
        });        
    });
    
    </script>

<script>

    $(document).ready(function(){
        var permissions_box = $('#permissions_box');
        var permissions_ckeckbox_list = $('#permissions_ckeckbox_list');
        var  user_permissions_box = $('#user_permissions_box');
        var  user_permissions_ckeckbox_list = $('#user_permissions_ckeckbox_list');


        permissions_box.hide(); // hide all boxes


        $('#role').on('change', function() {
            var role = $(this).find(':selected');    
            var role_id = role.data('role-id');
            var role_slug = role.data('role-slug');

            permissions_ckeckbox_list.empty();
            user_permissions_box.empty();

            $.ajax({
                url: "/admin/admin/create",
                method: 'get',
                dataType: 'json',
                data: {
                    role_id: role_id,
                    role_slug: role_slug,
                }
            }).done(function(data) {
                
                //console.log(data);
                
                permissions_box.show();                        
                // permissions_ckeckbox_list.empty();

              

                $.each(data, function(index, element){
                    $(permissions_ckeckbox_list).append(       
                        '<div class="form-check">'+                         
                            '<input class="form-check-input" type="checkbox" name="permissions[]" id="'+ element.slug +'" value="'+ element.id +'">' +
                            '<label class="form-check-label" for="'+ element.slug +'">'+element.name +'</label>'+
                        '</div>'
                    );

                });
            });
        });
    });

</script>
