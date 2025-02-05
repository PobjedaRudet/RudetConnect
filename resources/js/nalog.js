// Funkcija za inicijalizaciju
function initialize() {
    console.log('DOM loaded');
    setupProductInput();
    setupCeOznakaFetchBihnel();
    setupProductList();
    setupProductListBihnel()
    //posaljiNalog();
    posaljiNoviNalog();
}

// Postavljanje događaja za pretragu proizvoda
function setupProductInput() {
    const productInput = document.getElementById('productInput');
    const datalist = document.getElementById('productSuggestions');

    if (productInput && datalist) {
        productInput.addEventListener('input', async () => {
            const input = productInput.value;
            console.log('Selected value:', productInput.value);
            const selectedValue = productInput.value;
            const options = Array.from(datalist.options).map(option => option.value);
            if (options.includes(selectedValue)) {
                console.log('Selected value from datalist:', selectedValue);
                // Perform actions based on the selected value
                if (selectedValue.includes('BIHNEL')) {
                    console.log('Selected value includes BIHNEL');
                    // how to disable field metraza and color grey
                    document.getElementById('metraza').style.backgroundColor = 'grey';
                    document.getElementById('metraza').disabled = true;
                    document.getElementById('vrstaProvodnika').style.backgroundColor = 'grey';
                    document.getElementById('vrstaProvodnika').disabled = true;
                    document.getElementById('tip').style.backgroundColor = 'grey';
                    document.getElementById('tip').disabled = true;
                    setupCeOznakaFetchBihnel();
                    setupProductListBihnel();
                } else if (selectedValue.includes('DK-')) {
                    console.log('Selected value includes DK proizvodi');
                }
                else {
                    //enable these fields
                    document.getElementById('metraza').style.backgroundColor = '';
                    document.getElementById('metraza').disabled = false;
                    document.getElementById('vrstaProvodnika').style.backgroundColor = '';
                    document.getElementById('vrstaProvodnika').disabled = false;
                    document.getElementById('tip').style.backgroundColor = '';
                    document.getElementById('tip').disabled = false;
                    setupProductList();
                }

            }
            datalist.innerHTML = ''; // Očisti prethodne sugestije

            if (input.length > 0) {
                console.log('Fetching data...lista');
                try {
                    const response = await fetch(`/products?query=${input}`);
                    if (!response.ok) throw new Error('Network response was not ok');
                    const data = await response.json();

                    const uniqueProducts = new Set();
                    data.forEach(product => {
                        if (!uniqueProducts.has(product.SkraceniNaziv)) {
                            uniqueProducts.add(product.SkraceniNaziv);
                            const option = document.createElement('option');
                            option.value = product.SkraceniNaziv;
                            console.log('Product:', product.SkraceniNaziv);
                            datalist.appendChild(option);
                        }
                    });
                } catch (error) {
                    console.error("Error fetching data:f", error);
                }
            }
        });
    }
}

// Postavljanje događaja za dobijanje CE oznake
function setupCeOznakaFetch() {
    console.log('Setting up CE oznaka fetch');
    const nazivInput = document.getElementById('productInput');
    const vrstaProvodnikaInput = document.getElementById('vrstaProvodnika');
    const ceOznakaInput = document.getElementById('ceOznaka');
    const klasaInput = document.getElementById('klasaOpasnosti');
    const unBrojInput = document.getElementById('unBroj');

    if (nazivInput && vrstaProvodnikaInput && ceOznakaInput && klasaInput && unBrojInput) {
        const fetchCeOznaka = async () => {
            const naziv = nazivInput.value;
            const vrstaProvodnika = vrstaProvodnikaInput.value;

            if (naziv && vrstaProvodnika) {
                try {
                    const response = await fetch(`/getCeOznaka?naziv=${naziv}&vrstaProvodnika=${vrstaProvodnika}`);
                    if (!response.ok) throw new Error('Network response was not ok');
                    const data = await response.json();

                    ceOznakaInput.value = data.CEMarkNumber;
                    klasaInput.value = data.HazardClass;
                    unBrojInput.value = data.UNNumber;
                } catch (error) {
                    console.error("Error fetching dataW:", error);
                }
            }
        };

        nazivInput.addEventListener('input', fetchCeOznaka);
        vrstaProvodnikaInput.addEventListener('change', fetchCeOznaka);
    }
}

