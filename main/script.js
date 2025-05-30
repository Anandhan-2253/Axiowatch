function toggleDropdown() {
    var dropdownMenu = document.getElementById("myDropdown");
    if (dropdownMenu.style.display === "block") {
      dropdownMenu.style.display = "none";
    } else {
      dropdownMenu.style.display = "block";
    }
  }
  
  // Close the dropdown menu if the user clicks outside of it
  window.onclick = function(event) {
    if (!event.target.matches('.dropbtn')) {
      var dropdowns = document.getElementsByClassName("dropdown-content");
      for (var i = 0; i < dropdowns.length; i++) {
        var openDropdown = dropdowns[i];
        if (openDropdown.style.display === "block") {
          openDropdown.style.display = "none";
        }
      }
    }
}

document.addEventListener("DOMContentLoaded", function() {
  function animateValue(id, start, end, duration) {
      const obj = document.getElementById(id);
      let startTimestamp = null;
      const step = (timestamp) => {
          if (!startTimestamp) startTimestamp = timestamp;
          const progress = Math.min((timestamp - startTimestamp) / duration, 1);
          obj.innerText = Math.floor(progress * (end - start) + start);
          if (progress < 1) {
              window.requestAnimationFrame(step);
          }
      };
      window.requestAnimationFrame(step);
  }

  function startAnimation() {
      animateValue("count1", 0, 50000, 6000);
      animateValue("count2", 0, 10000, 6000);
      animateValue("count3", 0, 20000, 6000);
  }

  // Start the animation initially
  startAnimation();

  // Set interval to refresh every 10 seconds (10000 milliseconds)
  setInterval(startAnimation, 10000);
});
