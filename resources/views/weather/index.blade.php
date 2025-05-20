@php
    // Warna retro
    $bgMain = '#00bcd4';
    $bgInput = '#222';
    $bgButton = '#e6007a';
    $border = '5px solid #000';
    $font = 'monospace';
    \Carbon\Carbon::setLocale('id');
@endphp

<style>
    body { 
        background: #222; 
        margin: 0;
        min-height: 100vh;
        display: flex;
        flex-direction: column;
    }
    .retro-main {
        background: {{ $bgMain }};
        border: {{ $border }};
        font-family: {{ $font }};
        box-shadow: 8px 8px 0 #000;
        padding: 2rem 1.5rem 2.5rem 1.5rem;
        width: 420px;
        margin: 2rem auto;
        position: relative;

        
    }
    .retro-label {
        font-size: 1.5rem;
        font-weight: bold;
        color: #fff;
        margin-bottom: 1rem;
        letter-spacing: 1px;
        text-shadow: 2px 2px 0 #000;
    }
    .retro-input {
        width: 100%;
        background: {{ $bgInput }};
        color: #fff;
        border: {{ $border }};
        font-size: 1.2rem;
        padding: 0.7rem 1rem;
        border-radius: 8px;
        margin-bottom: 1.5rem;
        font-family: {{ $font }};
        outline: none;
    }
    .retro-btn {
        width: 100%;
        background: {{ $bgButton }};
        color: #fff;
        border: {{ $border }};
        font-size: 1.3rem;
        font-weight: bold;
        padding: 1rem 0;
        border-radius: 8px;
        cursor: pointer;
        box-shadow: 4px 4px 0 #000;
        transition: background 0.2s;
        font-family: {{ $font }};
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 0.5rem;
    }
    .retro-btn:hover {
        background: #ff0080;
    }
    .retro-history {
        background: #fff176;
        border: {{ $border }};
        color: #222;
        font-family: {{ $font }};
        font-size: 1rem;
        margin-top: 2rem;
        padding: 1rem;
        border-radius: 8px;
        box-shadow: 4px 4px 0 #000;
    }
    .retro-weather {
        background: #d03404;
        border: {{ $border }};
        color: #fff;
        font-family: {{ $font }};
        font-size: 1.1rem;
        margin-top: 2rem;
        padding: 1rem;
        border-radius: 8px;
        box-shadow: 4px 4px 0 #000;
    }
    .retro-title {
        text-align: center;
        color: #fff;
        font-size: 2rem;
        font-family: {{ $font }};
        font-weight: bold;
        margin-bottom: 1.5rem;
        text-shadow: 2px 2px 0 #000;
    }
    .retro-forecast {
        background: #00e676;
        border: {{ $border }};
        color: #222;
        font-family: {{ $font }};
        font-size: 1rem;
        margin-top: 2rem;
        padding: 1rem;
        border-radius: 8px;
        box-shadow: 4px 4px 0 #000;
    }
    .retro-header {
        background: {{ $bgInput }};
        border-bottom: {{ $border }};
        padding: 1rem;
        position: sticky;
        top: 0;
        z-index: 100;
    }
    .retro-footer {
        background: {{ $bgInput }};
        padding: 1rem;
        margin-top: auto;
        text-align: center;
        color: #fff;
        font-family: {{ $font }};
    }
    .retro-social-links {
        display: flex;
        justify-content: center;
        gap: 1rem;
        margin-top: 0.5rem;
    }
    .retro-social-btn {
        background: {{ $bgButton }};
        color: #fff;
        border: {{ $border }};
        padding: 0.5rem 1rem;
        text-decoration: none;
        font-family: {{ $font }};
        font-size: 1rem;
        border-radius: 4px;
        box-shadow: 3px 3px 0 #000;
        transition: all 0.2s;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
    }
    .retro-social-btn:hover {
        background: #ff0080;
        transform: translate(-2px, -2px);
        box-shadow: 5px 5px 0 #000;
    }
