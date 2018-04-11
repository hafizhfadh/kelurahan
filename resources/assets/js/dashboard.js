document.addEventListener('DOMContentLoaded', function () {

    // Get all "navbar-burger" elements
    var $navbarBurgers = Array.prototype.slice.call(document.querySelectorAll('.navbar-burger'), 0);
    if ($navbarBurgers.length > 0) {

      $navbarBurgers.forEach(function ($el) {
        $el.addEventListener('click', function () {
          var target = $el.dataset.target;
          var $target = document.getElementById(target);
          // Toggle the class on both the "navbar-burger" and the "navbar-menu"
          $el.classList.toggle('is-active');
          $target.classList.toggle('is-active');
        });
      });

    }

    // Get all "is-tab" elements
    var $isTabs = Array.prototype.slice.call(document.querySelectorAll('.is-tab'), 0);
    if ($isTabs.length > 0) {

      function removeAllIsActive(){
        $isTabs.forEach(function ($el) {
          $el.classList.remove('is-active');
        });
      }

      $isTabs.forEach(function ($el) {
        $el.addEventListener('click', function () {
          removeAllIsActive();
          $el.classList.add('is-active');
        });
      });
    }

    document.getElementById("menu").addEventListener("click", function () {
      var nav = document.getElementById("sub");
      var className = nav.getAttribute("class");
      if(className == "is-active") {
        nav.className = "is-hidden";
      } else {
        nav.className = "is-active";
      }
    });

  });

  document.addEventListener('DOMContentLoaded', function () {

    // Modals

    var rootEl = document.documentElement;
    var $modals = getAll('.modal');
    var $modalButtons = getAll('.modal-button');
    var $modalCloses = getAll('.modal-background, .modal-close, .modal-card-head .delete, .modal-card-foot .button');

    if ($modalButtons.length > 0) {
      $modalButtons.forEach(function ($el) {
        $el.addEventListener('click', function () {
          var target = $el.dataset.target;
          var $target = document.getElementById(target);
          rootEl.classList.add('is-clipped');
          $target.classList.add('is-active');
        });
      });
    }

    if ($modalCloses.length > 0) {
      $modalCloses.forEach(function ($el) {
        $el.addEventListener('click', function () {
          closeModals();
        });
      });
    }

    document.addEventListener('keydown', function (event) {
      var e = event || window.event;
      if (e.keyCode === 27) {
        closeModals();
      }
    });

    function closeModals() {
      rootEl.classList.remove('is-clipped');
      $modals.forEach(function ($el) {
        $el.classList.remove('is-active');
      });
    }

    // Functions

    function getAll(selector) {
      return Array.prototype.slice.call(document.querySelectorAll(selector), 0);
    }

  });
