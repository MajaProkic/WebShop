

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


