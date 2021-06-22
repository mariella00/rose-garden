<script src="../js/sweetalert.min.js"></script>
<script>
   $(document).ready(function (){

    $('.delete_btn_plant').click(function (e){
        e.preventDefault();
        
        var deleteID = $(this).closest('tr').find('.delete_id_value').val();
        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this data",
            icon: "warning",
            buttons: true,
            dangerMode: true,
            })
            .then((willDelete) => {
            if (willDelete) {
                
                $.ajax({
                    type: "POST",
                    url: "../admin/plants-prod.php",
                    data: {
                        "delete_btn_set": 1,
                        "delete_id": deleteID,
                    },
                    success: function(response){
                        swal("Data deleted succesfully.",{
                            icon: "success",
                        }).then((result) => {
                            location.reload();
                    });

                    }
                });
            }
        });
    });
});
</script>

<!-- POTS ADMIN DELETE -->
<script>
   $(document).ready(function (){

    $('.delete_btn_pots').click(function (e){
        e.preventDefault();
        
        var deleteID = $(this).closest('tr').find('.delete_id_value').val();
        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this data",
            icon: "warning",
            buttons: true,
            dangerMode: true,
            })
            .then((willDelete) => {
            if (willDelete) {
                
                $.ajax({
                    type: "POST",
                    url: "../admin/pots-prod.php",
                    data: {
                        "delete_btn_set": 1,
                        "delete_id": deleteID,
                    },
                    success: function(response){
                        swal("Data deleted succesfully.",{
                            icon: "success",
                        }).then((result) => {
                            location.reload();
                    });

                    }
                });
            }
        });
    });
});
</script>

<!-- SOILADMIN DELETE -->
<script>
   $(document).ready(function (){

    $('.delete_btn_soil').click(function (e){
        e.preventDefault();
        
        var deleteID = $(this).closest('tr').find('.delete_id_value').val();
        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this data",
            icon: "warning",
            buttons: true,
            dangerMode: true,
            })
            .then((willDelete) => {
            if (willDelete) {
                
                $.ajax({
                    type: "POST",
                    url: "../admin/soil-prod.php",
                    data: {
                        "delete_btn_set": 1,
                        "delete_id": deleteID,
                    },
                    success: function(response){
                        swal("Data deleted succesfully.",{
                            icon: "success",
                        }).then((result) => {
                            location.reload();
                    });

                    }
                });
            }
        });
    });
});
</script>


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js"></script>
