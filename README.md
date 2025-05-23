# 🌤️ Weather App Retro

Aplikasi cuaca dengan tampilan retro yang menampilkan informasi cuaca saat ini dan prediksi cuaca untuk beberapa hari ke depan.

inspirasi desain dari [Roastgram](https://github.com/syahrulnizam7/roastgram)

## 🚀 Fitur

- 🔍 Pencarian cuaca berdasarkan nama kota
- 📊 Informasi cuaca saat ini (suhu dan kondisi)
- ⏰ Prediksi cuaca 6 jam ke depan
- 📅 Prediksi cuaca 3 hari ke depan
- 🎨 Tampilan retro yang menarik
- 🌐 Dukungan bahasa Indonesia

## 🛠️ Teknologi yang Digunakan

- Laravel 10+
- PHP 8.1+
- OpenWeatherMap API
- Carbon
- Blade Template Engine
- CSS3

## 📋 Prasyarat

- PHP >= 8.1
- Composer
- OpenWeatherMap API Key

## 🚀 Instalasi

1. Clone repository
```bash
git clone https://github.com/yourusername/weather-app.git
cd weather-app
```

2. Install dependencies
```bash
composer install
```

3. Copy file .env
```bash
cp .env.example .env
```

4. Generate application key
```bash
php artisan key:generate
```

5. Tambahkan OpenWeatherMap API Key di .env
```
OPENWEATHERMAP_API_KEY=your_api_key_here
```

6. Jalankan server development
```bash
php artisan serve
```

## 🔧 Konfigurasi

### OpenWeatherMap API
1. Daftar di [OpenWeatherMap](https://openweathermap.org/api)
2. Dapatkan API Key
3. Tambahkan API Key ke file .env

## 📝 Penggunaan

1. Buka aplikasi di browser
2. Masukkan nama kota yang ingin dicek cuacanya
3. Tekan tombol "Cek Cuaca"
4. Lihat informasi cuaca saat ini dan prediksi cuaca

## 🤝 Kontribusi

1. Fork repository
2. Buat branch baru (`git checkout -b feature/AmazingFeature`)
3. Commit perubahan (`git commit -m 'Add some AmazingFeature'`)
4. Push ke branch (`git push origin feature/AmazingFeature`)
5. Buat Pull Request

## 📄 Lisensi

Distribusikan di bawah lisensi MIT. Lihat `LICENSE` untuk informasi lebih lanjut.

## 👥 Kontak
- LinkedIn: [Habibul Fauzan](https://linkedin.com/in/habibulfauzan)

## 
🙏 Proyek Gabut