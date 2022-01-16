window.addEventListener("load", function () {
  const form = document.querySelector("form");

  form.addEventListener("submit", function (e) {
    e.preventDefault();
    const files = form.querySelector('[type="file"]').files;
    const promises = [];

    for (let file of files) {
      promises.push(
        new Promise(function (resolve, reject) {
          new Compressor(file, {
            quality: 0.6,
            success(result) {
              //TODO


              console.log(typeof(result));
              console.log(result.name);
              let formData = new FormData();
              formData.append("file",result, result.name);
              
              const peticion = async function(){
                let jesus = "";
                let respuesta = await fetch('files-handler.php',{method:"POST",body:formData})
                .then((response)=>response.json())
                .then((objeto)=>{
                  console.log(objeto.message);
                  jesus = objeto.message;
                  document.getElementById("demo").innerHTML = objeto.message;
                }).catch(function(error){
                  console.log("ERROR ESTO NO ESTÁ FUNCIONANDO");
                });
                return jesus;
              }
              console.log(peticion());
              
              
              
              /*
              axios.post('files-handler.php',formData).then((objeto)=>{
                console.log(objeto.message);
                document.getElementById("demo").innerHTML = objeto.message;
              });
              
              let response = fetch('./files-handler.php',{method:"POST",body:formData})
              .then((response)=>response.json())
              .then((objeto)=>{
                  console.log(objeto.message);
                  document.getElementById("demo").innerHTML = objeto.message;
              });*/
              //alert('the file has been uploaded successfully');




            },
            error(err) {
              console.log(err.message);
              reject();
            },
          });
        })
      );
    }
  });
});
