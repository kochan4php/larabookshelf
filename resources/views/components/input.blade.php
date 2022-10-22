<div>
  <label for="{{ $name }}" class="form-label">{{ $label }}</label>
  <input type="{{ $type }}" class="form-control @error($name) is-invalid @enderror" id="{{ $name }}"
    name="{{ $name }}" placeholder="{{ $placeholder }}" value="{{ old($name) }}">
  @error($name)
    <div class="invalid-feedback">
      {{ $message }}
    </div>
  @enderror
</div>
