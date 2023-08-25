
  var recipientName  = document.getElementById("recipient-name")
  var recipientEmail  = document.getElementById("recipient-email")
  var recipientPhoneNum  = document.getElementById("recipient-phone-num")
  var recipientMessage  = document.getElementById("message-text")

  
  function messageSent(){
    if(recipientName.value == ""){
        Swal.fire(
            'Have you inserted your name?',
            'Please Fill and continue'
          )
        }
         else if(recipientEmail.value == ""){
            Swal.fire(
                'Have you inserted your Email?',
                'Please Fill and continue'
              )
            }
              else if(recipientPhoneNum.value == ""){
                Swal.fire(
                    'Have you inserted your Phone Number?',
                    'Please Fill and continue'
                  )
                }
                  else if(recipientMessage.value == ""){
                    Swal.fire(
                        'Have you inserted a Message?',
                        'Please Fill and continue'
                    )
                  }
                              
      
      else{
        Swal.fire({
                position: 'top',
                icon: 'success',
                title: 'Your message has been sent',
                showConfirmButton: true,
              })
      }
  }