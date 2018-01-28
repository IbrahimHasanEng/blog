<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ URL::asset('js/tinymce/tinymce.min.js') }}"></script>
<script>

function ConfirmDelete()
  {
  var x = confirm("هل أنت متأكد أنك تريد حذف المقال؟");
  if (x)
    return true;
  else
    return false;
  }

</script>﻿

<script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
<script>
  CKEDITOR.replace( 'article-ckeditor', {
      language: 'ar'
    } );

  CKEDITOR.replace( 'article-ckeditor' );

</script>
