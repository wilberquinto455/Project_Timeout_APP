<?php require_once(__DIR__ . '/../../config.php');
require_once(__DIR__ . '/../../config/assets.php'); ?>

<!-- Elegant Carousel/Slider -->
<div id="timeoutCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="5000">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#timeoutCarousel" data-bs-slide-to="0" class="active" aria-current="true"></button>
        <button type="button" data-bs-target="#timeoutCarousel" data-bs-slide-to="1"></button>
        <button type="button" data-bs-target="#timeoutCarousel" data-bs-slide-to="2"></button>
    </div>

    <div class="carousel-inner">
        <div class="carousel-item active">
            <div class="overlay"></div>
            <img src="<?php echo image('03.png'); ?>" class="d-block w-100" alt="Sistema de Alertamiento">
            <div class="carousel-caption">
                <div class="caption-wrapper">
                    <div class="separator"></div>
                    <h2>Sistema de Alertamiento</h2>
                    <p>Gestiona tus documentos de manera eficiente</p>
                    <div class="separator"></div>
                </div>
            </div>
        </div>

        <div class="carousel-item">
            <div class="overlay"></div>
            <img src="<?php echo image('03.png'); ?>" class="d-block w-100" alt="Documentación Inteligente">
            <div class="carousel-caption">
                <div class="caption-wrapper">
                    <div class="separator"></div>
                    <h2>Documentación Inteligente</h2>
                    <p>Control total de tus procesos de calidad</p>
                    <div class="separator"></div>
                </div>
            </div>
        </div>

        <div class="carousel-item">
            <div class="overlay"></div>
            <img src="<?php echo image('03.png'); ?>" class="d-block w-100" alt="Mejora Continua">
            <div class="carousel-caption">
                <div class="caption-wrapper">
                    <div class="separator"></div>
                    <h2>Mejora Continua</h2>
                    <p>Optimiza tus procesos empresariales</p>
                    <div class="separator"></div>
                </div>
            </div>
        </div>
    </div>

    <button class="carousel-control-prev" type="button" data-bs-target="#timeoutCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#timeoutCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>

<style>
    /* Elegant Carousel Styles */
    .carousel {
        position: relative;
        margin-bottom: 0;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .carousel-item {
        height: 50vh;
        min-height: 450px;
        position: relative;
    }

    .carousel-item .overlay {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(to bottom, rgba(0,0,0,0.4), rgba(0,0,0,0.7));
        z-index: 1;
    }

    .carousel-item img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transform: scale(1.1);
        transition: transform 7s ease;
    }

    .carousel-item.active img {
        transform: scale(1);
    }

    .carousel-caption {
        top: 50%;
        transform: translateY(-50%);
        bottom: auto;
        z-index: 2;
    }

    .caption-wrapper {
        padding: 20px;
    }

    .separator {
        width: 60px;
        height: 3px;
        background-color: #fff;
        margin: 15px auto;
    }

    .carousel-caption h2 {
        font-size: 2.5rem;
        font-weight: bold;
        margin-bottom: 1rem;
        opacity: 0;
        transform: translateY(20px);
        animation: fadeInUp 0.5s ease forwards;
    }

    .carousel-caption p {
        font-size: 1.2rem;
        margin-bottom: 1.5rem;
        opacity: 0;
        transform: translateY(20px);
        animation: fadeInUp 0.5s ease forwards 0.2s;
    }

    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @media (max-width: 768px) {
        .carousel-item {
            height: 40vh;
            min-height: 350px;
        }

        .carousel-caption h2 {
            font-size: 1.8rem;
        }

        .carousel-caption p {
            font-size: 1rem;
        }
    }
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const carousel = new bootstrap.Carousel(document.getElementById('timeoutCarousel'), {
        interval: 5000,
        touch: true,
        pause: 'hover'
    });

    // Reset animations on slide
    document.querySelector('#timeoutCarousel').addEventListener('slide.bs.carousel', function(e) {
        const captions = e.relatedTarget.querySelectorAll('.carousel-caption h2, .carousel-caption p, .separator');
        captions.forEach(caption => {
            caption.style.animation = 'none';
            caption.offsetHeight; // Trigger reflow
            caption.style.animation = null;
        });
    });
});
</script>