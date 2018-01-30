<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
<script>

function ConfirmDelete()
  {
  var x = confirm("هل أنت متأكد أنك تريد حذف المقال؟");
  if (x)
    return true;
  else
    return false;
  }

</script>