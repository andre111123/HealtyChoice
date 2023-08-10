//MENU-OPEN
document.querySelector('.menu-icon').addEventListener('click', function() {
    document.body.classList.toggle('menu-open');
  });

document.querySelector('.filter').addEventListener('click', function() {
  document.body.classList.toggle('filter-open');
});

document.querySelector('.submit-filter').addEventListener('click', function() {
  document.body.classList.remove('filter-open');
});

//FILTER
const rangeInputs = document.querySelectorAll('input[type="range"]');
    rangeInputs.forEach(input => {
      input.addEventListener('input', function() {
        const valueSpan = this.nextElementSibling;
        valueSpan.textContent = this.value;
      });
    });


    document.addEventListener("DOMContentLoaded", function() {
      const submitFilterButton = document.querySelector(".submit-filter");
      submitFilterButton.addEventListener("click", applyFilters);
    
      function applyFilters() {
        const productTypeCheckboxes = document.querySelectorAll("input[name='productType']:checked");
        const minPrice = document.getElementById("minPrice").value;
        const maxPrice = document.getElementById("maxPrice").value;
        const minCalories = document.getElementById("minCalories").value;
        const maxCalories = document.getElementById("maxCalories").value;
    
        const productItems = document.querySelectorAll(".product");
    
        productItems.forEach(product => {
          const productType = product.getAttribute("data-product-type");
          const productPrice = parseFloat(product.getAttribute("data-price"));
          const productCalories = parseInt(product.getAttribute("data-calories"));
    
          const typeMatch = Array.from(productTypeCheckboxes).some(checkbox => checkbox.value === productType);
          const priceMatch = (minPrice === "" || productPrice >= parseFloat(minPrice)) &&
                             (maxPrice === "" || productPrice <= parseFloat(maxPrice));
          const caloriesMatch = (minCalories === "" || productCalories >= parseInt(minCalories)) &&
                                (maxCalories === "" || productCalories <= parseInt(maxCalories));
    
          if (typeMatch && priceMatch && caloriesMatch) {
            product.style.display = "block"; // Mostra il prodotto
          } else {
            product.style.display = "none"; // Nascondi il prodotto
          }
        });
      }
    });

    
/*SEARCHBAR*/

document.addEventListener("DOMContentLoaded", function() {
  const searchButton = document.getElementById("searchButton");
  const searchInput = document.getElementById("searchInput");

  searchButton.addEventListener("click", performSearch);
  searchInput.addEventListener("keyup", function(event) {
    if (event.key === "Enter") {
      performSearch();
    }
  });

  function performSearch() {
    const searchTerm = searchInput.value.toLowerCase();
    const productItems = document.querySelectorAll(".product");

    productItems.forEach(product => {
      const productTitle = product.querySelector(".product-title").textContent.toLowerCase();

      if (productTitle.includes(searchTerm)) {
        product.style.display = "block"; // Mostra il prodotto
      } else {
        product.style.display = "none"; // Nascondi il prodotto
      }
    });
  }
});


document.addEventListener("DOMContentLoaded", function() {
  const quickSearchButton = document.getElementById("quickSearchButton");
  const quickSearchInput = document.getElementById("quickSearchInput");

  quickSearchButton.addEventListener("click", performQuickSearch);
  quickSearchInput.addEventListener("keyup", function(event) {
    if (event.key === "Enter") {
      performQuickSearch();
    }
  });

  function performQuickSearch() {
    const searchTerm = quickSearchInput.value.toLowerCase();
    const productItems = document.querySelectorAll(".product");

    productItems.forEach(product => {
      const productTitle = product.querySelector(".product-title").textContent.toLowerCase();

      if (productTitle.includes(searchTerm)) {
        product.style.display = "block"; // Mostra il prodotto
      } else {
        product.style.display = "none"; // Nascondi il prodotto
      }
    });
  }
});


//DISCLAIMER

document.querySelector('.info-icon').addEventListener('click', function() {
  document.body.classList.toggle('popup-show');
});

document.querySelector('.close-disclaimer-icon').addEventListener('click', function() {
  document.body.classList.remove('popup-show');
});


