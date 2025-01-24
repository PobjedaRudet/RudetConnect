document.addEventListener('DOMContentLoaded', function () {
    const addProductButton = document.getElementById('addProductButton');
    const productSelect = document.getElementById('productSelect');
    const productList = document.getElementById('productList');
    const productQuantity = document.getElementById('productQuantity');
    productQuantity.classList.add('half-width'); // Add this line
    console.log("Uciatano.");

    addProductButton.addEventListener('click', function () {
        const selectedProduct = productSelect.options[productSelect.selectedIndex];
        const productId = selectedProduct.value;
        const productName = selectedProduct.text;
        const quantity = productQuantity.value;

        console.log("Dodato");

        if (productId && quantity) {
            // Check if the headers already exist
            if (!document.querySelector('.product-list-header')) {
                const headerRow = document.createElement('div');
                headerRow.className = 'product-list-header flex justify-between p-2';

                const nameHeader = document.createElement('h3');
                nameHeader.textContent = 'Name';
                headerRow.appendChild(nameHeader);

                const qtyHeader = document.createElement('h3');
                qtyHeader.textContent = 'Qty';
                headerRow.appendChild(qtyHeader);

                productList.appendChild(headerRow);
            }

            // Create the list item for the selected product
            const listItem = document.createElement('div');
            listItem.className = 'flex justify-between p-4';

            const nameSpan = document.createElement('span');
            nameSpan.textContent = productName;
            listItem.appendChild(nameSpan);

            const qtySpan = document.createElement('span');
            qtySpan.textContent = quantity;
            listItem.appendChild(qtySpan);

            productList.appendChild(listItem);

            // Create the hidden input for form submission
            const hiddenInput = document.createElement('input');
            hiddenInput.type = 'hidden';
            hiddenInput.name = 'additionalProducts[]';
            hiddenInput.value = `${productId}:${quantity}`;
            listItem.appendChild(hiddenInput);
        }
    });
});
