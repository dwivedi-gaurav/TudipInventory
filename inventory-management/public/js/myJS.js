function validate_addUnit(){
  var submitOK=1;
  var unit=document.getElementById('unit').value;
  if(unit==""){
    document.getElementById('helpBlockAddUnit').innerHTML="Unit is required.";
    return false;

  }else{
    document.getElementById('helpBlockAddUnit').innerHTML="";
  }
}

function validate_addBill(){
  var submitOK=1;
  var vendor=document.getElementById('vendor').value;
  var amount=document.getElementById('amount').value;
  var images=document.getElementById('billImage');

  var valueApproved = $(".approvedType input[type='radio']:checked").val();
  if(valueApproved=='yes'){
    var approvedBy=document.getElementById('approved_by').value;
    if(approvedBy==""){
      document.getElementById('helpBlockApprovedBy').innerHTML="Approved by is required";
      submitOK=0;
    }else{
      document.getElementById('helpBlockApprovedBy').innerHTML="";
    }
  }
  if(vendor==""){
    document.getElementById('helpBlockVendors').innerHTML="Vendor is required";
    submitOK=0;
  }else{
    document.getElementById('helpBlockVendors').innerHTML="";
  }

  if(amount==""){
    document.getElementById('helpBlockAmount').innerHTML="Amount is required";
    submitOK=0;
  }else{
    document.getElementById('helpBlockAmount').innerHTML="";
  }
  if(images.files.length==0){
    document.getElementById('helpBlockImage').innerHTML="No image selected";
    submitOK=0;

  }else{
    document.getElementById('helpBlockImage').innerHTML="";
              for (var i = 0; i < images.files.length; i++) {
                  var image = images.files[i];
                  var name=image.name;
                  var extension = name.split('.').pop();
                  extension=extension.toLowerCase();
                  if(extension!='jpg' && extension!='jpeg' && extension!='png' && extension!='gif'){
                    document.getElementById('helpBlockImage').innerHTML="Only jpg/jpeg, png, image files are allowed.";
                    submitOK=0;
                    break;
                  }

               }

   }

  if(submitOK==0){
    return false;
  }else if(submitOK==1){
    return true;
  }
}



$(document).ready(function() {
  $('#billBox').show();
  $('.updateType').on('click', function(){
    var valueRadio = $(".updateType input[type='radio']:checked").val();
    if(valueRadio == 'purchased') {

      $('#billBox').show();

    } else {

      $('#billBox').hide();

    }
  });
});

