document.addEventListener('DOMContentLoaded', function() {

    // --- Contact Page Logic ---
    const contactForm = document.getElementById('contact-form');
    if (contactForm) {
        contactForm.addEventListener('submit', function(e) {
            var btn = document.getElementById('btn-submit');
            if (btn) {
                btn.disabled = true;
                btn.innerHTML = 'Enviando... <span class="spinner"></span>';
                btn.setAttribute('aria-live', 'polite');
                btn.setAttribute('aria-busy', 'true');
            }
        });
    }

    const messageInput = document.getElementById('message-message');
    const charCount = document.getElementById('char-count-comentario');

    if (messageInput && charCount) {
        const maxLength = messageInput.getAttribute('maxlength');
        const updateCount = function() {
            const currentLength = messageInput.value.length;
            charCount.textContent = currentLength + '/' + maxLength;
        };

        messageInput.addEventListener('input', updateCount);
        // Initialize on load
        updateCount();
    }

    // --- Index Page Logic ---
    const newsletterForm = document.getElementById('newsletter-form');
    if (newsletterForm) {
        newsletterForm.addEventListener('submit', function(e) {
            var btn = document.getElementById('btn-subscribe');
            if (btn) {
                btn.disabled = true;
                btn.innerHTML = 'Inscrevendo... <span class="spinner"></span>';
                btn.setAttribute('aria-live', 'polite');
                btn.setAttribute('aria-busy', 'true');
            }
        });
    }

    const facades = document.querySelectorAll('.youtube-facade');
    if (facades.length > 0) {
        facades.forEach(function(facade) {
            facade.style.cursor = 'pointer';

            var loadVideo = function() {
                if (this.classList.contains('loading')) return;
                this.classList.add('loading');

                var playBtn = this.querySelector('.play-button');
                if (playBtn) {
                    playBtn.innerHTML = '<span class="spinner"></span>';
                }

                var videoId = this.dataset.videoId;
                var iframe = document.createElement('iframe');
                iframe.setAttribute('src', 'https://www.youtube.com/embed/' + videoId + '?autoplay=1');
                iframe.setAttribute('width', '100%');
                iframe.setAttribute('height', '100%');
                iframe.setAttribute('title', 'Vídeo do YouTube');
                iframe.setAttribute('frameborder', '0');
                iframe.setAttribute('allow', 'accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture');
                iframe.setAttribute('allowfullscreen', '');
                iframe.style.borderRadius = '12px';
                iframe.style.position = 'absolute';
                iframe.style.top = '0';
                iframe.style.left = '0';
                iframe.style.zIndex = '2';
                iframe.style.opacity = '0';
                iframe.style.transition = 'opacity 0.5s ease-in';

                var that = this;
                iframe.onload = function() {
                    iframe.style.opacity = '1';

                    setTimeout(function() {
                        Array.from(that.children).forEach(function(child) {
                            if (child !== iframe) child.remove();
                        });

                        that.classList.remove('loading');
                        that.classList.remove('youtube-facade');
                        that.style.backgroundImage = 'none';
                        that.style.display = 'block';
                        that.removeAttribute('tabindex');
                        that.removeAttribute('role');
                        iframe.style.position = 'static';
                    }, 500);
                };

                this.appendChild(iframe);
            };

            facade.addEventListener('click', loadVideo);
            facade.addEventListener('keydown', function(e) {
                if (e.key === 'Enter' || e.key === ' ') {
                    e.preventDefault();
                    loadVideo.call(this);
                }
            });
        });
    }

    // --- Layout Logic (Back to Top) ---
    var backToTopBtn = document.querySelector('.btn-back-to-top');
    if (backToTopBtn) {
        // ⚡ Bolt Optimization: Use requestAnimationFrame to throttle scroll events
        // and prevent layout thrashing on the main thread.
        var ticking = false;
        window.addEventListener('scroll', function() {
            if (!ticking) {
                window.requestAnimationFrame(function() {
                    if (window.scrollY > 300) {
                        backToTopBtn.classList.add('show');
                    } else {
                        backToTopBtn.classList.remove('show');
                    }
                    ticking = false;
                });
                ticking = true;
            }
        });
    }

    // --- Alert Feedback Logic ---
    const alertMessage = document.querySelector('.alert');
    if (alertMessage) {
        // Ensure the alert is focusable for screen readers
        if (!alertMessage.hasAttribute('tabindex')) {
            alertMessage.setAttribute('tabindex', '-1');
        }

        // Focus the element so screen readers announce it immediately
        // preventScroll: true prevents the browser from jumping to the element,
        // allowing us to use smooth scroll instead.
        alertMessage.focus({ preventScroll: true });

        // Smoothly scroll the alert into view
        alertMessage.scrollIntoView({ behavior: 'smooth', block: 'center' });
    }
});
