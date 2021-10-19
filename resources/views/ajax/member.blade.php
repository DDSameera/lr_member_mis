<!--Script-->
<script>



    function editUser(event){
        let url = $(event).data('url');
        let id = $(event).data('id');


        $.ajax({
            url: url,
            type: 'GET',
            datatype: 'JSON'
        })

      .done(function (response) {

          $("#save-changes").attr('data-id',id);
          $("#first-name").val(response.profile.first_name);
          $("#last-name").val(response.profile.last_name);
          $("#email").val(response.email);
          $("#dob").val(response.profile.dob);
          $('#gender-group').find(':radio[name=gender][value="'+response.profile.gender+'"]').prop('checked', true);
          $("#contact-no").val(response.profile.contact_no);

       })
      .fail(function (jqXHR, textStatus, errorThrown) {
        console.log(errorThrown);
      });
    }

    function updateUser(event){
       let id = $(event).data('id');
       let url = "/member/"+id;


        let errorClass ='text-danger font-weight-bolder';

        console.log($(event).data('obj'));


        let data = {
            userId : id,
            firstName :  $("#first-name").val(),
            lastName :$("#last-name").val(),
            email:$("#email").val(),
            dob:$("#dob").val(),
            password: $("#password").val(),
            password_confirmation: $("#password-confirm").val(),
            gender:$('input[name="gender"]:checked').val(),
            contactNo:$("#contact-no").val(),
        };


       setupCSRFToken();

        $.ajax({
            url: url,
            type: 'PATCH',
            data:data,
            datatype: 'JSON'
        })


      .done(function (response) {

            console.log(response);
            console.log(response.errors);
            clearValidationErrors();



            swal("Good job!", "Record has been updated", "success")
                .then((value) => {
                    location.reload();
                });
             })
      .fail(function (jqXHR) {

          clearValidationErrors();
                $.each(jqXHR.responseJSON,function(key,value){

                    (key==="firstName") ? $("#first-name").after("<span class='error "+errorClass+"'>"+value+"</span>") : '' ;
                    (key==="lastName") ? $("#last-name").after("<span class='error "+errorClass+"'>"+value+"</span>") : '' ;
                    (key==="email") ? $("#email").after("<span class='error "+errorClass+"'>"+value+"</span>") : '' ;
                    (key==="password") ? $("#password").after("<span class='error "+errorClass+"'>"+value+"</span>") : '' ;
                    (key==="dob") ? $("#dob").after("<span class='error "+errorClass+"'>"+value+"</span>") : '' ;
                    (key==="gender") ? $("#gender-group").after("<span class='error "+errorClass+"'>"+value+"</span>") : '' ;
                    (key==="contactNo") ? $("#contact-no").after("<span class='error "+errorClass+"'>"+value+"</span>") : '' ;



                });



      })


    }


    function saveUser(event){
        let url = $(event).data('url');
        let id = $(event).data('id');
        let errorClass ='text-danger font-weight-bolder';

        console.log($(event).data('obj'));


        let data = {

            firstName :  $("#first-name").val(),
            lastName :$("#last-name").val(),
            email:$("#email").val(),
            dob:$("#dob").val(),
            password: $("#password").val(),
            password_confirmation: $("#password-confirm").val(),
            gender:$('input[name="gender"]:checked').val(),
            contactNo:$("#contact-no").val(),
        };


       setupCSRFToken();

        $.ajax({
            url: url,
            type: 'POST',
            data:data,
            datatype: 'JSON'
        })


      .done(function (response) {

            console.log(response);
            console.log(response.errors);
            clearValidationErrors();

            let htmlAlert = "";
            htmlAlert += "<div class='alert alert-success'>";
            htmlAlert += response.message;
            htmlAlert += "</div>";
            $("form").before(htmlAlert);

            $('form').trigger("reset");

       })
      .fail(function (jqXHR) {


                if(jqXHR.status==422){
                    clearValidationErrors();

                $.each(jqXHR.responseJSON,function(key,value){

                    (key==="firstName") ? $("#first-name").after("<span class='error "+errorClass+"'>"+value+"</span>") : '' ;
                    (key==="lastName") ? $("#last-name").after("<span class='error "+errorClass+"'>"+value+"</span>") : '' ;
                    (key==="email") ? $("#email").after("<span class='error "+errorClass+"'>"+value+"</span>") : '' ;
                    (key==="password") ? $("#password").after("<span class='error "+errorClass+"'>"+value+"</span>") : '' ;
                    (key==="dob") ? $("#dob").after("<span class='error "+errorClass+"'>"+value+"</span>") : '' ;
                    (key==="gender") ? $("#gender-group").after("<span class='error "+errorClass+"'>"+value+"</span>") : '' ;
                    (key==="contactNo") ? $("#contact-no").after("<span class='error "+errorClass+"'>"+value+"</span>") : '' ;



                });

            }



      })


    }


    function deleteUser(event){
        let url = $(event).data('url');
        let id = $(event).data('id');



       setupCSRFToken();

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
                            url: url,
                            type: 'DELETE',
                            datatype: 'JSON'
                        })


                        .done(function (response) {

                            clearValidationErrors();
                            location.reload();
                        })
                        .fail(function (jqXHR) {

                        })


        }
        });







    }



    function clearValidationErrors(){
        $(".error").remove();
    }


    function setupCSRFToken(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    }


</script>
<!--Script-->