$(document).ready(function() {
  $('#addBill').show();
  $('.approvedType').on('click', function(){
    var valueRadio = $(".approvedType input[type='radio']:checked").val();
    if(valueRadio == 'yes') {
      $('#addBill').show();
    } else {
      $('#addBill').hide();
    }
  });
});




    function validate_addCategory(){
      var cat=document.getElementById('category').value;
      if(cat==""){
        document.getElementById('helpBlockAddCategory').innerHTML="Category name is required.";
        return false;
      }else{
        return true;
      }
    }

    function validate_addItem(){
      var item=document.getElementById('item').value;
      var loc=document.getElementById('location').value;
      var threshold=document.getElementById('threshold').value;
      var unit=document.getElementById('unit').value;
      var submitOK=1;

      if(item==""){
        document.getElementById('helpBlockAddUnit').innerHTML="Unit is required.";
        submitOK=0;
      }else{
        document.getElementById('helpBlockAddUnit').innerHTML="";
      }

      if(item==""){
        document.getElementById('helpBlockAddItem').innerHTML="Item name is required.";
        submitOK=0;
      }else{
        document.getElementById('helpBlockAddItem').innerHTML="";
      }
      if(loc==""){
        document.getElementById('helpBlockAddLocation').innerHTML="Location is required.";
        submitOK=0;
      }else{
        document.getElementById('helpBlockAddLocation').innerHTML="";
      }
      if(threshold <= 0){
        document.getElementById('helpBlockAddThreshold').innerHTML="Threshold should be greater than 0.";
        submitOK=0;
      }else{
        document.getElementById('helpBlockAddThreshold').innerHTML="";
      }
      if(submitOK==0){
        return false;
      }else if(submitOK==1){
        return true;
      }
    }

    function validate_addLocation(){
      var loc=document.getElementById('location').value;
      if(loc==""){
        document.getElementById('helpBlockAddLocation').innerHTML="Location is required.";
        return false;
      }else{
        return true;
      }
    }



    function validate_updateItems(){
        var quantity=document.getElementById('quantity').value;
        var description=document.getElementById('description').value;
        var date=document.getElementById('date').value;
        var regExp="^([0-9]{4})-([0-9]{2})-([0-9]{2})$";
        var updateType = $(".updateType input[type='radio']:checked").val();
        var submitOK=1;

        if(updateType=="purchased"){
          var billNo=document.getElementById('billNo').value;
          var unitPrice=document.getElementById('unitPrice').value;

          if(unitPrice==""){
            document.getElementById('helpBlockUnitPrice').innerHTML="Unit price is required.";
            var submitOK=0;
          }else{
              document.getElementById('helpBlockUnitPrice').innerHTML="";
              if(isNaN(unitPrice) || Number(unitPrice)<=0){
                document.getElementById('helpBlockUnitPrice').innerHTML="Invalid  unit price";
                var submitOK=0;
              }else{
                document.getElementById('helpBlockUnitPrice').innerHTML="";
              }
          }
          if(billNo<=100 && billNo!=""){
            document.getElementById('helpBlockBillNo').innerHTML="Bill number should be greater than 100.";
            var submitOK=0;
          }else{
            document.getElementById('helpBlockBillNo').innerHTML="";
          }
        }
          if(date.search(regExp)< 0 && date!=""){
            document.getElementById('helpBlockDate').innerHTML="Invalid date format.";
            var submitOK=0;
          }else{
            document.getElementById('helpBlockDate').innerHTML="";
          }


        description = description.trim();

        if(quantity==""){
          document.getElementById('helpBlockUpdateQuantity').innerHTML="Quantity is required.";
          submitOK=0;
        }else{
          document.getElementById('helpBlockUpdateQuantity').innerHTML="";
          if(quantity<1){
            document.getElementById('helpBlockUpdateQuantity').innerHTML="Quantity should be at least 1.";
            submitOK=0;
          }
          if(quantity>10000){
            document.getElementById('helpBlockUpdateQuantity').innerHTML="Quantity should not be greater than 10,000.";
            submitOK=0;
          }
        }

        if(description==""){

          document.getElementById('helpBlockDescription').innerHTML="Description is required.";
          submitOK=0;
        }else{
          document.getElementById('helpBlockDescription').innerHTML="";

        }
        if(submitOK==1){
          document.getElementById('helpBlockDescription').innerHTML="";
          document.getElementById('helpBlockUpdateQuantity').innerHTML="";
          return true;
        }
        return false;
    }


      function validate_login(){
        //alert();
        var email=document.getElementById('login_email').value;
        var password=document.getElementById('login_password').value;
        //alert(email+" "+password);
        if(email=="" || password==""){
          document.getElementById('helpBlockLogin').innerHTML="Both email and password are required.";
          return false;
        }else{
          document.getElementById('helpBlockLogin').innerHTML="";
          return true;
        }

      }

      function validate_addVendor(){

        var name=document.getElementById('name').value;
        var address=document.getElementById('address').value;
        var city=document.getElementById('city').value;
        var contact=document.getElementById('contact').value;
        var submitOK=1;
        if(name==""){
          document.getElementById('helpBlockname').innerHTML="Name is required.";
          submitOK=0;
        }else{
          document.getElementById('helpBlockname').innerHTML="";
        }
        if(address==""){
          document.getElementById('helpBlockaddress').innerHTML="Address is required.";
          submitOK=0;
        }else{
          document.getElementById('helpBlockaddress').innerHTML="";
        }
        if(city==""){
          document.getElementById('helpBlockcity').innerHTML="City is required.";
          submitOK=0;
        }else{
          document.getElementById('helpBlockcity').innerHTML="";
        }
        if(contact==""){
          document.getElementById('helpBlockcontact').innerHTML="Contact is required.";
          submitOK=0;
        }else{
          document.getElementById('helpBlockcontact').innerHTML="";
          if(isNaN(contact) || contact.length!=10 || Number(contact)){
            document.getElementById('helpBlockLogin').innerHTML="Invalid contact number.";
            submitOK=0;
          }else{
            document.getElementById('helpBlockcontact').innerHTML="";
          }
        }
        if(submitOK==0){
          return false;
        }else if(submitOK==1){
          return true;
        }
      }
