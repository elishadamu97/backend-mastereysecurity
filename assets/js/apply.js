 function successMessage(){
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 5000,
        timerProgressBar: true,
        didOpen: (toast) => {
          toast.addEventListener('mouseenter', Swal.stopTimer)
          toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
      })
      
      Toast.fire({
        icon: 'success',
        title: 'Application successful'

      })
}
const paymentForm = document.getElementById('paymentForm');
paymentForm.addEventListener("submit", payWithPaystack, false);
function payWithPaystack(e) {
  e.preventDefault();
  let fname = document.getElementById("fname").value;
  let surname = document.getElementById("sname").value;
  let email = document.getElementById("email-address").value;
  let phonenumber = document.getElementById("phone-number").value;
  let stateoforigin = document.getElementById("state").value;
  let address = document.getElementById("address").value;
  let fullname = fname + surname;
  let handler = PaystackPop.setup({
    key: 'pk_test_1db996ca9c92eb22d291b838b1646fb9171d806a', // Replace with your public key
    first_name: fullname,
    last_name: document.getElementById("state").value,
    email: document.getElementById("email-address").value,
    amount: document.getElementById("amount").value * 100,
    phone: document.getElementById("phone-number").value,
    ref: 'MESSL'+Math.floor((Math.random() * 1000000000) + 1), // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
    // label: "Optional string that replaces customer email"
    onClose: function(){
      let timerInterval
      Swal.fire({
        title: 'Cancelled Payment?',
        html: 'Payment will be cancelled in <b></b> milliseconds.',
        timer: 2000,
        timerProgressBar: true,
        didOpen: () => {
          Swal.showLoading()
          const b = Swal.getHtmlContainer().querySelector('b')
          timerInterval = setInterval(() => {
            b.textContent = Swal.getTimerLeft()
          }, 100)
        },
        willClose: () => {
          clearInterval(timerInterval)
        }
      }).then((result) => {
        /* Read more about handling dismissals below */
        if (result.dismiss === Swal.DismissReason.timer) {
          console.log('I was closed by the timer')
        }
      })
    },
    callback: function(response){
      window.location = "localhost/securitycompany/downloadfile.php?reference=" + response.reference;
      let message = 'Reference: '+ "  "+ response.reference;
      let sent_to_database = response.reference;
      const Toast = Swal.mixin({
        toast: true,
        position: 'top',
        showConfirmButton: false,
        timer: 5000,
        timerProgressBar: true,
        didOpen: (toast) => {
          toast.addEventListener('mouseenter', Swal.stopTimer)
          toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
      })
      
      Toast.fire({
        icon: 'success',
        title: 'Payment successful' + "<br>" +  message 
        
      })
      var formData = {fname:fname, surname:surname, email: email, phonenumber: phonenumber, stateoforigin: stateoforigin, address:address,  sent_to_database:sent_to_database };
      $.ajax({
        url:"localhost/securitycompany/connect-database.php",
        type: "GET",
        data: formData,
        success: function (response)
        {

        }
      })
    }
  });
  
 
  handler.openIframe();
}
