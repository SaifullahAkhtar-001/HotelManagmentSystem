import './bootstrap';

import 'flowbite';

import Alpine from 'alpinejs'

import axios from 'axios'

window.Alpine = Alpine

Alpine.start()

document.addEventListener('DOMContentLoaded', function () {
    const navbar = document.getElementById('navbar');
    let lastScrollTop = 0;

    window.addEventListener('scroll', function () {
        let scrollTop = window.pageYOffset || document.documentElement.scrollTop;

        if (scrollTop > lastScrollTop) {
            // Scrolling down
            navbar.classList.add('-translate-y-full');
        } else {
            // Scrolling up
            navbar.classList.remove('-translate-y-full');
        }

        lastScrollTop = scrollTop;
    });
})

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

window.updateQuantity = updateQuantity;
window.changeQuantity = changeQuantity;
window.slideLeft = slideLeft;
window.slideRight = slideRight;




