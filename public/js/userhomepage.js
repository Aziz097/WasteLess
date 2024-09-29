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

    // Tambahkan event listener untuk tombol tambah (+) dan kurang (-)
    addButtons.forEach(button => {
        button.addEventListener('click', (event) => {
            const parent = event.target.closest('.product-card');
            const actionsDiv = parent.querySelector('.product-actions');
            const productTitle = parent.querySelector('.product-title').textContent;
            const newPrice = parent.querySelector('.new-price').textContent.replace('Rp', '').replace('.', '');
            const discountBadge = parent.querySelector('.discount-badge').textContent;

            // Ubah tampilan aksi produk menjadi tombol plus dan minus
            actionsDiv.innerHTML = `
                <button class="remove-button">-</button>
                <span class="quantity">1</span>
                <button class="add-quantity-button">+</button>
            `;

            const removeButton = actionsDiv.querySelector('.remove-button');
            const addQuantityButton = actionsDiv.querySelector('.add-quantity-button');
            const quantityDisplay = actionsDiv.querySelector('.quantity');

            let quantity = 1;  // Mulai dari 1 karena pengguna menambahkan satu produk

            // Tambahkan produk ke localStorage
            updateOrderItem({
                title: productTitle,
                price: parseInt(newPrice),
                discount: discountBadge
            }, 1);

            // Fungsi untuk "+" (tambah) button
            addQuantityButton.addEventListener('click', () => {
                quantity++;
                quantityDisplay.textContent = quantity;
                // Perbarui jumlah di localStorage
                updateOrderItem({
                    title: productTitle,
                    price: parseInt(newPrice),
                    discount: discountBadge
                }, 1);
            });

            // Fungsi untuk "-" (kurangi) button
            removeButton.addEventListener('click', () => {
                if (quantity > 1) {
                    quantity--;
                    quantityDisplay.textContent = quantity;
                    // Perbarui jumlah di localStorage
                    updateOrderItem({
                        title: productTitle,
                        price: parseInt(newPrice),
                        discount: discountBadge
                    }, -1);
                } else {
                    // Jika quantity mencapai 0, kembalikan tombol "+" dan hapus produk dari localStorage
                    actionsDiv.innerHTML = `<button class="add-button">+</button>`;
                    reAddButtonEventListener(actionsDiv.querySelector('.add-button'));
                    // Hapus produk dari localStorage
                    updateOrderItem({
                        title: productTitle,
                        price: parseInt(newPrice),
                        discount: discountBadge
                    }, -1);
                }
            });
        });
    });

    // Fungsi untuk menambahkan event listener kembali ke tombol "+" setelah dihapus
    function reAddButtonEventListener(button) {
        button.addEventListener('click', (event) => {
            const parent = event.target.closest('.product-card');
            const actionsDiv = parent.querySelector('.product-actions');
            const productTitle = parent.querySelector('.product-title').textContent;
            const newPrice = parent.querySelector('.new-price').textContent.replace('Rp', '').replace('.', '');
            const discountBadge = parent.querySelector('.discount-badge').textContent;

            actionsDiv.innerHTML = `
                <button class="remove-button">-</button>
                <span class="quantity">1</span>
                <button class="add-quantity-button">+</button>
            `;

            const removeButton = actionsDiv.querySelector('.remove-button');
            const addQuantityButton = actionsDiv.querySelector('.add-quantity-button');
            const quantityDisplay = actionsDiv.querySelector('.quantity');

            let quantity = 1;

            // Tambahkan produk ke localStorage
            updateOrderItem({
                title: productTitle,
                price: parseInt(newPrice),
                discount: discountBadge
            }, 1);

            addQuantityButton.addEventListener('click', () => {
                quantity++;
                quantityDisplay.textContent = quantity;
                updateOrderItem({
                    title: productTitle,
                    price: parseInt(newPrice),
                    discount: discountBadge
                }, 1);
            });

            removeButton.addEventListener('click', () => {
                if (quantity > 1) {
                    quantity--;
                    quantityDisplay.textContent = quantity;
                    updateOrderItem({
                        title: productTitle,
                        price: parseInt(newPrice),
                        discount: discountBadge
                    }, -1);
                } else {
                    actionsDiv.innerHTML = `<button class="add-button">+</button>`;
                    reAddButtonEventListener(actionsDiv.querySelector('.add-button'));
                    updateOrderItem({
                        title: productTitle,
                        price: parseInt(newPrice),
                        discount: discountBadge
                    }, -1);
                }
            });
        });
    }

    // Perbarui cart summary pada halaman load
    updateCartSummary();
});
