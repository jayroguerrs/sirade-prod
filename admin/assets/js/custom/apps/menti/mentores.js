"use strict";var form=document.querySelector("#mentores"),submitButton=document.querySelector("#enviar_mentor");submitButton.addEventListener("click",(function(e){e.preventDefault(),submitButton.setAttribute("data-kt-indicator","on"),submitButton.disabled=!0;let t=new FormData(form);fetch("modelo-mentores.php",{method:"POST",body:t}).then((e=>e.json())).then((e=>{"ok"==e.resultado?(document.getElementById("tabla_mentores").style.display="block",document.getElementById("lbl_error").style.display="none",document.getElementById("tb_nombre").innerHTML=e.paterno+" "+e.materno+", "+e.nombres,document.getElementById("tb_region").innerHTML=e.region,document.getElementById("tb_pregrado").innerHTML=e.pregrado,document.getElementById("tb_celular").innerHTML=e.celular,document.getElementById("tb_correo").innerHTML=e.correo1+", "+e.correo2,document.getElementById("tb_mentor").innerHTML=e.mentor,document.getElementById("tb_correo_mentor").innerHTML=e.correoMentor,document.getElementById("tb_celular_mentor").innerHTML=e.celularMentor):(document.getElementById("tabla_mentores").style.display="none",document.getElementById("lbl_error").style.display="block"),form.reset(),submitButton.removeAttribute("data-kt-indicator"),submitButton.disabled=!1}))}));