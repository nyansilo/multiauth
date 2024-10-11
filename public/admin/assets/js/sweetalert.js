$(function(){
    $(document).on('click','#delete',function(e){
        e.preventDefault();
        //var link = $('#category-form').attr('action');

        var form = $(this).parents('form');




                  Swal.fire({
                    title: 'Are you sure?',
                    text: "Delete This Data?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                  }).then((result) => {
                    if (result.isConfirmed) {
                      
                      Swal.fire(
                        'Deleted!',
                        'Your data has been deleted.',
                        'success'
                      )
                      form.submit();
                    } else {
                        swal.fire(
                            'Not Deleted',
                            'Something went wrong',
                            'error'

                        );
                    }
                  }) 


    });

  });
