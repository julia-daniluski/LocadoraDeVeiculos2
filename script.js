function toggleDetalhes(buttonId, quadroId) {
    var quadro = document.getElementById(quadroId);
    if (quadro.style.display === "none" || quadro.style.display === "") {
      quadro.style.display = "block";
    } else {
      quadro.style.display = "none";
    }
  }
  
  document.querySelectorAll('[id^="btnDetalhes-"]').forEach(function(button) {
    button.addEventListener('click', function(event) {
      event.preventDefault();
      var id = this.id.split('-')[1];
      toggleDetalhes(`btnDetalhes-${id}`, `quadroDetalhes-${id}`); 
    });
  });
  

  