    
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
      $('.chckbox').on('change',function(){
       
      if ($(this).prop("checked") == true) {
        var vel=$("input[type='checkbox']:checked").val();
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
        $('.products').html('jbg');    
      }
     
    })


  })
function filter() {
    var e = document.getElementById("filter");
    var strUser = e.options[e.selectedIndex].text;
    console.log(strUser);
}

filter();

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

const plus=document.querySelector(".plus");
const minus=document.querySelector(".minus");

plus.addEventListener("click", increment);
minus.addEventListener("click",decrement);


