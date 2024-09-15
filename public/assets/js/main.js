let btn = document.querySelector('#btn');
let sidebar = document.querySelector('.sidebar');

//fonction pour le clic du bouton

btn.onclick = function(){
    sidebar.classList.toggle('active');
};


        jQuery(document).ready(function ($) {
          $(".slider-img").on("click", function () {
            $(".slider-img").removeClass("active");
            $(this).addClass("active");
          });
        });

