    
    $(document).ready(function(){
      
      $('#imprint, #sizee, .plus, .minus, .number').on('change',function(){
          var size=$('#sizee').val();
          var imprint=$('#imprint').val();
          var plus=$('.plus').val(); 
          var number=$('.number').val(); 
       
          $.ajax({
              url:'processing/calculate_price.php',
              method:'post',
              data:{
                size: size,
                imprint:imprint,
                plus:plus,
                number: number
              },
          success:function (html) {
          $('#pricepinput').val(html);
          $('#pricep').html(html+' RSD');  
           }
          })
           
      })
      //deleting product from cart
      $('.bt').on('click',function(){
        var id=$('.bt').attr('name')
        $.ajax({
          url:'cart.php',
          method:'post',
          data:{
            delete: id
          },
      success:function (html) {
        window.location.reload();       
       }
      })
      
      })


//category
      $('.rbutton').on('change',function(){
       
      if ($(this).prop("checked") == true) {
        var vel=$("input[type='radio']:checked").val();
        console.log(vel);
        $.ajax({
            url:'processing/categoriesProcessing.php',
            method:'post',
            data:{
              chck: vel
            },
        success:function (html) {
          
           $('.products').html(html)       
         }
        })
      } else {
        $('.products').html(html);    
      }
    })

    $('.filter').on('change',function(){

        var filter=$('#filter').val();
        console.log(filter);

        $.ajax({
            url:'processing/filter_processing.php',
            method:'post',
            data:{
              value: filter
            },
        success:function (html) {
           $('.products').html(html)       
         }
        })
     
    })

    $('#searchbar').on('keyup',function(){

      var search=$('#searchbar').val();

      if(search!=""){
          $.ajax({
            url:'processing/searchbar.php',
            method:'post',
            data:{
              search: search
            },
        success:function (html) {
          $('.products').html(html)       
        }
        })
      }else{

      }
    
   
  })
if ($('.message-reg').is(':empty')) {
  console.log('yes ');
}else{
  console.log('not ');
}


  })



function increment() {
    num=document.querySelector('.number');
    if(num.value<10){
        num.innerHTML= num.value++;
    
    }       
}

function decrement() {
    num=document.querySelector('.number');
    if (num.value>1) {
         num.innerHTML=num.value--;
   
    }
}
function incrementwithAddingInputs() {
  num=document.querySelector('.number');
  if(num.value<10){
      num.innerHTML= num.value++;
    
      n=num.value;
      addInputs(n);
  } 
}

function decrementWithRemovingInputs() {
  num=document.querySelector('.number');
  if (num.value>1) {
       num.innerHTML=num.value--;
      
       removeInputs();
  }
}

function addInputs(numvalue) {
  for (let index = 0; index < n.length; index++) {
    var sizeUpdate=document.querySelector('#size_update');
    var x = document.createElement("INPUT");
    x.setAttribute("type", "number");
    x.setAttribute("name", "velicinaAdd[]");
    x.setAttribute("class","dynamicSize");
  sizeUpdate.appendChild(x);
    
  }
}

function removeInputs() {
  var x=document.querySelector('.dynamicSize');
  x.parentElement.removeChild(x);
}