</style>

<div class="retro-header">
    <div class="retro-title" style="margin: 0; font-size: 1.7rem;">
        <a href="" style="text-decoration: none; color: #fff;">Cek Cuaca App 🌤️</a>
    </div>
</div>

<div class="retro-main">
    <form action="{{ url('/') }}" method="POST">
        @csrf
        <div class="retro-label">
            <span style="font-size:1.3rem;">🌆 Nama Kota</span>
        </div>
        <input type="text" name="city" id="city" class="retro-input" placeholder="cth: Jakarta" required>
        <button type="submit" class="retro-btn">
            <span>🌦️ Cek Cuaca</span> <span style="font-size:1.3rem;">→</span>
        </button>
    </form>

    @if(isset($weather) && $weather)
        <div class="retro-weather">
            <b>Cuaca di {{ $weather['name'] }}</b><br>
            <img src="https://openweathermap.org/img/wn/{{ $weather['weather'][0]['icon'] }}@2x.png" alt="icon" style="vertical-align:middle;width:60px;height:60px;">
            <br>Suhu: <b>{{ $weather['main']['temp'] }}°C</b><br>
            Kondisi: <b>{{ $weather['weather'][0]['description'] }}</b>
        </div>
    @endif

    @if(isset($forecast) && $forecast)
        <div class="retro-forecast">
            <b>Prediksi Cuaca 6 Jam ke Depan:</b>
            <ul style="margin:0;padding-left:1.2rem;">
                @foreach(array_slice($forecast, 0, 2) as $item)
                    <li>
                        <img src="https://openweathermap.org/img/wn/{{ $item['weather'][0]['icon'] }}@2x.png" alt="icon" style="vertical-align:middle;width:40px;height:40px;">
                        {{ \Carbon\Carbon::parse($item['dt_txt'])->translatedFormat('l, H:i') }}:
                        {{ $item['main']['temp'] }}°C,
                        {{ $item['weather'][0]['description'] }}
                    </li>
                @endforeach
            </ul>
            <b>Prediksi Cuaca 3 Hari ke Depan:</b>
            <ul style="margin:0;padding-left:1.2rem;">
                @php
                    $count = 0;
                @endphp
                @foreach($forecast as $item)
                    @if(str_contains($item['dt_txt'], '12:00:00') && $count <= 3)
                        <li>
                            <img src="https://openweathermap.org/img/wn/{{ $item['weather'][0]['icon'] }}@2x.png" alt="icon" style="vertical-align:middle;width:40px;height:40px;">
                            {{ \Carbon\Carbon::parse($item['dt_txt'])->translatedFormat('l, d M Y') }}:
                            {{ $item['main']['temp'] }}°C,
                            {{ $item['weather'][0]['description'] }}
                        </li>
                        @php
                            $count++;
                        @endphp
                    @endif
                @endforeach
            </ul>
        </div>
    @endif

    @if(isset($error))
        <div class="retro-weather" style="background:#ff5252;color:#fff;">
            {{ $error }}
        </div>
    @endif

    @if(auth()->check() && auth()->user()->searchHistories->count())
        <div class="retro-history">
            <b>Riwayat Pencarian:</b>
            <ul style="margin:0;padding-left:1.2rem;">
                @foreach(auth()->user()->searchHistories as $history)
                    <li>{{ $history->city }} - {{ $history->searched_at->format('Y-m-d H:i:s') }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</div>

<div class="retro-footer">
    <p style="font-size: 0.5rem; color: #fff;">API: openweathermap.org</p>
    <div class="retro-social-links">
        <a href="https://github.com/habibulfauzan" target="_blank" class="retro-social-btn">
            <span style="font-size: 1.2rem;">📦</span> GitHub
        </a>
        <a href="https://linkedin.com/in/habibulfauzan" target="_blank" class="retro-social-btn">
            <span style="font-size: 1.2rem;">💼</span> LinkedIn
        </a>
    </div>
</div> 