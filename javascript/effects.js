$(document).ready(function(){
    const sectionInfo=document.getElementsByClassName('info');
   
    for (i=0; i<sectionInfo.length; i++) {
        sectionInfo[i].addEventListener('click', function () {
          this.classList.toggle('active')
        })
      }
})