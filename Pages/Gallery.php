<style>
    .gallery-wrapper {
        width: 100%;
        background-color: transparent; 
        padding: 1rem 0 3rem 0; 
    }

    .gallery-title {
        text-align: center;
        color: #ffffff;
        font-size: 2.5rem;
        font-weight: bold;
        margin-bottom: 3rem;
        letter-spacing: 3px;
        text-shadow: 0 4px 15px rgba(11, 61, 145, 0.8); /* Glow biru sesuai tema */
    }

    .gallery-row {
        display: flex;
        flex-wrap: wrap;
        min-height: 75vh; 
        width: 100%;
        margin-bottom: 3rem; 
        border-radius: 12px;
        overflow: hidden; 
    }

    .gallery-row:last-child {
        margin-bottom: 0;
    }

     Membalik Posisi Kiri-Kanan 
    .gallery-row.reverse {
        flex-direction: row-reverse;
    }

    .quote-section {
        flex: 1 1 50%;
        background-color: #0b3d91; 
        color: #ffffff;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 4rem;
        box-sizing: border-box;
        position: relative;
    }

    .quote-content {
        max-width: 85%;
        text-align: left;
    }

    .gallery-row.reverse .quote-content {
        text-align: right;
    }

    .quote-content h2 {
        font-size: 2.8rem;
        font-style: italic;
        font-weight: bold;
        line-height: 1.3;
        margin-bottom: 1.5rem;
        text-shadow: 0 4px 15px rgba(11, 61, 145, 0.6); 
    }

    .quote-content p {
        font-size: 1.2rem;
        opacity: 0.85;
        letter-spacing: 1px;
    }

    .image-section {
        flex: 1 1 50%;
        position: relative;
        background-size: cover;
        background-position: center;
        min-height: 400px;
    }

    .image-section::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 45%; 
        height: 100%;
        background: linear-gradient(to right, #0b3d91 0%, rgba(11, 61, 145, 0.8) 20%, transparent 100%);
    }

    .gallery-row.reverse .image-section::before {
        left: auto;
        right: 0;
        background: linear-gradient(to left, #0b3d91 0%, rgba(11, 61, 145, 0.8) 20%, transparent 100%);
    }
 
    @media (max-width: 768px) {
        .gallery-title {
            font-size: 1.8rem;
        }

        .gallery-row, .gallery-row.reverse {
            flex-direction: column; 
            margin-bottom: 2rem;
        }
        
        .gallery-row.reverse .quote-content {
            text-align: left; 
        }

        .image-section::before, .gallery-row.reverse .image-section::before {
            width: 100%;
            height: 50%;
            top: 0;
            left: 0;
            right: auto;
            background: linear-gradient(to bottom, #0b3d91 0%, rgba(11, 61, 145, 0.8) 20%, transparent 100%);
        }
    }
</style>

<div class="container gallery-wrapper">
    
    <h1 class="gallery-title">GALLERY TEPI WAKTU TEATER</h1>

    <div class="gallery-row">
        <div class="quote-section">
            <div class="quote-content">
                <h2>"Keringat di ruang latihan adalah bayaran mahal untuk tepuk tangan di atas panggung."</h2>
                <p>— Tepi Waktu Teater</p>
            </div>
        </div>
        <div class="image-section" style="background-image: url('img/foto1.jpg');"></div>
    </div>

    <div class="gallery-row reverse">
        <div class="quote-section">
            <div class="quote-content">
                <h2>"Bukan tentang menghafal naskah, tapi bagaimana naskah itu hidup di dalam diri kita."</h2>
                <p>— Tepi Waktu Teater</p>
            </div>
        </div>
        <div class="image-section" style="background-image: url('img/foto2.jpg');"></div>
    </div>

    <div class="gallery-row">
        <div class="quote-section">
            <div class="quote-content">
                <h2>"Satu panggung, puluhan ego, disatukan oleh satu cerita."</h2>
                <p>— Tepi Waktu Teater</p>
            </div>
        </div>
        <div class="image-section" style="background-image: url('img/foto3.jpg');"></div>
    </div>

    <div class="gallery-row reverse">
        <div class="quote-section">
            <div class="quote-content">
                <h2>"Cahaya lampu panggung tak akan terang tanpa kerja keras dalam gelapnya backstage."</h2>
                <p>— Tepi Waktu Teater</p>
            </div>
        </div>
        <div class="image-section" style="background-image: url('img/foto4.jpg');"></div>
    </div>

    <div class="gallery-row">
        <div class="quote-section">
            <div class="quote-content">
                <h2>"Setiap karakter punya rahasia, tugas kitalah untuk membongkarnya di depan penonton."</h2>
                <p>— Tepi Waktu Teater</p>
            </div>
        </div>
        <div class="image-section" style="background-image: url('img/foto5.jpg');"></div>
    </div>
    <div class="gallery-row reverse">
        <div class="quote-section">
            <div class="quote-content">
                <h2>"Wajah baru di depan cermin, jiwa lama yang siap meresapi peran."</h2>
                <p>— Tepi Waktu Teater</p>
            </div>
        </div>
        <div class="image-section" style="background-image: url('img/foto6.jpg');"></div>
    </div>

    <div class="gallery-row">
        <div class="quote-section">
            <div class="quote-content">
                <h2>"Setiap arahan adalah jembatan antara imajinasi dan realitas panggung."</h2>
                <p>— Tepi Waktu Teater</p>
            </div>
        </div>
        <div class="image-section" style="background-image: url('img/foto7.jpg');"></div>
    </div>

    <div class="gallery-row reverse">
        <div class="quote-section">
            <div class="quote-content">
                <h2>"Keheningan di balik panggung sebelum tirai terbuka adalah musik yang paling mendebarkan."</h2>
                <p>— Tepi Waktu Teater</p>
            </div>
        </div>
        <div class="image-section" style="background-image: url('img/foto8.jpg');"></div>
    </div>

    <div class="gallery-row">
        <div class="quote-section">
            <div class="quote-content">
                <h2>"Bukan tentang siapa yang paling bersinar, tapi bagaimana kita saling menerangi."</h2>
                <p>— Tepi Waktu Teater</p>
            </div>
        </div>
        <div class="image-section" style="background-image: url('img/foto9.jpg');"></div>
    </div>
</div>