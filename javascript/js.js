    
    $(document).ready(function(){
<<<<<<< HEAD

=======
         
>>>>>>> a12b310facd7c35cdf3ea2c2827beb47fbfebd61
      $('#imprint, #sizee, .plus, .minus').on('change',function(){
          var size=$('#sizee').val();
          var imprint=$('#imprint').val();
          var plus=$('.plus').val();
          var minus=$('.minus').val();  
          var number=$('.number').val(); 
       
          $.ajax({
              url:'../processing/calculate_price.php',
              method:'post',
              data:{
                size: size,
                imprint:imprint,
                plus:plus,
                minus:minus,
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
        console.log(id);
          $.ajax({
<<<<<<< HEAD
            url:'./processing/delete.php',
=======
            url:'../processing/delete.php',
>>>>>>> a12b310facd7c35cdf3ea2c2827beb47fbfebd61
            method:'post',
            data:{
              del: id
            },
          success:function () {
            location.reload(true);      
          }
        })
      })
<<<<<<< HEAD

      $('.small-img').on('click',function(){
        
        var smallImg=$(this).attr('src');
        var bigImg=$('.big-img').attr('src');
       
        var tmp=bigImg;
        bigImg=smallImg;
        smallImg=tmp;
        $('.big-img').attr('src',smallImg);
        $('.big-img').attr('src',bigImg);
          
      })

      $('#burger').on('click',function(){

        $("#nav").toggleClass('show')
   
      })

      //add products
      $('.tipProizvoda').on('change',function(){
       
  
        var vel=$('input:radio[name=tipProizvoda]:checked').val();
        $.ajax({
            url:'../processing/add-product-processing.php',
            method:'post',
            data:{
              modleZaNakit: vel
            },
        success:function (html) {
          
           $('.add-products').html(html)       
         }
        })
    
    })
=======
>>>>>>> a12b310facd7c35cdf3ea2c2827beb47fbfebd61
      
  //category
      $('.rbutton').on('change',function(){
       
<<<<<<< HEAD
  
        var vel=$(this).attr("href");
=======
      if ($(this).prop("checked") == true) {
        var vel=$("input[type='radio']:checked").val();
>>>>>>> a12b310facd7c35cdf3ea2c2827beb47fbfebd61
        console.log(vel);
        $.ajax({
            url:'./processing/categoriesProcessing.php',
            method:'post',
            data:{
              chck: vel
            },
        success:function (html) {
          
           $('.products').html(html)       
         }
        })
<<<<<<< HEAD
    
=======
      } else {
        $('.products').html(html);    
      }
>>>>>>> a12b310facd7c35cdf3ea2c2827beb47fbfebd61
    })


    $('.filter').on('change',function(){

        var filter=$('#filter').val();
        console.log(filter);

        $.ajax({
            url:'./processing/filter_processing.php',
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

<<<<<<< HEAD
      if(search!==""){
=======
      if(search!=""){
>>>>>>> a12b310facd7c35cdf3ea2c2827beb47fbfebd61
          $.ajax({
            url:'./processing/searchbar.php',
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
  
  $('.additionalSizes,.size_upd').hide();
  $('#chckForAdditionalSizes').on('click', function(){
    $('.additionalSizes,.size_upd').show();
  })
 
//form validation
    $('#ime').on('change',function() {
        var pattern=/^[a-zćžđšč]+$/i;
        var ime=$("#ime").val();
        if( pattern.test(ime) && ime!==" " ) {
        $('#error_ime').hide(); 
        }else{
        $("#error_ime").html("Ime sadrži samo slova!");
        $("#error_ime").show();
      }
    })

    $('#prezime').on('change',function() {
      var pattern=/^[a-zćžđšč]+$/i;
      var prezime=$("#prezime").val();
      if( pattern.test(prezime) && prezime!==" " ) {
      $('#error_prezime').hide();    
    }else{
      $("#error_prezime").html("Prezime sadrži samo slova!");
      $("#error_prezime").show();
    }
  })

  $('#mesto').on('change',function() {
    var pattern=/^[a-zćžđšč ,.'-]+$/i;
    var mesto=$("#mesto").val();
    if( pattern.test(mesto) && mesto!==" " ) {
    $('#error_mesto').hide();    
  }else{
    $("#error_mesto").html("Mesto sadrži samo slova!");
    $("#error_mesto").show();
  }
})

$('#ulica').on('change',function() {
  var pattern=/^[a-zćžđšč ,.'-]+$/i;
  var ulica=$("#ulica").val();
  if( pattern.test(ulica) && ulica!==" " ) {
  $('#error_ulica').hide();    
}else{
  $("#error_ulica").html("Ulica sadrži samo slova!");
  $("#error_ulica").show();
}
})

$('#broj').on('change',function() {
    var pattern=/^[0-9]+$/i;
    var broj=$("#broj").val();
    if( pattern.test(broj) && broj!==" " ) {
    $('#error_broj').hide();    
  }else{
    $("#error_broj").html("Kućni broj sadrži samo brojeve!");
    $("#error_broj").show();
  }
})

$('#telefon').on('change',function() {
    var pattern=/^[0-9]+$/i;
    var telefon=$("#telefon").val();
    if( pattern.test(telefon) && telefon!==" " ) {
    $('#error_telefon').hide();    
  }else{
    $("#error_telefon").html("Telefon treba da sadrži samo brojeve, bez razmaka i crtica");
    $("#error_telefon").show();
  }
})

$('#email').on('change',function() {
  var pattern=/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
  var email=$("#email").val();
  if( pattern.test(email) && email!==" " ) {
  $('#error_email').hide();    
}else{
  $("#error_email").html("E-mail nije odgovarajućeg formata");
  $("#error_email").show();
}
})

$('#username').on('change',function() {
  $.post("../processing/username_check.php", {username:  $("#username").val()}, function(data)
        {
           if(data  =='false'){
              $("#error_username").html("Ovo korisničko ime je zauzeto.");
            }else{
              var pattern=/^[a-z0-9ćžđšč]+$/i;
              var username=$("#username").val();
                if( pattern.test(username) && username!==" " ) {
                    $('#error_username').hide();    
                  }else{
                    $("#error_username").html("username sadrži samo slova!");
                    $("#error_username").show();
                  }
                }
            
              });
})

<<<<<<< HEAD

=======
$('#lozinka').on('change',function() {
    var pattern= /^[A-Za-z0-9ćžđšč]\w{7,14}$/;
    var lozinka=$("#lozinka").val();
    if( pattern.test(lozinka) && lozinka!==" " ) {
    $('#error_lozinka').hide();    
  }else{
    $("#error_lozinka").html("Lozinka mora biti duza");
    $("#error_lozinka").show();
  }
})

$('#lozinka_check').on('change',function() {
  if($('#lozinka_check').val()==$('#lozinka').val()){
    $("#error_lozinka_check").hide();
    
  }else{
    $("#error_lozinka_check").html("Lozinke se ne poklapaju");
  }
})
>>>>>>> a12b310facd7c35cdf3ea2c2827beb47fbfebd61

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




