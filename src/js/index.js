const slider = document.getElementById('slider');
        const container = document.getElementById('carousel-container');
        const slides = slider.children.length;
        let index = 0;
        let intervalId;
 
        function nextSlide() {
            index = (index + 1) % slides;
            slider.style.transform = `translateX(-${index * 100}%)`;
        }
 
        function prevSlide() {
            index = (index - 1 + slides) % slides;
            slider.style.transform = `translateX(-${index * 100}%)`;
        }
 
        function startAutoplay() {
            intervalId = setInterval(nextSlide, 3000);
        }
 
        function stopAutoplay() {
            clearInterval(intervalId);
        }
       
        document.getElementById('next').addEventListener('click', () => {
            nextSlide();
            stopAutoplay();
            startAutoplay();
        });
 
        document.getElementById('prev').addEventListener('click', () => {
            prevSlide();
            stopAutoplay();
            startAutoplay();
        });
 
        container.addEventListener('mouseenter', stopAutoplay);
        container.addEventListener('mouseleave', startAutoplay);
 
        startAutoplay();