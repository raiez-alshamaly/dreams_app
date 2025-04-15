<form method="POST" action="{{ route('theme-settings.update') }}">
    @csrf
    @method('PUT')

    <label>لون الخلفية:</label>
    <input type="color" name="background_color" value="{{ $settings['background_color'] ?? '#ffffff' }}"><br>

    <label>لون النص:</label>
    <input type="color" name="text_color" value="{{ $settings['text_color'] ?? '#000000' }}"><br>

    <label>لون الأزرار:</label>
    <input type="color" name="btn_color" value="{{ $settings['btn_color'] ?? '#ff6600' }}"><br>

    <button type="submit">حفظ</button>
</form>