document.addEventListener('DOMContentLoaded', function () {
    const addProductButton = document.getElementById('addProductButton');
    const productSelect = document.getElementById('productSelect');
    const productList = document.getElementById('productList');

    addProductButton.addEventListener('click', function () {
        const selectedProduct = productSelect.options[productSelect.selectedIndex];
        const productId = selectedProduct.value;
        const productName = selectedProduct.text;

        if (productId) {
            const listItem = document.createElement('li');
            listItem.textContent = productName;
            productList.appendChild(listItem);

            const hiddenInput = document.createElement('input');
            hiddenInput.type = 'hidden';
            hiddenInput.name = 'additionalProducts[]';
            hiddenInput.value = productId;
            listItem.appendChild(hiddenInput);
        }
    });
});
