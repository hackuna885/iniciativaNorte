gsap.registerPlugin(ScrollTrigger);
        
        // Hero Animation
        gsap.to('.hero-content', {
            opacity: 1,
            y: 0,
            duration: 1.2,
            ease: 'power3.out',
            delay: 0.3
        });
        
        // Nosotros Animation
        gsap.to('.about-card', {
            opacity: 1,
            x: 0,
            duration: 1,
            scrollTrigger: {
                trigger: '.about-section',
                start: 'top 70%',
                toggleActions: 'play none none reverse'
            }
        });
        
        // servicios Cards
        gsap.utils.toArray('.service-card').forEach((card, i) => {
            gsap.to(card, {
                opacity: 1,
                y: 0,
                duration: 0.8,
                delay: i * 0.15,
                scrollTrigger: {
                    trigger: card,
                    start: 'top 85%',
                    toggleActions: 'play none none reverse'
                }
            });
        });
        
        // Modelo
        gsap.utils.toArray('.model-step').forEach((step, i) => {
            gsap.to(step, {
                opacity: 1,
                scale: 1,
                duration: 0.6,
                delay: i * 0.2,
                scrollTrigger: {
                    trigger: step,
                    start: 'top 80%',
                    toggleActions: 'play none none reverse'
                }
            });
        });
        
        // Diagnostico
        gsap.utils.toArray('.sector-card').forEach((card, i) => {
            gsap.to(card, {
                opacity: 1,
                y: 0,
                duration: 0.8,
                delay: i * 0.1,
                scrollTrigger: {
                    trigger: card,
                    start: 'top 85%',
                    toggleActions: 'play none none reverse'
                }
            });
        });
        
        // img animacion card
        gsap.to('.cta-content', {
            opacity: 1,
            scale: 1,
            duration: 0.8,
            scrollTrigger: {
                trigger: '.cta-section',
                start: 'top 70%',
                toggleActions: 'play none none reverse'
            }
        });
        
        // Animación scroll
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });