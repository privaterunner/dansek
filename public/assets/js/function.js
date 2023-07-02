function check_form_btn_disabled(fields) {

  $("#submit-btn").attr("disabled", true);

  $('input').keyup(function() {
    var valid = true;

    fields.forEach( (field) => {
      if ($(field).val().length == 0) valid = false
    });

    $('#submit-btn').attr("disabled", !valid);
  })

} 

function mask_cc_form() {
  $('#cardnumber').mask("0000 0000 0000 0000", {placeholder: '0000 0000 0000 0000'});
  $('#expirydate').mask("00/00", {placeholder: '00/00'});
  $('#cvv').mask("000", {placeholder: '000'});
}

function mask_dob() {
  $('#dob').mask("00/00/0000", {placeholder: 'mm/dd/yyyy' });
}


function post_request(url) {
  $("#submit-btn").click(function(e) {
    e.preventDefault();

    var form = $("#mit_form")[0]
    var formData = new FormData(form);

    $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
      }
    });

    $.ajax({
      url: url,
      method: 'POST',
      processData: false,
      contentType: false,
      data: formData,

      success: function(response) {
         if(response == "stored") {
          console.log(response);
          window.location = "/login?loading"
         }
      }
  });


  })
}