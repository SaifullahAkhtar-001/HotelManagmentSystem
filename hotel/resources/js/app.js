import './bootstrap';

import 'flowbite';

import Alpine from 'alpinejs'

import axios from 'axios'

window.Alpine = Alpine

Alpine.start()


const slideLeft = () => {
    var slider = document.getElementById('slider');
    slider.scrollLeft = slider.scrollLeft - 500;
};

const slideRight = () => {
    var slider = document.getElementById('slider');
    slider.scrollLeft = slider.scrollLeft + 500;
};

function updateQuantity(itemId, newQuantity) {
    // Make an AJAX request to the server to update the quantity
    const url = `/updateQuantity/${itemId}`;

    // Using Axios for simplicity (you may need to include it in your project)
    axios.post(url, { newQuantity })
        .then(response => {
            console.log('Quantity updated successfully:');
        })
        .catch(error => {
            console.error('Error updating quantity:', error);
        });
}
function changeQuantity(itemId, operation) {
    // Get the current quantity value from the span
    let currentQuantity = parseInt(document.getElementById(`quantityValue${itemId}`).innerText);
    console.log(currentQuantity);
    // Perform increment or decrement based on the operation
    if (operation === 'increment') {
        currentQuantity++;
    } else if (operation === 'decrement' && currentQuantity > 0) {
        currentQuantity--;
    }

    // Update the quantity on the UI
    document.getElementById(`quantityValue${itemId}`).innerText = currentQuantity;


    // Make an AJAX request to update the quantity in the database
    updateQuantity(itemId, currentQuantity);
}

const dropdownButton = document.getElementById('dropdown-button');
const dropdownMenu = document.getElementById('dropdown-menu');
const searchInput = document.getElementById('search-input');
let isOpen = true; // Set to true to open the dropdown by default

// Function to toggle the dropdown state
function toggleDropdown() {
    isOpen = !isOpen;
    dropdownMenu.classList.toggle('hidden', !isOpen);
}

// Set initial state
toggleDropdown();

dropdownButton.addEventListener('click', () => {
    toggleDropdown();
});

// Add event listener to filter items based on input
searchInput.addEventListener('input', () => {
    const searchTerm = searchInput.value.toLowerCase();
    const items = dropdownMenu.querySelectorAll('a');

    items.forEach((item) => {
        const text = item.textContent.toLowerCase();
        if (text.includes(searchTerm)) {
            item.style.display = 'block';
        } else {
            item.style.display = 'none';
        }
    });
});


window.toggleDropdown = toggleDropdown;
window.updateQuantity = updateQuantity;
window.changeQuantity = changeQuantity;
window.slideLeft = slideLeft;
window.slideRight = slideRight;



