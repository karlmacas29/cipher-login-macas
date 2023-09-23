
<script type="text/javascript">
    $(document).ready(function() {
  // Check for the user's preference in localStorage
  const currentMode = localStorage.getItem('mode');
  if (currentMode === 'dark') {
    $('body').addClass('text-bg-dark');
    $('#darkbg,#darkBg1').addClass('text-bg-dark');
    $('#card,#card1,#card2,#uvalid,#pvalid').addClass('text-bg-dark border-light').removeClass('text-bg-light border-dark');
    $('#inDiv, #inDiv1').attr('data-bs-theme', 'dark');
    $('#sidebar1').addClass('text-bg-secondary').removeClass("bg-primary");
    $('#nav1,#nav2').addClass('text-bg-dark').removeClass("bg-primary-subtle");
    $('#title9').addClass('text-light').removeClass("text-dark");

    $('#modeToggle').prop('checked', true);
  }

  // Toggle between light and dark mode
  $('#modeToggle').change(function() {
    if (this.checked) {
      $('body').addClass('text-bg-dark');
      $('#darkbg,#darkBg1').addClass('text-bg-dark');
      $('#card,#card1,#card2,#uvalid,#pvalid').addClass('text-bg-dark border-light').removeClass('text-bg-light border-dark');
      $('#inDiv, #inDiv1').attr('data-bs-theme', 'dark');
      $('#sidebar1').addClass('text-bg-secondary').removeClass("bg-primary");
      $('#nav1,#nav2').addClass('text-bg-dark').removeClass("bg-primary-subtle");
      $('#title9').addClass('text-light').removeClass("text-dark");

      localStorage.setItem('mode', 'dark');
    } else {
      $('body').removeClass('text-bg-dark');
      $('#darkbg,#darkBg1').removeClass('text-bg-dark');
      $('#card,#card1,#card2,#uvalid,#pvalid').removeClass('text-bg-dark').addClass('text-bg-light border-dark');
      $('#inDiv, #inDiv1').attr('data-bs-theme', 'light');
      $('#sidebar1').addClass('bg-primary').removeClass("text-bg-secondary");
      $('#nav1,#nav2').addClass('bg-primary-subtle').removeClass("text-bg-dark");
      $('#title9').addClass('text-dark').removeClass("text-light");

      localStorage.setItem('mode', 'light');
    }
  });


});

</script>