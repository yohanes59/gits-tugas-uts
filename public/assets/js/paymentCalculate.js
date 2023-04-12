document.addEventListener('DOMContentLoaded', function () {
    const grandtotal = document.getElementById('grandtotal');
    const bayarInput = document.getElementById('bayar');
    const sisaUang = document.getElementById('kembali');
    const bayarBtn = document.getElementById('bayar-btn');

    bayarInput.addEventListener('input', function () {
        const bayar = parseInt(bayarInput.value) || 0;
        const kembalian = bayar - grandtotal.textContent;
        sisaUang.textContent = kembalian < 0 ? 0 : kembalian;

        if (bayar >= grandtotal.textContent) {
            bayarBtn.removeAttribute('disabled');
        } else {
            bayarBtn.setAttribute('disabled', true);
        }
    });
});