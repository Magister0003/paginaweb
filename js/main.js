(function ($) {
    "use strict";

    // Spinner
    var spinner = function () {
        setTimeout(function () {
            if ($('#spinner').length > 0) {
                $('#spinner').removeClass('show');
            }
        }, 1);
    };
    spinner();
    
    
    // Initiate the wowjs
    new WOW().init();


    // Sticky Navbar
    $(window).scroll(function () {
        if ($(this).scrollTop() > 300) {
            $('.sticky-top').addClass('shadow-sm').css('top', '0px');
        } else {
            $('.sticky-top').removeClass('shadow-sm').css('top', '-100px');
        }
    });
    
    
    // Función para avanzar al siguiente elemento del carrusel
    function avanzarCarrusel() {
        const headerCarousel = document.getElementById("header-carousel");
        const activeItem = headerCarousel.querySelector(".carousel-item.active");
        const nextItem = activeItem.nextElementSibling || headerCarousel.querySelector(".carousel-item:first-child");
        activeItem.classList.remove("active");
        nextItem.classList.add("active");
    }

    // Cambiar automáticamente al siguiente elemento cada 5 segundos
    setInterval(avanzarCarrusel, 5000);


    
    // Back to top button
    $(window).scroll(function () {
        if ($(this).scrollTop() > 300) {
            $('.back-to-top').fadeIn('slow');
        } else {
            $('.back-to-top').fadeOut('slow');
        }
    });
    $('.back-to-top').click(function () {
        $('html, body').animate({scrollTop: 0}, 1500, 'easeInOutExpo');
        return false;
    });


    // Modal Video
    var $videoSrc;
    $('.btn-play').click(function () {
        $videoSrc = $(this).data("src");
    });
    console.log($videoSrc);
    $('#videoModal').on('shown.bs.modal', function (e) {
        $("#video").attr('src', $videoSrc + "?autoplay=1&amp;modestbranding=1&amp;showinfo=0");
    })
    $('#videoModal').on('hide.bs.modal', function (e) {
        $("#video").attr('src', $videoSrc);
    })


    // Project and Testimonial carousel
    $(".project-carousel, .testimonial-carousel").owlCarousel({
        autoplay: true,
        smartSpeed: 1000,
        margin: 25,
        loop: true,
        center: true,
        dots: false,
        nav: true,
        navText : [
            '<i class="bi bi-chevron-left"></i>',
            '<i class="bi bi-chevron-right"></i>'
        ],
        responsive: {
			0:{
                items:1
            },
            576:{
                items:1
            },
            768:{
                items:2
            },
            992:{
                items:3
            }
        }
    });
    
})(jQuery);

  const textos = ["VENTAS", "ASESORES", "DESARROLLO", "INNOVACIÓN"]; // Array de textos a mostrar
  const intervalo = 2000; // Intervalo de cambio en milisegundos (2 segundos)

  const elementoTexto = document.getElementById("texto-cambiante");
  let indiceTexto = 0;

  function cambiarTexto() {
    elementoTexto.textContent = textos[indiceTexto];
    indiceTexto = (indiceTexto + 1) % textos.length; // Cambiar al siguiente texto
  }

  cambiarTexto(); // Cambiar al primer texto al cargar la página
  setInterval(cambiarTexto, intervalo); // Cambiar automáticamente cada 'intervalo' ms
