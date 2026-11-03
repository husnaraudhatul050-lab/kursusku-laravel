import 'bootstrap';
import $ from 'jquery';

// Ekspos jQuery ke window agar kompatibel dengan script lama jika ada
window.$ = window.jQuery = $;

function setAvailabilityMessage(htmlMessage, type = 'secondary', isUpdating = false) {
    const box = $('#availability');
    if (!box.length) {
        console.warn('⚠️ Elemen #availability tidak ditemukan di HTML!');
        return;
    }

    if (isUpdating) {
        box.addClass('is-updating');
    } else {
        box.removeClass('is-updating');
    }

    box.fadeOut(120, function () {
        box.removeClass('alert-secondary alert-success alert-danger alert-info')
            .addClass(`alert alert-${type}`) // Pastikan class 'alert' dasar ada
            .html(htmlMessage)
            .fadeIn(180);
    });
}

$(document).ready(function () {
    console.log('✅ Script pendaftaran berhasil dimuat!'); // Debugging penting

    // Ajax availability check
    $(document).on('change', '#course_id', function () {
        const id = this.value;
        const template = $(this).data('availability-template');
        
        console.log('🔄 Kursus berubah. ID:', id, 'Template:', template);

        if (!id) {
            setAvailabilityMessage('Pilih kursus untuk melihat sisa kursi melalui Ajax.', 'secondary');
            return;
        }

        setAvailabilityMessage('<em>Memeriksa ketersediaan kursi...</em>', 'info', true);

        // Gunakan template dari data-attribute, atau fallback ke route default
        const url = template 
            ? String(template).replace('__COURSE__', encodeURIComponent(id)) 
            : `/courses/${id}/availability`;

        $.ajax({
            url: url,
            method: 'GET',
            dataType: 'json',
            success(data) {
                console.log('✅ Data diterima:', data);
                const courseName = data.course || 'Kursus';
                const remaining = data.remaining !== undefined ? data.remaining : 0;
                const statusText = data.status && data.status !== 'open' ? ` (Status: ${data.status})` : '';
                
                const msg = `<strong>${courseName}</strong> — Tersisa <strong>${remaining} kursi</strong>${statusText}.`;
                
                // Jika sisa 0, ganti warna jadi danger, jika > 0 jadi success
                const alertType = remaining > 0 ? 'success' : 'danger';
                setAvailabilityMessage(msg, alertType);
            },
            error(xhr, status, error) {
                console.error('❌ Gagal memuat data:', xhr.responseText || error);
                setAvailabilityMessage('<strong>Gagal:</strong> Tidak dapat memuat data ketersediaan kursi.', 'danger');
            }
        });
    });

    // Scroll reveal observer (Tetap dipertahankan, ini sudah bagus)
    if ('IntersectionObserver' in window) {
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('revealed');
                    observer.unobserve(entry.target);
                }
            });
        }, { threshold: 0.1 });

        document.querySelectorAll('.reveal-on-scroll').forEach(el => observer.observe(el));
    } else {
        $('.reveal-on-scroll').addClass('revealed');
    }
});