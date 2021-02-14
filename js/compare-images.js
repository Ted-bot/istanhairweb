// after treatment img
const fileName = document.getElementById("id-name-1");
const defaultBtn = document.getElementById("id-img-1");
const img = document.querySelector(".original-image");

// before treatment img
const fileNameTwo = document.querySelector("#id-name-2");
const defaultBtnTwo = document.querySelector("#id-img-2");
const cancelBtn = document.querySelector("#cancel-btn i");
const imgTwo = document.querySelector(".slider");

let regExp = /[0-9a-zA-Z\^\&\'\@\{\}\[\]\,\$\=\!\-\#\(\)\.\%\+\~\_ ]+$/;

defaultBtn.onchange = function(e) {
  const file = this.files[0];
  
  if(file){          
    const reader = new FileReader();
    reader.onload = function(){
      const result = reader.result;
      img.style.backgroundImage = 'url(' + result + ')';
    }
    reader.readAsDataURL(file);
    document.querySelector('.slider').style.display = "block";
  }

  if(this.value){
    let valueStore = this.value.match(regExp);
    fileName.textContent = valueStore;
  }
};

defaultBtnTwo.onchange = function(e) {
  const file = this.files[0];
  
  if(file){          
    const reader = new FileReader();
    reader.onload = function(){
      const result = reader.result;
      imgTwo.style.backgroundImage = 'url(' + result + ')';
    }
    reader.readAsDataURL(file);
    document.querySelector('.orginal-image').style.display = "block";
  }

  if(this.value){
    let valueStore = this.value.match(regExp);
    fileName.textContent = valueStore;
  }
};
      