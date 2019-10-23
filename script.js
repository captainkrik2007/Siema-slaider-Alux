(function($){

  $(document).ready(function() {
    var next = document.querySelector(".container-siema__next");
    var prev = document.querySelector(".container-siema__prev");
    var slideCount = document.querySelector(".siema").children.length - 1;

    var mySiema = new Siema({
      duration: 500, // durata animazione slider (mezzo secondo)
      loop: true, // permette di riprodurre all'infinito la sequenza di immagini
    });
    setInterval(() => mySiema.next(), 3000)  // per ciclare automaticamente le immagini (3 secondi).

    prev.addEventListener("click", function () {
      return mySiema.prev();
    });

    next.addEventListener("click", function () {
      return mySiema.next();
    });
  });

}(jQuery));
