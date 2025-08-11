jQuery(document).ready(function($) {
  const $wrapper = $('.slider-wrapper');
  const $slides = $('.slide');
  const slideCount = $slides.length;
  const slideWidth = $slides.outerWidth(true);
  const $dotsContainer = $('<div class="slider-dots"></div>').insertAfter($wrapper);

  // Criar dots dinamicamente
  for (let i = 0; i < slideCount; i++) {
    $dotsContainer.append(`<button class="dot" data-index="${i}" aria-label="Slide ${i+1}"></button>`);
  }
  const $dots = $dotsContainer.find('.dot');

  function setActiveDot(index) {
    $dots.removeClass('active');
    $dots.eq(index).addClass('active');
  }

  setActiveDot(0);

  // Função para mover o slider para o slide com índice
  function goToSlide(index) {
    const scrollPos = index * slideWidth;
    $wrapper.animate({ scrollLeft: scrollPos }, 400);
    setActiveDot(index);
  }

  $('.slider-next').on('click', function() {
    let currentIndex = Math.round($wrapper.scrollLeft() / slideWidth);
    if (currentIndex < slideCount - 1) {
      currentIndex++;
      goToSlide(currentIndex);
    }
  });

  $('.slider-prev').on('click', function() {
    let currentIndex = Math.round($wrapper.scrollLeft() / slideWidth);
    if (currentIndex > 0) {
      currentIndex--;
      goToSlide(currentIndex);
    }
  });

  // Clique nos dots
  $dots.on('click', function() {
    const index = $(this).data('index');
    goToSlide(index);
  });


  $wrapper.on('scroll', function() {
    const scrollLeft = $wrapper.scrollLeft();
    const index = Math.round(scrollLeft / slideWidth);
    setActiveDot(index);
  });

  // Drag & Drop para arrastar slides
  let isDragging = false;
  let startX;
  let scrollLeftStart;

  $wrapper.on('mousedown touchstart', function(e) {
    isDragging = true;
    startX = e.pageX || e.originalEvent.touches[0].pageX;
    scrollLeftStart = $wrapper.scrollLeft();
    $wrapper.css('cursor', 'grabbing');
  });

  $wrapper.on('mouseleave touchend touchcancel mouseup', function() {
    isDragging = false;
    $wrapper.css('cursor', 'grab');
  });

  $wrapper.on('mousemove touchmove', function(e) {
    if (!isDragging) return;
    e.preventDefault();
    const x = e.pageX || e.originalEvent.touches[0].pageX;
    const walk = startX - x;
    $wrapper.scrollLeft(scrollLeftStart + walk);
  });

  $wrapper.css('cursor', 'grab');
});