function setupCeOznakaFetchBihnel() {
    console.log('Setting up CE oznaka fetch Bihnel');
    const nazivInput = document.getElementById('productInput');
    //const vrstaProvodnikaInput = document.getElementById('vrstaProvodnika');
    const ceOznakaInput = document.getElementById('ceOznaka');
    const klasaInput = document.getElementById('klasaOpasnosti');
    const unBrojInput = document.getElementById('unBroj');

    if (nazivInput && ceOznakaInput && klasaInput && unBrojInput) {
        const fetchCeOznaka = async () => {
            const naziv = nazivInput.value;
            //const vrstaProvodnika = vrstaProvodnikaInput.value;

            if (naziv) {
                try {
                    const response = await fetch(`/getCeOznakaBihnel?naziv=${naziv}`);
                    if (!response.ok) throw new Error('Network response was not ok');
                    console.log("Ovo je ce novi resp:" + response);
                    const data = await response.json();

                    ceOznakaInput.value = data.CEMarkNumber;
                    klasaInput.value = data.HazardClass;
                    unBrojInput.value = data.UNNumber;
                } catch (error) {
                    console.error("Error fetching dataP:", error);
                }
            }
        };

        nazivInput.addEventListener('input', fetchCeOznaka);

    }
}

// Postavljanje događaja za prikaz liste proizvoda
function setupProductList() {
    console.log('Setting up product list');
    const productInput = document.getElementById('productInput');
    const metrazaInput = document.getElementById('metraza');
    const vrstaProvodnikaInput = document.getElementById('vrstaProvodnika');
    const tipInput = document.getElementById('tip');
    const productListNew = document.getElementById('productListNew');

    if (productInput && metrazaInput && vrstaProvodnikaInput && productListNew) {
        const fetchProducts = async () => {
            const input = productInput.value;
            const metraza = metrazaInput.value;
            const provodnik = vrstaProvodnikaInput.value;
            const tip = tipInput.value;
            productListNew.innerHTML = ''; // Očisti prethodnu listu

            if (input.length > 0 && metraza.length > 0) {
                try {
                    const response = await fetch(`/productslist?query=${input}&uom_meter=${metraza}&provodnik=${provodnik}&tip=${tip}`);
                    if (!response.ok) throw new Error('Network response was not ok');
                    const data = await response.json();
                    console.log(data);

                    // Sort data by productNumera in ascending order
                    data.sort((a, b) => a.NumeraProizvoda - b.NumeraProizvoda);

                    data.forEach(product => {
                        const listItem = document.createElement('li');
                        listItem.style.listStyleType = 'none';
                        listItem.classList.add('mb-2', 'flex', 'items-center');

                        const checkbox = document.createElement('input');
                        checkbox.type = 'checkbox';
                        checkbox.name = 'selectedProducts';
                        checkbox.value = product.id;
                        checkbox.classList.add('form-check-input', 'mr-2');

                        const productNumera = product.NumeraProizvoda < 10 ? '0' + product.NumeraProizvoda : product.NumeraProizvoda;
                        const productText = document.createTextNode(` Numera: ${productNumera}`);

                        const inputBox = document.createElement('input');
                        inputBox.type = 'text';
                        inputBox.name = product.id;
                        inputBox.className="productListNewItem";
                        inputBox.classList.add('form-control', 'rounded-md', 'shadow-sm', 'ml-2', 'dark:bg-gray-700', 'dark:text-gray-200');
                        inputBox.style.maxWidth = '100px';
                        inputBox.style.height = '30px';

                        // Store the value entered in the input box
                        inputBox.addEventListener('input', (event) => {
                            const value = event.target.value;
                            console.log(`id:${product.id}, vrijednost:${value}`);
                        });

                        listItem.appendChild(checkbox);
                        listItem.appendChild(productText);
                        listItem.appendChild(inputBox);
                        productListNew.appendChild(listItem);
                    });
                } catch (error) {
                    console.error("Error fetching data:R", error);
                }
            }
        };

        //productInput.addEventListener('input', fetchProducts);
        metrazaInput.addEventListener('input', fetchProducts);
        vrstaProvodnikaInput.addEventListener('change', fetchProducts);
        tipInput.addEventListener('change', fetchProducts);
    }
}
function setupProductListBihnel() {
    console.log('Setting up productlist Bihnel');
    const productInput = document.getElementById('productInput');
    const productListNew = document.getElementById('productListNew');

    if (productInput && productInput.value.trim() !== "") {
        const fetchProducts = async () => {
            const input = productInput.value.trim();
            productListNew.innerHTML = ''; // Očisti prethodnu listu

            if (input.length > 0) {
                try {
                    const response = await fetch(`/productslistBihnel?query=${input}`);
                    if (!response.ok) throw new Error('Network response was not ok');
                    const data = await response.json();

                    // Sort data by productNumera in ascending order
                    data.sort((a, b) => a.NumeraProizvoda - b.NumeraProizvoda);

                    data.forEach(product => {
                        const listItem = document.createElement('li');
                        listItem.style.listStyleType = 'none';
                        listItem.classList.add('mb-2', 'flex', 'items-center');

                        const checkbox = document.createElement('input');
                        checkbox.type = 'checkbox';
                        checkbox.name = 'selectedProducts';
                        checkbox.value = product.id;
                        checkbox.classList.add('form-check-input', 'mr-2');

                        const productNumera = product.UoM_meter;
                        const productText = document.createTextNode(` Metraža: ${productNumera}`);

                        const inputBox = document.createElement('input');
                        inputBox.type = 'text';
                        inputBox.name = 'productValue';
                        inputBox.classList.add('form-control', 'rounded-md', 'shadow-sm', 'ml-2', 'dark:bg-gray-700', 'dark:text-gray-200');
                        inputBox.style.maxWidth = '100px';
                        inputBox.style.height = '30px';

                        listItem.appendChild(checkbox);
                        listItem.appendChild(productText);
                        listItem.appendChild(inputBox);
                        productListNew.appendChild(listItem);
                    });
                } catch (error) {
                    console.error("Error fetching data:c", error);
                }
            }
        };
        fetchProducts();
    } else {
        console.log("Nema product inputa ili je prazan");
    }
}

 /* function posaljiNalog() {
    const form = document.querySelector('form'); // Forma za unos podataka
    const productListNew = document.getElementById('productListNew'); // Lista proizvoda

    form.addEventListener('submit', async function (event) {
        event.preventDefault(); // Sprečava podrazumevano ponašanje forme

        // Prikupi podatke iz forme
        const formData = new FormData(form);
        const formObject = {};
        formData.forEach((value, key) => {
            formObject[key] = value;
        });

        // Prikupi podatke iz liste proizvoda
        const products = [];
        productListNew.querySelectorAll('li').forEach(item => {
            const checkbox = item.querySelector('input[type="checkbox"]');
            const inputBox = item.querySelector('input[type="text"]');
            if (checkbox && inputBox && checkbox.checked) {
                products.push({
                    productId: checkbox.value,
                    productValue: inputBox.value,
                });
            }
        });

        // Log collected products
        console.log('Collected products:', products);

        // Dodaj proizvode u objekat za slanje
        formObject.products = products;
        console.log('Proizvodi u formi:', formObject);

        try {
            // Pošalji podatke na server
            const response = await fetch("{{ route('productionorders.store') }}", {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}', // Dodaj CSRF token za sigurnost
                },
                body: JSON.stringify(formObject),
            });

            if (!response.ok) {
                throw new Error('Network response was not ok');
            }

            const result = await response.json();
            console.log('Success:', result);
            alert('Podaci su uspešno sačuvani!');

        } catch (error) {
            console.error('Error:', error);
            alert('Došlo je do greške prilikom čuvanja podataka.');
        }
    });
} */
    function posaljiNalog() {
        document.querySelector("form").addEventListener("submit", function(event) {
            event.preventDefault(); // Prevent default form submission

            let formData = new FormData(this);
            let productListNew = [...document.querySelectorAll(".productListNewItem")].map(item => {
                return {
                    id: item.name, // "name" atribut je postavljen na id proizvoda
                    vrijednost: item.value // "value" atribut je vrednost koju korisnik unese
                };
            });
            formData.append("productListNew", JSON.stringify(productListNew));

            fetch(this.action, {
                method: "POST",
                body: formData,
                headers: {
                    "X-CSRF-TOKEN": document.querySelector("input[name=_token]").value
                }
            }).then(response => response.json())
              .then(data => console.log(data))
              .catch(error => console.error(error));
        });
    }

    function posaljiNoviNalog() {
        document.getElementById("pregledBtn").addEventListener("click", function() {
            const orderNumber = document.getElementById("orderNumber").value;
            const podaci = {
                ime: "Test Proizvod",
                kolicina: 10,
                cijena: 150,
                orderNumber: orderNumber,
                productListNew : [...document.querySelectorAll(".productListNewItem")]
                    .filter(item => item.value > 0)
                    .map(item => {
                        return {
                            id: item.name, // "name" atribut je postavljen na id proizvoda
                            vrijednost: item.value // "value" atribut je vrednost koju korisnik unese
                        };
                    })
            };

            fetch("/productionorders", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute("content")
                },
                body: JSON.stringify(podaci)
            })
            .then(response => {
                if (response.headers.get('content-type').includes('application/json')) {
                    return response.json();
                } else {
                    throw new Error('Response is not JSON');
                }
            })
            .then(data => {
                alert("Podaci su poslani!");
                console.log(data);
            })
            .catch(error => {
                alert("Greška pri slanju podataka!");
                console.error("Error:", error);
            });
        });
    }




// Pokreni inicijalizaciju kada se DOM učita
document.addEventListener("DOMContentLoaded", initialize);
