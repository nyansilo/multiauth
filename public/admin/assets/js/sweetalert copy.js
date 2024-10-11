$(function(){
    $(document).on('click','#delete',function(e){
        e.preventDefault();
        //var link = $('#category-form').attr('action');

        var link = 'http://127.0.0.1:8000/admin/product_category';

        alert(link);


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
                      window.location.href = link
                      Swal.fire(
                        'Deleted!',
                        'Your data has been deleted.',
                        'success'
                      )
                    }
                  }) 


    });

  });
