window.addEventListener('scroll', function() {
  const header = document.getElementById('header');
  const reNav = document.querySelector('.reNav');
  if (window.scrollY > 0) {
      header.classList.add('scrolled');
      reNav.style.height = `calc(100% - 69px)`;
    } else {
        header.classList.remove('scrolled');
        reNav.style.height = `calc(100% - 50px)`;
  }
  });

document.querySelectorAll('#submission2 .faq-question').forEach(button => {
    button.addEventListener('click', () => {
        const answer = button.nextElementSibling;

        button.classList.toggle('active');

        if (button.classList.contains('active')) {
            answer.style.display = 'block';
        } else {
            answer.style.display = 'none';
        }
    });
});

document.addEventListener('DOMContentLoaded', (event) => {
    const slider = document.querySelector('.slider');
    const slides = document.querySelectorAll('.slide');
    const prevButton = document.getElementById('prev');
    const nextButton = document.getElementById('next');
    let currentIndex = 0;

    function showSlide(index) {
        if (index < 0) {
            currentIndex = slides.length - 1;
        } else if (index >= slides.length) {
            currentIndex = 0;
        } else {
            currentIndex = index;
        }
        slider.style.transform = `translateX(-${currentIndex * 100}%)`;
    }

    prevButton.addEventListener('click', () => {
        showSlide(currentIndex - 1);
    });

    nextButton.addEventListener('click', () => {
        showSlide(currentIndex + 1);
    });

    showSlide(currentIndex);
});


