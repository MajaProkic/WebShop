function calculate() {
var imprint=document.getElementById("imprint");
var imprintVal=imprint.options[imprint.selectedIndex].value;

var size=document.getElementById("size");
var sizeVal=size.options[size.selectedIndex].value;

var quantity=document.getElementById("quantity").value;

    if(imprintVal==0){
        switch (sizeVal) {
            case '6':
                price=100*quantity;
                break;
                case '7':
                    price=130*quantity;
                    break;
                    case '8':
                        price=160*quantity;
                        break;          
            default:
                break;     
        }
       }else{
           switch (sizeVal) {
               case '6':
                    price=150*quantity;
                   break;
                   case '7':
                     price=200*quantity;
                   break;
                        case '8':
                         price=250*quantity;
                        break;     
               default:
                   break;   
           }
    

       }
     
       document.getElementById('pricep').value=price;
}

calculate();

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



  







