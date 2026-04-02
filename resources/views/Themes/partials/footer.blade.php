<footer class="footer-area section-padding bg-dark text-light">
    <div class="container">
        <div class="row">

            <!-- About -->
            <div class="col-lg-4 col-md-6">
                <div class="single-footer-widget">
                    <h6 class="footer-title">About Us</h6>
                    <p>
                        Join our newsletter to receive the latest blog posts, coding tips,
                        and tutorials directly in your inbox.
                    </p>
                </div>
            </div>

            <!-- Follow Us -->
            <div class="col-lg-4 col-md-6">
                <div class="single-footer-widget">
                    <h6 class="footer-title">Follow Us</h6>
                    <p>Stay connected on social media</p>

                    <div class="footer-social d-flex gap-3">

                        <a href="https://www.facebook.com/ahmed0samaa"
                           target="_blank"
                           aria-label="Facebook"
                           rel="noopener noreferrer">
                            <i class="fab fa-facebook-f"></i>
                        </a>

                        <a href="https://www.instagram.com/ahmed0sama_/"
                           target="_blank"
                           aria-label="Instagram"
                           rel="noopener noreferrer">
                            <i class="fab fa-instagram"></i>
                        </a>

                        <a href="https://x.com/Ahmed0sama4"
                           target="_blank"
                           aria-label="Twitter"
                           rel="noopener noreferrer">
                            <i class="fab fa-twitter"></i>
                        </a>

                        <a href="https://www.behance.net/ahmed0sama"
                           target="_blank"
                           aria-label="Behance"
                           rel="noopener noreferrer">
                            <i class="fab fa-behance"></i>
                        </a>

                    </div>
                </div>
            </div>

        </div>

        <!-- Bottom -->
        <div class="footer-bottom text-center mt-4">
            <p class="footer-text mb-0">
                Copyright &copy;
                <span id="year"></span>
                Ahmed Osama. All rights reserved.
            </p>
        </div>

    </div>
</footer>

<script>
    document.getElementById("year").textContent =
        new Date().getFullYear();
</script>
