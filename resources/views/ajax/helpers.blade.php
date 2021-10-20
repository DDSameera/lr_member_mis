<script>
    /*************************************************
     * Clear Validation Errors *
     ************************************************/
    function clearValidationErrors(){
        $(".error").remove();
    }


    /*************************************************
     * Setup AJAX CSRF Token  *
     ************************************************/
    function setupCSRFToken(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    }

    /*************************************************
     * Show Alert Message*
     ************************************************/

    function showAlertMessage(message){
        let htmlAlert = "";
        htmlAlert += "<div class='alert alert-success'>";
        htmlAlert += message
        htmlAlert += "</div>";
        $(".card-body").before(htmlAlert);
    }
</script>
