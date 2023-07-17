<button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
  <i class="fa-solid fa-image fs-3"></i>
</button>


<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Aggiungi l'Immagine</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="{{route('admin.gallery')}}" method="POST" enctype="multipart/form-data">
          @csrf
          @method('PUT')

          <div class="mb-3">
            <label for="image" class="form-label text-white">Select an Image</label>
            <input
                class="form-control"
                onchange="showImg(event)"
                type="file"
                id="image"
                name="image"
            >
            <img class="py-3" src="" id="img-show" alt="" width="200">
          </div>

          <button type="submit" class="btn btn-dark d-inline">Aggiungi</button>
        </form>
      </div>
    </div>
  </div>
</div>


<script>
  ClassicEditor
      .create( document.querySelector( '#description' ) )
      .catch( error => {
          console.error( error );
  } );

  function showImg(event){
      const tagImg = document.getElementById('img-show');
      tagImg.src = URL.createObjectURL(event.target.files[0]);
  }
</script>
