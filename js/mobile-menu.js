document.addEventListener('DOMContentLoaded', function() {
  const menuToggleCheckbox = document.getElementById('menu-toggle');
  const menuToggleLabel = document.querySelector('.menu-toggle-label');
  const mainNavigation = document.querySelector('.main-navigation');
  const menuItems = mainNavigation.querySelectorAll('a'); // Select all menu item links

  const listener = function(e) {
    if (!menuToggleCheckbox.contains(e.target) && 
        !menuToggleLabel.contains(e.target) && 
        !mainNavigation.contains(e.target)) {
      menuToggleCheckbox.checked = false;
      document.removeEventListener('click', listener);
      console.log('Closing menu');
    }
  };

  menuToggleCheckbox.addEventListener('click', function(e) {
    if (this.checked) {
      document.addEventListener('click', listener);
    }
    e.stopPropagation(); // Stop the click event from propagating to the document
  });

  menuToggleLabel.addEventListener('click', function(e) {
    e.stopPropagation(); // Stop the click event from propagating to the document
  });

  mainNavigation.addEventListener('click', function(e) {
    e.stopPropagation(); // Prevent the click event from bubbling up to the document
  });

  // Add click event listeners to each menu item link to close the menu
  menuItems.forEach(function(menuItem) {
    menuItem.addEventListener('click', function() {
      menuToggleCheckbox.checked = false;
      document.removeEventListener('click', listener);
      console.log('Menu item clicked, closing menu');
    });
  });
});