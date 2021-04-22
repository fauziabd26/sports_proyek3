<div class="form-group">
    <label class="control-label" for="name">Nama Sarana</label>
    <input type="text" name="name" class="form-control" id="name" required>
</div>
<div class="form-group">
    <label class="control-label" for="fasilitas">Fasilitas</label>
    <textarea name="fasilitas" class="form-control" id="fasilitas" rows="3" required></textarea>
</div>
<div class="form-group">
    <label class="control-label" for="id_olahraga">Kategori Olahraga</label>
    <select class="control-label" type="text" name="id_olahraga" style="width: 100%">
      <option disabled="" selected="">Select</option>
      @foreach ($olahraga as $o)
        <option value="{{$o->id_olahraga}}">
          {{$o->name_olahraga}}
        </option>
      @endforeach
    </select>
  </div>
<div class="form-group">
    <label class="control-label" for="alamat">Alamat</label>
    <textarea name="alamat" class="form-control" id="alamat" rows="3" required></textarea>
</div>
<div class="form-group">
    <label class="control-label" for="kota">Kota</label>
    <input type="text" name="kota" class="form-control" id="kota" required>
</div>
<div class="form-group">
    <label class="control-label" for="image">Gambar Fasilitas</label>
    <input type="file" name="image" class="form-control" id="file" required>
</div>
