document.addEventListener('DOMContentLoaded', () => {
    const addButtons = document.querySelectorAll('.add-button');
    const cartSummary = document.getElementById('cart-summary');
    const itemCount = document.getElementById('item-count');
    const totalPrice = document.getElementById('total-price');

    // Fungsi untuk mendapatkan item order dari localStorage
    function getOrderItems() {
        const orderItems = localStorage.getItem('orderItems');
        return orderItems ? JSON.parse(orderItems) : [];
    }

    // Fungsi untuk menyimpan item order ke localStorage
    function saveOrderItems(orderItems) {
        localStorage.setItem('orderItems', JSON.stringify(orderItems));
    }

    // Fungsi untuk menghitung total item dan harga
    function updateCartSummary() {
        const orderItems = getOrderItems();
        let totalItems = 0;
        let totalAmount = 0;

        orderItems.forEach(item => {
            totalItems += item.quantity;
            totalAmount += item.quantity * item.price;
        });

        if (totalItems > 0) {
            cartSummary.style.display = 'flex';  // Tampilkan elemen cart summary
            itemCount.textContent = `${totalItems} item`;
            totalPrice.textContent = `Rp${totalAmount.toLocaleString()}`;
        } else {
            cartSummary.style.display = 'none';  // Sembunyikan elemen jika tidak ada item
        }
    }

    // Fungsi untuk menambahkan atau memperbarui produk ke order (localStorage)
    function updateOrderItem(product, quantityChange) {
        let orderItems = getOrderItems();
        const existingProductIndex = orderItems.findIndex(item => item.title === product.title);

        if (existingProductIndex !== -1) {
            // Jika produk sudah ada, perbarui jumlahnya
            orderItems[existingProductIndex].quantity += quantityChange;

            // Hapus produk jika jumlahnya mencapai 0
            if (orderItems[existingProductIndex].quantity <= 0) {
                orderItems.splice(existingProductIndex, 1);
            }
        } else {
            // Jika produk belum ada, tambahkan ke orderItems
            product.quantity = quantityChange;
            orderItems.push(product);
        }

        saveOrderItems(orderItems);
        updateCartSummary();  // Perbarui tampilan cart summary
    }

    // Perbarui cart summary pada halaman load
    updateCartSummary();
});
