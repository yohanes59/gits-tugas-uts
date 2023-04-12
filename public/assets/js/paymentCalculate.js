document.addEventListener('DOMContentLoaded', function () {
    const grandtotal = document.getElementById('grandtotal');
    const bayarInput = document.getElementById('bayar');
    const sisaUang = document.getElementById('kembali');

    bayarInput.addEventListener('input', function () {
        const bayar = parseInt(bayarInput.value);
        const kembalian = bayar - grandtotal.textContent;
        sisaUang.textContent = kembalian;
    });
});