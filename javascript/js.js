    
    $(document).ready(function(){
    
      
      $('#imprint, #sizee').on('change',function(){
          var size=$('#sizee').val();
          var imprint=$('#imprint').val();
      
       
          $.ajax({
              url:'calculate_price.php',
              method:'post',
              data:{
                size: size,
                imprint:imprint
              },
          success:function (html) {
          $('#pricepinput').val(html);
          $('#pricep').html(html+' RSD');  
           }
          })
           
      })

//category
      $('.chckbox').on('change',function(){
       
      if ($(this).prop("checked") == true) {
        var vel=$("input[type='checkbox']:checked").val();
        console.log(vel);
        $.ajax({
            url:'partials/categoriesProcessing.php',
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
        return num.value;
    }
            
}
function decrement() {
    num=document.querySelector('.number');
    if (num.value>1) {
         num.innerHTML=num.value--;
    }
   
}

const plus=document.querySelector(".plus");
const minus=document.querySelector(".minus");

plus.addEventListener("click", increment);
minus.addEventListener("click",decrement);


