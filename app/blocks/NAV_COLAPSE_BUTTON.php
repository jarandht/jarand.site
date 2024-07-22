<img class="NAV_COLAPSE_BUTTON" src="/img/nav_icons/gray_burger.png" alt="">

<script>
document.querySelector('.NAV_COLAPSE_BUTTON').addEventListener('click', function() {
  document.querySelectorAll('.nav').forEach(element => {
    if (element.style.transform === 'translateX(-290px)') {
      element.style.transform = '';
    } else {
      element.style.transform = 'translateX(-290px)';
    }
  });

  document.querySelectorAll('.wrapper').forEach(element => {
    if (element.style.transform === 'translateX(-290px)') {
      element.style.transform = '';
    } else {
      element.style.transform = 'translateX(-290px)';
    }
  });
});
</script>