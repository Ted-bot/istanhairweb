      const fileName = document.querySelector(".file-name");
      const defaultBtn = document.querySelector("#default-btn");
      const cancelBtn = document.querySelector("#cancel-btn i");
      const img = document.getElementById("output");
      let regExp = /[0-9a-zA-Z\^\&\'\@\{\}\[\]\,\$\=\!\-\#\(\)\.\%\+\~\_ ]+$/;
      

      function defaultBtnActive(){
        defaultBtn.click();
      }

      defaultBtn.addEventListener("change", function(){
        const file = this.files[0];
        // document.getElementById('custom-btn').style.backgroundImage = "white";
        
        if(file){          
          const reader = new FileReader();
          reader.onload = function(){
            const result = reader.result;
            img.src = result;
          }
          cancelBtn.addEventListener("click", function(){
            img.src = "";
            document.querySelector('#output').style.display = "none";
            fileName.textContent = " ";         
            document.querySelector('.icon').style.display = "block";
            
          })
          reader.readAsDataURL(file);
          document.querySelector('.icon').style.display = "none";
          document.querySelector('#output').style.display = "block";
        }
        if(this.value){
          let valueStore = this.value.match(regExp);
          fileName.textContent = valueStore;
        }
      });


      $(document).ready(function() {
 
        var imageHeight, wrapperHeight, overlap, container = $('.image-wrap');  
     
        function centerImage() {
            imageHeight = container.find('img').height();
            wrapperHeight = container.height();
            overlap = (wrapperHeight - imageHeight) / 2;
            container.find('img').css('margin-top', overlap);
        }
        document.querySelector("input[type=file]")
        .onchange = function(event) {
          let file = event.target.files[0];
          let blobURL = URL.createObjectURL(file);
          document.querySelector("video").src = blobURL;
        }
        $(window).on("load resize", centerImage);
         
        var el = document.getElementById('wrapper');
        if (el.addEventListener) {
            el.addEventListener("webkitTransitionEnd", centerImage, false); // Webkit event
            el.addEventListener("transitionend", centerImage, false); // FF event
            el.addEventListener("oTransitionEnd", centerImage, false); // Opera event
        }
     
    });

    // Delete SLider Image

    function deleteBtnActive(){
        alert("Hallo");
      }
